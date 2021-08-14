var allMarker = []
function initMap() {
    const myLatLng = { lat: 47.3215806, lng: 5.0414701 };
    const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 14,
    center: myLatLng,
    });

    var inputName = document.querySelector('#byName');
    var inputCoord = document.querySelector('#byCoord');
    var submit = document.querySelector('#submit');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(inputName);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(inputCoord);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(submit);
    
    var geocoder = new google.maps.Geocoder();
    var autocomplete = new google.maps.places.Autocomplete(inputName)

    autocompleteInput(autocomplete,map)
    map.addListener("click",(e) => placeMarker(e.latLng, map,geocoder))
    submit.addEventListener('click', () => searchPlaceCoord(map,geocoder))
}

function bindDataToForm(address,lat,lng){
    document.getElementById('location').value = address;
    document.getElementById('lat').value = lat;
    document.getElementById('lng').value = lng;
}

function autocompleteInput(input,map) {
    input.bindTo('bounds', map);
    
    input.addListener('place_changed', function() {
    var place = input.getPlace();
    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
    } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);
    }
    removeMarker()
    var marker = new google.maps.Marker({
        position: place.geometry.location,
        map: map,
    }); 
    allMarker.push(marker)
    bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
});
}

function searchPlaceCoord(map,geocoder) {
    let inputCoord = document.querySelector("#byCoord").value
    let location = {
        lat: parseFloat(inputCoord.slice(0, inputCoord.indexOf('_'))),
        lng: parseFloat(inputCoord.slice(inputCoord.indexOf('_')+1, inputCoord.length))
    }
    placeMarker(location,map,geocoder)
}

function placeMarker(latLng, map,geocoder) {
    removeMarker()
    var marker = new google.maps.Marker({
        position: latLng,
        map: map,
    }); 
    allMarker.push(marker)
    let position = marker.getPosition()

    geocoder.geocode({ location: latLng }, (results, status) => {
        if (status === "OK") {
          if (results[0]) {
            bindDataToForm(results[0].formatted_address,position.lat(),position.lng())
          } 
          else {
            window.alert("No results found");
          }
        }
    })
    
}

function removeMarker() {
    allMarker.forEach((item) => item.setMap(null))
}