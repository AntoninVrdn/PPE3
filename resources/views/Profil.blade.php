@extends('layout.master')
@section('Style')
    <link rel="stylesheet" href="{{asset ('css/StyleProfil.css')}}">
@endsection
@section('content')
<div class="BackgroundProfil">
    <div class="container">
    <?php
    foreach ($user2 as $item) {
    echo '<h2> Bonjour '.$item->LOGIN.'</h2>';
    }
    ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td colspan="2" class="titre"><h4>Mes informations :</h4></td>
            </tr>
                <tr>
                    <td class="Champs">Identifiant :</td>
                    <td class="Entry"><input disabled="disabled" type="text" name="inputUserName" id="inputUserNameId" value= <?php
                    foreach ($user2 as $item) {
                        echo $item->LOGIN;
                    } ?>></td>
                </tr>
                <tr>
                    <td class="Champs">Prénom :</td>
                    <td class="Entry"><input disabled="disabled" type="text" name="inputUserName" id="inputUserNameId" value= <?php
                    foreach ($user2 as $item) {
                        echo $item->PRENOM;
                    } ?>></td>
                </tr>
                <tr>
                    <td class="Champs">Nom :</td>
                    <td class="Entry"><input disabled="disabled" type="text" name="inputUserName" id="inputUserNameId" value= <?php
                    foreach ($user2 as $item) {
                        echo $item->NOM;
                    } ?>></td>
                </tr>
                <tr>
                    <td class="Champs">Email :</td>
                    <td class="Entry"><input disabled="disabled" type="text" name="inputUserName" id="inputUserNameId" value= <?php
                    foreach ($user2 as $item) {
                        echo $item->EMAIL;
                    } ?>></td>
                </tr>
        </table>
    </div>
    <div style="text-align: center">
        <form action="{{route ('deconnexion')}}" method="GET">
            @csrf
            <button value="Deconnexion" class="btn btn-outline-danger" style="margin-bottom: 5px">Deconnexion</button>
        </form>
    </div>

    </div>


@endsection
