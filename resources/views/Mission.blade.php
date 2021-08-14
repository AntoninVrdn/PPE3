@extends('layout.master')
@section('Style')
    <link rel="stylesheet" href="{{asset('css/StyleForMission.css')}}">
@endsection
@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div>
                        <div class="Zone1">
                            <img src="{{asset ('img/logoMap.jpg')}}" width="100%" height="100%">
                            <p>Cliquez ici pour créer une mission</p>
                            <p> et l'ajoutez à une étape</p>
                            <form action="{{route ('afficherMission')}}" method="GET" {% csrf_token %}>
                                @csrf
                                <button value="Créer un parcours"  class="btn btn-outline-primary" style="margin-bottom: 5px">Créer une Mission</button>
                            </form>
                        </div>
                        <div class="Zone2">
                            <img src="{{asset ('img/logoMap.jpg')}}" width="100%" height="100%">
                            <p>Cliquez ici pour pouvoir choisir la mission</p>
                            <p>qui sera lié au step</p>
                            <form action="{{route ('listeMission',['id'=>$_SESSION['idStep']])}}" method="GET" {% csrf_token %}>
                                @csrf
                                <button value="Choisir un parcours"  class="btn btn-outline-primary" style="margin-bottom: 5px">Choisir une Mission</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
