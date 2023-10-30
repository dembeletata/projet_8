<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJOUTER etudiant</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1>MODIFIER UN ETUDIANT</h1>
                <hr>
                <hr>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                <ul>
                    @foreach ($errors->all() as $error )
                        <li class="alert alert-danger">{{$error}}</li>
                    @endforeach
    
                </ul>
                <form action="/update/traitement" method="POST" class="form-group">
                    @csrf

                    <input type="text" name="id" style="display: none;" value="{{$etudiant->id}}">

                    <div class="form-group">
                        <label for="Nom">Nom</label>
                        <input type="text" class="form-control form-check" id="Nom" name="nom" value="{{$etudiant->nom}}">
                    </div>
                    <div class="form-group">
                        <label for="Prenom">Prenom</label>
                        <input type="text" class="form-control form-check" id="Prenom" name="prenom" value="{{$etudiant->prenom}}">
                    </div>
                    <div class="form-group ">
                        <label for="Class">Classe</label>
                        <input type="text" class="form-control form-check" id="Classe" name="classe" value="{{$etudiant->classe}}">
                    </div>


                    

                    <br>

                    {{-- <div class="form-group ">
                        <label for="tuteur_id" class="from-label">Tuteur</label>
                        
                        <select class="from-control form-check" name="tuteur_id" id="tuteur_id">
                            @if ($etudiant->tuteur)
                            <option class="form-control"  value="" selected disabled>{{$etudiant->tuteur->nom}} {{$etudiant->tuteur->prenom}}</option>
                            @else 
                            <option class="form-control"  value="" selected disabled>choisissez un tuteur</option>
                            @endif
                            @foreach ($tuteurs as $tuteur )
                                <option value="{{$tuteur->id}}"> {{$tuteur->nom}} {{$tuteur->prenom}}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <br>
                    <button type="submit" class="btn btn-primary">MODIFIER UN ETUDIANT</button>
                    <br>
                    <br>
                    <a href="/etudiant" class="btn btn-danger">Revenir a la liste des etudiants</a>
                </form>
            </div>
        </div>
    </div>
    

    <script src="{{ asset('js/bootstrap.js') }}">

    </script>
</body>
</html>