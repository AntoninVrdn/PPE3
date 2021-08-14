<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-7_m6H4ghdZLtMFtezA-pJ_OnljYWsIk&callback=initMap&libraries=&v=weekly&libraries=places"
      defer
    ></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <div>
      <strong>Mode of Travel: </strong>
      <select id="mode">
        <option value="DRIVING">Driving</option>
        <option value="WALKING">Walking</option>
        <option value="BICYCLING">Bicycling</option>
        <option value="TRANSIT">Transit</option>
      </select>
      </div>
      <input id="test" type="text">
      <input id="location" type="text" readonly>
      <input id="lat" type="text" readonly>
      <input id="lng" type="text" readonly>
    <script src="{{asset ('js/map.js')}}"></script>
  </body>
</html>
