@extends('layout.master')
@section('Style')
    <link rel="stylesheet" href="{{asset('css/StyleStep.css')}}">
@endsection
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-7_m6H4ghdZLtMFtezA-pJ_OnljYWsIk&callback=initMap&libraries=&v=weekly&libraries=places"
      defer
    ></script>
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="container">
                <?php echo '<h1 class="titre">Ajout des etapes de la route '.$result[0]->NAME.'</h1>'?>
                <div class="row">
                    <div class="col">
                        <div>
                            <div id="map" class="containermap"></div>
                        </div>
                    </div>
                    <div class="col">
                        <table>
                            <tr>
                                <td colspan="4" class="titre"><h1>Liste des steps du parcours</h1></td>
                            </tr>
                            @foreach ($lesSteps as $item)
                                <tr>
                                    <td><h6><?php echo $item ->NAME ?></h6></td>
                                    <td><h6><?php echo $item->COORDGPS ?></h6></td>
                                    <td><a href="{{route ('Mission',['id'=>$item->ID])}}">Ajouter une mission</a></td>
                                    <td><a href="{{route('deleteStep',['id'=>$item->ID])}}" method="GET"><img src="{{ asset("img/Corbeille.png")}}" width="50px" height="50px"></a></td>
                                </tr>
                            @endforeach
                        </table>
                        <div style="padding-top: 10px">
                            <input id="byName" type="text">
                            <input id="byCoord" type="text" placeholder="47.3215806_5.0414701">
                            <input id="submit" type="button" value="search">
                            <form method="POST" action="{{route ('creerStepAll')}}">
                                @csrf
                                <input id="location" name="location" type="text" readonly>
                                <input id="lat" name="lat" type="text" readonly>
                                <input id="lng" name="lng" type="text" readonly>
                                <button value="Ajouter">Ajouter le Step</button>
                            </form>
                            <a class="btn-success rounded" href="{{route('accueil')}}">Terminer création</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset ('js/mapStep.js')}}"></script>
@endsection
