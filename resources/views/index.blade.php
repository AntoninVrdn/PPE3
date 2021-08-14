@extends('layout.master')
@section('content')
    <h1 class="display-4">Smart-City</h1>

    {{-- <nav class="navbar navbar-light bg-light">
        <form class="form-inline">
          <button class="btn btn-sm btn-outline-secondary" type="button" style="color: #6D071A">Connexion</button>
        </form>
      </nav> --}}
      <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Identifiant</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer l'identifiant">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mot de passe</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
          <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>


@endsection
