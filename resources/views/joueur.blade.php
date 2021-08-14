@extends('layout.master')
@section('Style')
    <link rel="stylesheet" href="{{asset('css/StyleJoueur.css')}}">
@endsection
@section('content')

{{-- <form class="container" action="{{route('creerJoueur')}}" method="POST">
    <div class="container-fluid mt-5">
        <div class="form-group">
            <label for="exampleInputIdentifiant">Nom :</label>
            <input type="text" class="form-control" id="nomJoueur" placeholder="Veuillez entrer le nom du Joueur" name="inputNomJoueur">
        </div>
        <div class="form-group">
            <label for="exampleInputIdentifiant">Prénom :</label>
            <input type="text" class="form-control" id="nomJoueur" placeholder="Veuillez entrer le prénom du Joueur" name="inputPrénomJoueur">
        </div>
        <div class="form-group">
            <label for="exampleInputIdentifiant">Pseudo :</label>
            <input type="text" class="form-control" id="nomJoueur" placeholder="Veuillez entrer le pseudo du Joueur" name="inputPseudoJoueur">
        </div>
        <div class="form-group">
            <label for="exampleInputIdentifiant">Mot de passe :</label>
            <input type="text" class="form-control" id="nomJoueur" placeholder="Veuillez entrer le mot de passe du Joueur" name="inputMDPJoueur">
        </div>
        <div class="form-group">
            <label for="exampleInputIdentifiant">E-mail :</label>
            <input type="text" class="form-control" id="nomJoueur" placeholder="Veuillez entrer l'e-mail du Joueur" name="inputEmailJoueur">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
</form> --}}

{{-- <form class="container" action="{{route('ajouterJoueur')}}"  method="POST">
    <select class="mdb-select md-form colorful-select dropdown-warning">
        @foreach
    </select>
</form> --}}


<div class="container" style="margin-left: 100px; margin-top:100px">
    <table class="table table-bordered table-striped table-dark" style="width: 700px">
      <thead class="thead-dark">
        <tr>
            <th style="text-align: center">Nom Joueurs</th>
            <th style="text-align: center">Nom Equipe</th>
            <th style="text-align: center">+/-</th>
       </tr>
      </thead>
    @foreach ($joueurAfficher as $item)
      <tr>
          <td>
            {{$item->NOM}}
          </td>
          <td>
              {{$item->nomEquipe}}
              <?php $name = $item->nomEquipe ?>
          </td>
          <td style="text-align: center">
            @if($item->nomEquipe == null)
              <a href="{{route('ajouterJoueur', ['idJoueur'=>$item->joueurId, 'idEquipe'=>$idEquipe])}}" style="color: white">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                        <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                        <path fill-rule="evenodd" d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                      </svg>
                    </a>

            @else
              <a href="{{route('suppJoueur', ['idJoueur'=>$item->joueurId, 'idEquipe'=>$idEquipe])}}" style="color: white">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-minus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                        <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                        <path fill-rule="evenodd" d="M5.5 9a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                      </svg>
              </a>
            @endif
          </td>
      </tr>
    @endforeach
    </table>

    <div id="divMusic">
        <div class="input-group mb-3" id="">
            <label class="badge badge-primary" style="font-size: 18px">Insérer le nom de l'artiste ou un titre/album</label>
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Entrer :</span>
              <input type="text" class="form-control" placeholder="Artiste/Album/Single" id="research">
              <button id="envoyer" class="btn btn-light" style="margin-left: 10px; border : 1px black solid">Envoyer</button>
            </div>
        </div>

        <div id="divlien">

        </div>

        <table id="tableau" class="table table-bordered table-striped table-dark">
            <thead class="thead-dark">
              <tr>
                <th scope="col" style="text-align: center">idTitre</th>
                <th scope="col" style="text-align: center">Artiste</th>
                <th scope="col" style="text-align: center">Titre</th>
                <th scope="col" style="text-align: center">Lien</th>
              </tr>
            </thead>
            <tbody id="tbody">
            </tbody>
        </table>

    </div>

