<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tuteur;
use App\Models\Image;
use App\Models\Etudiant;


class EtudiantControlleur extends Controller
{
    public function liste_etudiant()
    {
        $etudiants=Etudiant::paginate(4);
        return view ('etudiant.liste', compact('etudiants'));
    }
 
    public function ajouter_etudiant()
    {
        $tuteurs=Tuteur::all();
        
        return view ('etudiant.ajouter', compact('tuteurs'));
        return view ('etudiant.ajouter');
    }

    public function ajouter_etudiant_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
        ]);
        

        if ($request->hasFile('image')) {
            // Obtenez la photo téléchargée
            $photo = $request->file('image');
            $path = $photo->getClientOriginalName();
            // Déplacez la photo vers un emplacement de stockage (par exemple, public_path())
            $photo->move(public_path('photos'), $path);
            // Enregistrez le chemin de la photo dans la base de données
            $etudiant = new Etudiant();
            $etudiant->nom = $request->nom;
            $etudiant->prenom = $request->prenom;
            $etudiant->classe = $request->classe;
            $etudiant->tuteur_id = $request->tuteur_id;
            $etudiant->save();
    
            $image = new Image();
            $image->etudiant_id = $etudiant->id;
            $image->path = $path;
            $image->save();
        }

        return redirect('/ajouter')->with('status', 'L\'etudiant a bien ete ajouter avec succes!!');
    }
    public function update_etudiant($id)
    {
        $etudiant = Etudiant::find($id);
        return view('etudiant.update', compact('etudiant'));
    }
    public function update_etudiant_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
        ]);
        $etudiant = Etudiant::find($request->id);
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;
        
        $etudiant->update();

        

        return redirect('/etudiant')->with('status', 'L\'etudiant a bien ete modifier avec succes!!');
    }
    public function delete_etudiant($id){
        $etudiant= Etudiant::find($id);
        $etudiant->delete();
        return redirect('/etudiant')->with('status', 'L\'etudiant a bien ete suprimé avec succes!!');

    }
        
   

}
