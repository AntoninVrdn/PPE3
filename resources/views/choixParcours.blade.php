@extends('layout.master')
@section('Style')
    <link rel="stylesheet" href="{{asset('css/StyleChoixParcours.css')}}">
@endsection
@section('content')

    <table class="container">
        <tr>
            <td colspan="4" class="titre"><h1>Liste des Parcours</h1></td>
        </tr>
        @foreach ($Choix as $item)
            <form name="ChoisirLaRoute" action="{{route ('creerStep',['id'=>$item->ID])}}" method="get">
                @csrf
                <tr>
                    <td><h6>{{$item->NAME}}</h6></td>
                    <td><button>Choisir ce parcours</button></td>
                    <td><a href="{{route ('VoirParcours',['id'=>$item->ID])}}" method="GET">Voir le Parcours</a></td>
                    <td><a href="{{route('deleteRoute',['id'=>$item->ID])}}" method="GET"><img src="{{ asset("img/Corbeille.png")}}" width="50px" height="50px"></a></td>
                </tr>
            </form>
        @endforeach
    </table>
@endsection
