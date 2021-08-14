@extends('layout.master')
@section('Style')
    <link rel="stylesheet" href="{{asset('css/StyleConnexion.css')}}">
@endsection
@section('content')
<form class="container" action="{{route ('verifConnexion')}}" method="POST">
    @csrf
    <div style="color: red; text-align:center;padding-top: 5%">
        <?php
            if (isset($ok)){
                echo 'Identifiant ou mot de passe incorrect';
            }
        ?>
    </div>
    <div class="form-group">
      <label for="exampleInputIdentifiant" style="padding-top: 5%">Identifiant</label>
      <input type="text" required class="form-control" id="exampleInputIdentifiant" placeholder="Entrer l'identifiant" name="inputUserName">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mot de passe</label>
      <input type="password" required class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" name="inputMdpCon">
    </div>
    <button class="btn btn-danger" style="margin-bottom: 10%">Submit</button>
  </form>
@endsection
