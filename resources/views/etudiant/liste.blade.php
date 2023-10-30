<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste etudiant</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<body>
    <div class="container text-center">
        <div class="row">
            <div class="col s12">
                <h1>LISTE DES UTILISATEUR</h1>
                <hr>
                
                
                <a href="/ajouter" class="btn btn-primary">Ajouter un etudiant</a>
                <hr>
                
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>nomero</th>
                            <th>identifiant</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Classe</th>
                            <th>Tuteur</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $ide=1;
                        @endphp

                        @foreach ( $etudiants as $etudiant )
                            
                        <tr style="align-items:center;">
                            <td>{{$ide}}</td>
                            <td>
                            @if($etudiant->image)
                                <img src="{{ '/photos/'. $etudiant->image->path }}" alt="Photo de l'étudiant" class="rounded-circle img-fluid " style="width: 60px;">
                            @else
                                <p>Pas de photo disponible</p>
                            @endif
                            </td>
                            <td>{{$etudiant->nom}}</td>
                            <td>{{$etudiant->prenom}}</td>
                            <td>{{$etudiant->classe}}</td>

                            @if ($etudiant->tuteur)
                                <td>
                                    {{$etudiant->tuteur->nom}} {{$etudiant->tuteur->prenom}}
                                </td>
                            @else <td>Sans tuteur</td>
                            @endif
                            <td>
                                <a href="/update-etudiant/{{$etudiant->id}}" class="btn btn-info">Update</a>
                                <a href="/delete-etudiant/{{$etudiant->id}}" class="btn btn-danger">Delete </a>
                            </td>
                        </tr>
                        @php
                            $ide+=1;
                        @endphp
                        
                        @endforeach
                    </tbody>
                    <a href="/tuteur" class="btn btn-danger">Liste des tuteurs</a>
                </table>
                {{$etudiants->links()}}
            </div>
        </div>
    </div>
    

    <script src="{{ asset('js/bootstrap.js') }}">

    </script>
</body>
</html>