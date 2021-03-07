<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <title>Document</title>
</head>

<body>
    <div class="container">

    <style>
        #mapid {
            height: 500px;
        }

    </style>
    <div id="mapid"></div>
    </div>
</body>
<script src="{{asset('assets/jquery/dist/jquery.js')}}"></script>
<script src="{{asset('assets/bootstrap/dist/js/bootstrap.js')}}"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
<script>
    var mymap = L.map('mapid').setView([-0.45812,100.59402], 17);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoibHV0dmkxNTAwIiwiYSI6ImNrbG0zdDJxbDA1aWUyeG53dGc1dDd0dnYifQ.x9x7gSeaZ4nYfHN27_RXow'
    }).addTo(mymap);

</script>

</html>
