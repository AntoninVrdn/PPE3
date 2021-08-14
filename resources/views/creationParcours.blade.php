@extends('layout.master')
@section('Style')
    <link rel="stylesheet" href="{{asset ('css/StyleCreationParcours.css')}}">
@endsection
@section('content')

<div class="container-fluid mt-5">
    <div class="row"></div>
    <div class="row">
        <div class="col"></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                    <h1 class="titre">Création du parcours</h1>
                    <form action="{{route('creerParcour')}}" method="POST">
                            @csrf
                            <p></p>
                            <table>
                                <tr>
                                    <td><label for="routeName">Nom :</label></td>
                                    <td><input required type="text" name="routeName" id="routeName" class="rounded"></td>
                                </tr>
                                <tr>
                                    <td><label for="routeDescription">Description :</label></td>
                                    <td><input required type="text" name="routeDescription" id="routeDescription" class="rounded"></td>
                                </tr>
                                <tr>
                                    <td><label for="routeDescription">Handicap :</label></td>
                                    <td><input type="checkbox" name="routeHandicap" id="routeHandicap"></td>
                                </tr>
                            </table>
                            <button class="btn btn-primary">Créer</button>
                            <p></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div class="col"></div>
    </div>
    <div class="row"></div>
</div>
@endsection
