<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantControlleur;
use App\Http\Controllers\TuteurController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/delete-etudiant/{id}', [EtudiantControlleur::class, 'delete_etudiant']);
Route::get('/update-etudiant/{id}', [EtudiantControlleur::class, 'update_etudiant']);
Route::post('/update/traitement', [EtudiantControlleur::class, 'update_etudiant_traitement']); 
Route::get('/etudiant', [EtudiantControlleur::class, 'liste_etudiant']);
Route::get('/ajouter', [EtudiantControlleur::class, 'ajouter_etudiant']);
Route::post('/ajouter/traitement', [EtudiantControlleur::class, 'ajouter_etudiant_traitement']);


Route::get('/delete-tuteur/{id}', [TuteurController::class, 'delete_tuteur']);
Route::get('/update-tuteur/{id}', [TuteurController::class, 'update_tuteur']);
Route::post('/updateT/traitement', [TuteurController::class, 'update_tuteur_traitement']); 
Route::get('/tuteur', [TuteurController::class, 'liste_tuteur']);
Route::get('/ajouterT', [TuteurController::class, 'ajouter_tuteur']);
Route::post('/ajouterT/traitement', [TuteurController::class, 'ajouter_tuteur_traitement']);
