@extends('layout.master')
@section('content')
<div style="background-color: white">
    <table>
        <form method="POST" action="{{route('creerMission')}}">
            @csrf
            <tr>
                <td><label for="inputNom">Nom de la mission</label></td>
                <td><input required type="text" name="inputNom" id="inputNom" class="rounded"></td>
            </tr>
            <tr>
                <td><label for="inputDescription">Description de la mission</label></td>
                <td><input required type="text" name="inputDescription" id="inputDescription" class="rounded"></td>
            </tr>
            <tr>
                <td><label for="inputScore">Score de la mission</label></td>
                <td><input required type="text" name="inputScore" id="inputScore" class="rounded"></td>
            </tr>
            <tr>
                <td><label for="inputTemps">Temps pour réaliser la mission</label></td>
                <td><input required type="time" name="inputTemps" id="inputTemps" class="rounded"></td>
            </tr>
            <tr>
                <td><input type="submit" value="CréerMission"></td>
            </tr>
        </form>
    </table>
</div>


@endsection
