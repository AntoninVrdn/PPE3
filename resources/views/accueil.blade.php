@extends('layout.master')
@section('Style')
    <link rel="stylesheet" href="{{asset('css/StyleForAccueil.css')}}">
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
                            <p>Cliquez ici pour créer un parcours</p>
                            <p> et ajoutez lui des étapes</p>
                            <form action="{{route ('creationParcours')}}" method="GET" {% csrf_token %}>
                                @csrf
                                <button value="Créer un parcours" class="btn btn-outline-primary" style="margin-bottom: 5px">Créer un parcours</button>
                            </form>
                        </div>
                        <div class="Zone2">
                            <img src="{{asset ('img/logoMap.jpg')}}" width="100%" height="100%">
                            <p>Cliquez ici pour pouvoir choisir le parcours</p>
                            <p>sur lequel vous voulez ajoutez des étapes</p>
                            <form action="{{route ('choisirParcours',['id'=>$_SESSION['login'][0]->ID])}}" method="POST" {% csrf_token %}>
                                @csrf
                                <button value="Choisir un parcours" class="btn btn-outline-primary" style="margin-bottom: 5px">Choisir un parcours</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

