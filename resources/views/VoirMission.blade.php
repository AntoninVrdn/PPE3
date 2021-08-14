@extends('layout.master')
@section('Style')
    <link rel="stylesheet" href="{{asset('css/StyleChoixParcours.css')}}">
@endsection
@section('content')
    <table class="container">
        <tr>
            <td colspan="2" class="titre"><h1>Liste des Missions</h1></td>
        </tr>
        @foreach ($Choix as $item)
            <tr>
                <td><h6>{{$item->DESCRIPTION}}</h6></td>
                <td><a href="">Voir la question associé à la Mission</a>
            </tr>
        @endforeach
    </table>
@endsection