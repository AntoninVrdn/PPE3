// https://developers.google.com/maps/documentation/javascript/directions
// https://developers.google.com/maps/documentation/javascript/reference/directions?hl=fr
// https://developers.google.com/maps/documentation/javascript/reference/places-widget
var allDestination = [];
function initMap() {
  var directionsService = new google.maps.DirectionsService();
  var directionsRenderer = new google.maps.DirectionsRenderer({
    preserveViewport : true,
    draggable : true,
    // suppressMarkers :true
  });
  const myLatLng = { lat: 47.3215806, lng: 5.0414701 };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 14,
    center: myLatLng,
  });
  map.addListener('click',(e) => {
    var waypoint = {
      "location":e.latLng
    }
    allDestination.push(waypoint)
    calcRoute(directionsService,directionsRenderer)
  })
  directionsRenderer.setMap(map);
  //
  var input = document.querySelector('#test');
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  var geocoder = new google.maps.Geocoder();
  var autocomplete = new google.maps.places.Autocomplete(input)
  autocomplete.bindTo('bounds', map);
  var infowindow = new google.maps.InfoWindow();
  autocomplete.addListener('place_changed', function() {
    infowindow.close();
    // marker.setVisible(false);
    var place = autocomplete.getPlace();
    if (!place.geometry) {
        window.alert("Autocomplete's returned place contains no geometry");
        return;
    }
    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
    } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);
    }
    // marker.setPosition(place.geometry.location);
    // marker.setVisible(true);
    bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
    infowindow.setContent(place.formatted_address);
    // infowindow.open(map, marker);
});
//   google.maps.event.addListener(marker, 'dragend', function() {
//     geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
//     if (status == google.maps.GeocoderStatus.OK) {
//       if (results[0]) {
//           bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
//           infowindow.setContent(results[0].formatted_address);
//           infowindow.open(map, marker);
//       }
//     }
//     });
// });
//
  document.querySelector('#mode').addEventListener('change',() => calcRoute(directionsService,directionsRenderer))
}

function bindDataToForm(address,lat,lng){
  document.getElementById('location').value = address;
  document.getElementById('lat').value = lat;
  document.getElementById('lng').value = lng;
}

function calcRoute(directionsService,directionsRenderer) {
  var selectedMode = document.querySelector('#mode').value;
  var allWaypoints = []
  allDestination.forEach(d => allWaypoints.push(d))
  allWaypoints.pop()
  allWaypoints.shift();
  var request = {
      origin: allDestination[0],
      destination: allDestination[allDestination.length-1],
      waypoints: allWaypoints,
      optimizeWaypoints: true,
      travelMode: google.maps.TravelMode[selectedMode]
  };
  directionsService.route(request, function(response, status) {
    if (status == 'OK') {
      directionsRenderer.setDirections(response);
    }
  });
  var test = directionsRenderer.getDirections();
}


// function placeMarker(latLng, map) {
//   var marker = new google.maps.Marker({
//     position: latLng,
//     map: map,
//   });
//   marker.addListener("click",() => removeMarker(marker))
// }

// function removeMarker(marker) {
//   marker.setMap(null);
// }

// function calcRoute(directionsService,directionsRenderer) {
//   if (allDestination.length>1) {
//     var selectedMode = document.getElementById('mode').value;
//   var request = {
//       origin: allDestination[position],
//       destination: allDestination[position+1],
//       travelMode: google.maps.TravelMode[selectedMode]
//   };
//   directionsService.route(request, function(response, status) {
//     if (status == 'OK') {
//       directionsRenderer.setDirections(response);
//     }
//   });
//   position++
//   }
  
// }



// var bermudaTriangle = new google.maps.Polygon({
//   paths: [
//     new google.maps.LatLng(25.774, -80.190),
//     new google.maps.LatLng(18.466, -66.118),
//     new google.maps.LatLng(32.321, -64.757)
//     ]
// });

// computeLength()
// marker1 = new google.maps.Marker({
//     map,
//     draggable: true,
//     position: { lat: 40.714, lng: -74.006 },
//   });
//   marker2 = new google.maps.Marker({
//     map,
//     draggable: true,
//     position: { lat: 48.857, lng: 2.352 },
//   });
//   const bounds = new google.maps.LatLngBounds(
//     marker1.getPosition(),
//     marker2.getPosition()
//   );
//   map.fitBounds(bounds);


