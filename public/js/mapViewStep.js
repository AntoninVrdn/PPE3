function initMap() {
    var allDestination =[]
    var directionsService = new google.maps.DirectionsService();
    var directionsRenderer = new google.maps.DirectionsRenderer({
        preserveViewport : true
    })

    const myLatLng = { lat: 47.3215806, lng: 5.0414701 };
    const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 14,
    center: myLatLng,
    });
    getStepCoord(allDestination)
    directionsRenderer.setMap(map);
    calcRoute(directionsService, directionsRenderer,allDestination)
    document.querySelector('#mode').addEventListener('change',() => calcRoute(directionsService, directionsRenderer,allDestination))

}

function getStepCoord(allDestination) {
    let stepCoords = document.querySelectorAll('h6.step')
    stepCoords.forEach((item) => {
        let latStep = parseFloat(item.textContent.slice(0, item.textContent.indexOf('_')))
        let lngStep = parseFloat(item.textContent.slice(item.textContent.indexOf('_')+1, item.textContent.length))
        let locationStep =new google.maps.LatLng({
            lat : latStep,
            lng : lngStep
        })
        let waypoint = {
            location: locationStep
        }
    allDestination.push(waypoint)
    })
}

function calcRoute(directionsService, directionsRenderer,allDestination) {
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
        travelMode: google.maps.TravelMode[selectedMode],
        unitSystem: google.maps.DirectionsUnitSystem.METRIC
    };
    directionsService.route(request, function(response, status) {
      if (status == 'OK') {
        directionsRenderer.setDirections(response);
        let allDistance = 0
        let time = 0
        response.routes[0].legs.forEach(leg => {
            allDistance += leg.distance.value
            time += leg.duration.value
        })
        // let distance = response.routes[0].legs[0].distance.text;
        document.querySelector("#distance").value = allDistance/1000 + " km"
        document.querySelector('#time').value = Math.floor(time/60) + " minutes"
      }
    });
}
  
