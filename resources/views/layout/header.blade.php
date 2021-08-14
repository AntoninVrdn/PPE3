<div class="topnav" id="myTopnav">
    @if(isset($_SESSION['login']))
        <a class="logo" href="{{route ('accueil')}}" id="btnAjoutEtapes">Parcours</a>
        {{-- <a class="logo" href="{{route ('creationEquipe')}}" id="btnCréerEquipes">Gérer les Equipes</a> --}}
        <a class="logo" href="{{route ('creationJeu')}}" id="btnCreerJeu">Gérer les Jeux</a>
        <a href="{{route ('Profil')}}" id="btnCréerEquipes">Profil</a>
    @endif
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i></a>
</div>