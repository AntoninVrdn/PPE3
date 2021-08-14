@extends('layout.master')

@section('Style')
    <link rel="stylesheet" href="{{asset('css/StyleForEquipe.css')}}">
@endsection


@section('content')



<div class="container">
    <div class="row">
            <table>
                <tr>
                    <td class="titre" colspan="3"><h1>Ajouter un Jeu</h1></td>
                <tr>
                <tr>
                    <td>
                        <form action="{{route('creerJeu')}}" method="POST">
                            @csrf
                            <div class="py-3">
                                <label for="parcoursJeu">Parcours : </label>
                                <select name="parcoursJeu" id="parcoursJeu">
                                    @if ($parcours!=1)
                                        @foreach ($parcours as $item)
                                            <option value="{{$item->ID}}">{{$item->NAME}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <label for="dateDJeu">Date de début du jeu : </label>
                                <input type="date" name="dateDJeu" id="dateDJeu">
                                <label for="dateFJeu">Date de fin du jeu : </label>
                                <input type="date" name="dateFJeu" id="dateFJeu">
                                <input type="submit" value="Valider">
                            </div>        
                        </form>
                    </td>
                </tr>
                <tr style="position: static">
                    <td class="titre" colspan="3"><h1>Vos Jeux</h1></td>
                </tr>
            </table>
            <div class="overflow-auto w-100" style="height:250px">
                <table>
                    @if ($jeux!=1)
                        @foreach ($jeux as $jeu)

                            <tr>
                                <td>
                                    <label>ID du jeu : </label>
                                    {{$jeu->ID}}
                                </td>
                                <td>
                                    <label>ID de la route : </label>
                                    {{$jeu->ID_ROUTE}}
                                </td>
                                <td>
                                    <a href="{{route('afficherEquipe',['id'=>$jeu->ID])}}">
                                        <button>Voir l'équipe associer au jeu</button>
                                    </a>
                                    <a href="{{route('deleteJeu',['id'=>$jeu->ID])}}" method="GET" class="ml-5">
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
            
        </div>
    </div>
</div>





















@endsection