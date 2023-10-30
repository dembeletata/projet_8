<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier tuteur</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1>MODIFIER UN TUTEUR</h1>
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
                <form action="/updateT/traitement" method="POST" class="form-group">
                    @csrf

                    <input type="text" name="id" style="display: none;" value="{{$tuteur->id}}">

                    <div class="form-group">
                        <label for="Nom">Nom</label>
                        <input type="text" class="form-control form-check" id="Nom" name="nom" value="{{$tuteur->nom}}">
                    </div>
                    <div class="form-group">
                        <label for="Prenom">Prenom</label>
                        <input type="text" class="form-control form-check" id="Prenom" name="prenom" value="{{$tuteur->prenom}}">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">MODIFIER UN TUTEUR</button>
                    <br>
                    <br>
                    <a href="/tuteur" class="btn btn-danger">Revenir a la liste des tuteurs</a>
                </form>
            </div>
        </div>
    </div>
    

    <script src="{{ asset('js/bootstrap.js') }}">

    </script>
</body>
</html>