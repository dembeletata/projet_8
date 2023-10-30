<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tuteur;



class TuteurController extends Controller
{
    public function liste_tuteur()
    {
        $tuteurs=Tuteur::paginate(4);
        return view ('tuteur.listeT', compact('tuteurs'));
    }
 
    public function ajouter_tuteur()
    {
        return view ('tuteur.ajouterT');
    }

    public function ajouter_tuteur_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
        ]);
        $tuteur = new Tuteur();
        $tuteur->nom = $request->nom;
        $tuteur->prenom = $request->prenom;
        $tuteur->save();

        return redirect('/ajouterT')->with('status', 'Le tuteur a bien ete ajouter avec succes!!');
    }
    public function update_tuteur($id)
    {
        $tuteur = Tuteur::find($id);

        return view('tuteur.updateT', compact('tuteur'));
    }
    public function update_tuteur_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
        ]);
        $tuteur = Tuteur::find($request->id);
        $tuteur->nom = $request->nom;
        $tuteur->prenom = $request->prenom;
        $tuteur->update();

        return redirect('/tuteur')->with('status', 'Le tuteur a bien ete modifier avec succes!!');
    }
    public function delete_tuteur($id){
        $tuteur= Tuteur::find($id);
        $tuteur->delete();
        return redirect('/tuteur')->with('status', 'Le tuteur a bien ete suprimé avec succes!!');

    }
}
