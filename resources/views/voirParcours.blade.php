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
                <?php echo '<h1 class="titre">Etapes de la route '.$result[0]->NAME.'</h1>'?>
                <div class="row">
                    <div class="col">
                        <strong>Mode of Travel: </strong>
                            <select id="mode">
                                <option value="DRIVING">Driving</option>
                                <option value="WALKING">Walking</option>
                                <option value="BICYCLING">Bicycling</option>
                                <option value="TRANSIT">Transit</option>
                            </select>
                        <div>
                            <div id="map" class="containermap"></div>
                        </div>
                    </div>
                    <div class="col">
                        <table>
                            <tr>
                                <td colspan="3" class="titre"><h1>Liste des steps du parcours</h1></td>
                            </tr>
                            @foreach ($lesSteps as $item)
                                <tr>
                                    <td><h6><?php echo $item ->NAME ?></h6></td>
                                    <td><h6 class="step"><?php echo $item->COORDGPS ?></h6></td>
                                    <td><a href="{{route('VoirMission',['id'=>$item->ID])}}">Voir la mission</a></td>
                                </tr>
                            @endforeach
                        </table>
                        <input type="text" readonly id="distance">
                        <input type="text" readonly id="time">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset ('js/mapViewStep.js')}}"></script>
@endsection
