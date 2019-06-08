function sendData() {
    var address = document.getElementById('address').value;

    alert(address);
    var request = new XMLHttpRequest();

    request.open('GET', 'handlers/readOne.php?digitalAddress='+address, true);

    request.onload = function () {
        var data = JSON.parse(this.response);
        var schoolName = data.schoolName;
        var latitude = data.lat;
        var longitude = data.lng;


        mapboxgl.accessToken = 'pk.eyJ1IjoiZGV2aW9uamF2ZSIsImEiOiJjanZiYXhwd2owY2I4M3pxdzBldjlqdWd1In0.nS2PprV8GhNK7y7v7rYGOw';
        var map = new mapboxgl.Map({
            container: 'display',
            style: 'mapbox://styles/mapbox/streets-v11',
            center:[longitude, latitude],
            zoom: 3
        });

        //map navigation control
        map.addControl(new mapboxgl.NavigationControl());

        //popup
        var popup = new mapboxgl.Popup({offset: 25}, {closeOnClick: false})
            .setLngLat([longitude, latitude])
            .setText(schoolName)
            .addTo(map);

        //marker
        var marker = new mapboxgl.Marker()
            .setLngLat([longitude, latitude])
            .setPopup(popup)
            .addTo(map);

        // The 'building' layer in the mapbox-streets vector source contains building-height data from OpenStreetMap.
        map.on('load', function() {
            // Insert the layer beneath any symbol layer.
            var layers = map.getStyle().layers;
            var labelLayerId;
            for (var i = 0; i < layers.length; i++) {
                if (layers[i].type === 'symbol' && layers[i].layout['text-field']) {
                    labelLayerId = layers[i].id;
                    break;
                }
            }

            map.addLayer({
                    'id': '3d-buildings',
                    'source': 'composite',
                    'source-layer': 'building',
                    'filter': ['==', 'extrude', 'true'],
                    'type': 'fill-extrusion',
                    'minzoom': 15,
                    'paint': {
                        'fill-extrusion-color': '#856335',
                        // use an 'interpolate' expression to add a smooth transition effect to the
                        // buildings as the user zooms in
                        'fill-extrusion-height': [
                            "interpolate", ["linear"], ["zoom"],
                            15, 0,
                            15.05, ["get", "height"]
                        ],
                        'fill-extrusion-base': [
                            "interpolate", ["linear"], ["zoom"],
                            15, 0,
                            15.05, ["get", "min_height"]
                        ],
                        'fill-extrusion-opacity': .6
                    }
                },
                labelLayerId);
        });


    };
    request.send();
}


function developers() {
    alert("We're getting there")
}