//     function calculateAndDisplayRoute(directionsService, directionsRenderer) {
//         const selectedMode = document.getElementById("mode").value;
//         directionsService.route({
//             origin: { lat: 47.3228015, lng: 5.0393779 },
//             destination: { lat: 47.3301569, lng: 5.0153385 },
//             // Note that Javascript allows us to access the constant
//             // using square brackets and a string value as its
//             // "property."
//             travelMode: google.maps.TravelMode[selectedMode],
//         },
//         (response, status) => {
//             if (status == "OK") {
//                 directionsRenderer.setDirections(response);
//             }
//             else {
//                 window.alert("Directions request failed due to " + status);
//             }
//         }
//     );
// }

// function initialize() {
//   var latlng = new google.maps.LatLng(47.322047,5.04148);
//    var map = new google.maps.Map(document.getElementById('map'), {
//      center: latlng,
//      zoom: 13
//    });
//    var marker = new google.maps.Marker({
//      map: map,
//      position: latlng,
//      draggable: true,
//      anchorPoint: new google.maps.Point(0, -29)
//   });
//    var input = document.getElementById('searchInput');
//    var input2 = document.getElementById('searchInput2');
//    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
//    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input2);
//    var geocoder = new google.maps.Geocoder();
//    var autocomplete = new google.maps.places.Autocomplete(input);
//    autocomplete.bindTo('bounds', map);
  //  var infowindow = new google.maps.InfoWindow();
  //  autocomplete.addListener('place_changed', function() {
  //      infowindow.close();
  //      marker.setVisible(false);
  //      var place = autocomplete.getPlace();
  //      if (!place.geometry) {
  //          window.alert("Autocomplete's returned place contains no geometry");
  //          return;
  //      }
  //      If the place has a geometry, then present it on a map.
  //      if (place.geometry.viewport) {
  //          map.fitBounds(place.geometry.viewport);
  //      } else {
  //          map.setCenter(place.geometry.location);
  //          map.setZoom(17);
  //      }
  //      marker.setPosition(place.geometry.location);
  //      marker.setVisible(true);
  //      bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
  //      infowindow.setContent(place.formatted_address);
  //      infowindow.open(map, marker);
  //  });
//    // this function will work on marker move event into map
//    google.maps.event.addListener(marker, 'dragend', function() {
//        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
//        if (status == google.maps.GeocoderStatus.OK) {
//          if (results[0]) {
//              bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
//              infowindow.setContent(results[0].formatted_address);
//              infowindow.open(map, marker);
//          }
//        }
//        });
//    });
// }
// function bindDataToForm(address,lat,lng){
//   document.getElementById('location').value = address;
//   document.getElementById('lat').value = lat;
//   document.getElementById('lng').value = lng;
// }
// google.maps.event.addDomListener(window, 'load', initialize);

// //  //  // Evènement lors du clic
// //   map.addListener("click", (e) => {
// //     // Appel de la méthode 'placeMarker' avec passage de paramètres
// //   placeMarker(e.latLng, map);
// // });
// // // Place un marker à l'endroit ciblé par le clic sur la map
// // function placeMarker(latLng, map) {
// //   new google.maps.Marker({
// //     position: latLng,
// //     map: map,
// //     animation: google.maps.Animation.DROP,
// //   });
// // }
// // }
// // var inputAddress = document.getElementById('inputAdressStep');
// // var btnAddStep = document.getElementById('btnAddStep');
// // btnAddStep.addEventListener("click", (e) => {
// //   searchPlaces(e, btnAddStep)
// // });
// // function searchPlaces(){
// //   var apiKey = "AIzaSyAiuImeuNuUhv_E4EV6FLhK6kkb8KMYK4Q";
// //   var httpRequest = new XMLHttpRequest();
// //   httpRequest.onreadystatechange = function(){
// //       httpRequest.open('GET', 'https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input='+ inputAddress
// //       + '&inputtype=textquery&fields=photos,name,opennow&key=' + apiKey, true)
// //       httpRequest.send();
// //   }