</div>
<div style="margin-left: 110px;">
    <h4 class="titre">Enregistrement des données</h4>
                    <form action="{{route('choixMusique',['id'=>$idEquipe])}}" method="POST">
                            @csrf
                            <p></p>
                            <table>
                                <tr>
                                    <td><label class="badge badge-primary" style="font-size: 17px" for="routeName">Nom d'artiste:</label></td>
                                    <td><input required type="text" name="nomArtiste" id="nomArtiste" ></td>
                                </tr>
                                <tr>
                                    <td><label class="badge badge-primary" style="font-size: 17px" for="routeDescription">Titre :</label></td>
                                    <td><input required type="text" name="titreMusique" id="titreMusique" ></td>
                                </tr>
                                <tr>
                                    <td><label class="badge badge-primary" style="font-size: 17px" for="routeDescription">URL :</label></td>
                                    <td><input required type="text" name="urlMusique" id="urlMusique"></td>
                                </tr>
                                <tr>
                                    <td><label class="badge badge-primary" style="font-size: 17px" for="routeDescription">ID Musique :</label></td>
                                    <td><input required type="text" name="idMusique" id="idMusique"></td>
                                </tr>
                            </table>
                            <button class="btn btn-success">Enregistrer</button>
                            <p></p>
                    </form>
                    <table class="table table-bordered table-striped table-dark" style="width: 700px">
                        <thead class="thead-dark">
                          <tr>
                              <th style="text-align: center">idTitre</th>
                              <th style="text-align: center">Artiste</th>
                              <th style="text-align: center">Titre</th>
                              <th style="text-align: center">Lien</th>
                         </tr>
                        </thead>
                      @foreach ($musiqueAfficher as $item)
                        <tr>
                            <td>
                              {{$item->IDMUSIQUE}}
                            </td>
                            <td>
                                {{$item->NOMARTISTE}}
                            </td>
                            <td>
                                {{$item->TITRE}}
                            </td>
                            <td>
                                {{$item->URL}}
                            </td>
                        </tr>
                      @endforeach
                      </table>
</div>

    <script>

        var tableau = document.getElementById('tableau');

        var tbody = document.getElementById('tbody')

        let recherche = document.getElementById('research');

        var tableau = document.getElementById("tableau");

        const btnRecherche = document.getElementById('envoyer');

        // "https://cors-anywhere.herokuapp.com/https://deezerdevs-deezer.p.rapidapi.com/search?q=travis%20scott"
        // "https://cors-anywhere.herokuapp.com/https://deezerdevs-deezer.p.rapidapi.com/search?q="+recherche.value

        async function GetMusic(){

          tbody.innerHTML = "";
          await fetch("https://cors-anywhere.herokuapp.com/https://deezerdevs-deezer.p.rapidapi.com/search?q="+recherche.value, {
            "method": "GET",
            "headers": {
              "x-rapidapi-key": "cf2fc7404emshe5a464ee34632f8p1b0455jsnff88f370c97a",
              "x-rapidapi-host": "deezerdevs-deezer.p.rapidapi.com"
            }
          })
          .then(response => response.json())
          .then(data => data.data)
          .then((data2) => {
            for(let lien of data2){
              console.log(lien.preview)

              var ligne = tbody.insertRow(-1);

              var colonne1 = ligne.insertCell(0);
                colonne1.innerHTML = lien.id;

              var colonne2 = ligne.insertCell(1);
                colonne2.innerHTML = lien.artist.name;

              var colonne3 = ligne.insertCell(2);
                colonne3.innerHTML = lien.title;

              var colonne4 = ligne.insertCell(3);
                colonne4.innerHTML = '<a href="' + lien.preview + '" blank>'+ lien.preview +'</a>';
                //colonne4.innerHTML = '<a href="' + lien.preview + '" blank>Preview</a>';

            }
          })

          .catch(err => {
            console.error(err);
          });

        }



        const events = () =>{
            btnRecherche.addEventListener('click', GetMusic)
        }

        events();



      </script>

@endsection

{{-- si le nom d'équipe est null alors mettre le plus à coté et sinon mettre moins --}}
