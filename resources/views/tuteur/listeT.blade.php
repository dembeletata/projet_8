<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste tuteur</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<body>
    <div class="container text-center">
        <div class="row">
            <div class="col s12">
                <h1>LISTE DES TUTEURS</h1>
                <hr>
                
                
                <a href="/ajouterT" class="btn btn-primary">Ajouter un tuteur</a>
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
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $ide=1;
                        @endphp

                        @foreach ( $tuteurs as $tuteur )
                            
                        <tr>
                            <td>{{$ide}}</td>
                            <td>{{$tuteur->id}}</td>
                            <td>{{$tuteur->nom}}</td>
                            <td>{{$tuteur->prenom}}</td>
                            <td>
                                
                                @foreach ($tuteur->etudiants as $etudiant )
                                    <li class="list-group-item list-group-item-primary">{{ $etudiant->nom }} {{ $etudiant->prenom }} {{ $etudiant->id }}</li>
                                @endforeach
                            </td>
                            <td>
                                <a href="/update-tuteur/{{$tuteur->id}}" class="btn btn-info">Update</a>
                                <a href="/delete-tuteur/{{$tuteur->id}}" class="btn btn-danger">Delete </a>
                            </td>
                        </tr>
                        @php
                            $ide+=1;
                        @endphp
                        
                        @endforeach
                    </tbody>
                    <a href="/etudiant" class="btn btn-danger">Liste des etudiants</a>
                </table>
                {{$tuteurs->links()}}
            </div>
        </div>
    </div>
    

    <script src="{{ asset('js/bootstrap.js') }}">

    </script>
</body>
</html>