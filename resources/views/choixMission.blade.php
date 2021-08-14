@extends('layout.master')
@section('Style')
    <link rel="stylesheet" href="{{asset('css/StyleChoixMission.css')}}">
@endsection
@section('content')

    @if ($ok == "Faux")
        <p style="color: red">Vous ne pouvez supprimez une mission qui est associé à un step</p>
    @endif
    <table class="container">
        <tr>
            <td colspan="4" class="titre"><h1>Liste des Missions</h1></td>
        </tr>
        @foreach ($Choix as $item)
            <form name="ChoisirLaMission" action="{{ route ('AjoutMission',['id'=>$item->ID])}}" method="POST" {% csrf_token %}>
                @csrf
                <tr>
                    <td><h6>{{$item->DESCRIPTION}}</h6></td>
                    <td><button>Ajouter cette mission au step</button></td>
                    <td><a href="{{route('')}}">Ajouter une question et une réponse à la mission</a>
                    <td><a name="alert" href="{{route ('deleteMission',['id'=>$item->ID])}}" method="GET"><img src="{{ asset("img/Corbeille.png")}}" width="50px" height="50px"></a></td>
                </tr>
            </form>
        @endforeach
    </table>
@endsection
