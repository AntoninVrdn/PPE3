@extends('layout.master')
@section('Style')
    <link rel="stylesheet" href="{{asset('css/StyleForEquipe.css')}}">
@endsection
@section('content')
    <div class="container">
        <table>
            <tr>
                <td class="titre" colspan="3"><h1>Ajouter une Equipe</h1></td>
            <tr>
                <form action="{{route('creerEquipe',['id'=>$idJeu])}}" method="POST">
                    @csrf
                    <td style="padding-bottom: 10px"><label for="NomEquipe">Nom de l'Equipe :</label></td>
                    <td style="padding-bottom: 10px"><input type="text" required id="nomEquipe" placeholder="Entrer le nom de l'equipe" name="inputnomEquipe"></td>
                    <td style="padding-bottom: 10px"><input type="submit" value="Ajouter Equipe" class="btn btn-success"></td>
                </form>
            </tr>
        </table>
        <table>
            <tr>
                <td class="titre" colspan="2" ><h1>Nom des Equipes</h1></td>
            </tr>
            @if ($equipes!=1)
                @foreach ($equipes as $item)
                    <tr>
                        <td>
                            <form action="{{route('afficherJoueurEquipe',['id'=>$item->ID_EQUIPE])}}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary" style="text-align : center">
                                    {{$item->NOM}}
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="{{route('suppEquipe',['id'=>$item->ID_EQUIPE])}}">
                                <button type="button" class="button btn-danger rounded float-right">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                    </svg>
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif

        </table>
    </div>
@endsection
