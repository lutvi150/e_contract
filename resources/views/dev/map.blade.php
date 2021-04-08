<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/dist/css/bootstrap.css')}}">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <br>
        <br><br>
        <div class="row">
            <div class="col-md-6">

                <div class="text-center">

                    <div style="height: 400px" class="mapid text-center" id="mapid"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Lat</label>
                    <input type="text" name="" id="lat" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Help text</small>
                </div>
                <div class="form-group">
                    <label for="">Long</label>
                    <input type="text" name="" id="lng" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Help text</small>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{asset('assets/jquery/dist/jquery.js')}}"></script>
<script src="{{asset('assets/bootstrap/dist/js/bootstrap.js')}}"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
<script>
    $(document).ready(function () {
        map();
    });

    function map() {
        var mymap = L.map('mapid').setView([-0.45812, 100.59402], 10);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 30,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoibHV0dmkxNTAwIiwiYSI6ImNrbG0zdDJxbDA1aWUyeG53dGc1dDd0dnYifQ.x9x7gSeaZ4nYfHN27_RXow'
        }).addTo(mymap);
        mymap.invalidateSize();
        mymap.on('click', function (e) {
            // var coord = e.latlng.toString().split(',');
            // var lat = coord[0].split('LatLng(');
            // var lng = coord[1].split(')');

            let coord = e.latlng
            $('#lat').val(coord.lat);
            $('#lng').val(coord.lng);
            // sendCoordinate(coord);
        });
    };

    function sendCoordinate(coordinate) {
        $.ajax({
            type: "POST",
            url: "{{ url('api/geolocation/costume/coordinate') }}",
            data: {
                coordinate: coordinate
            },
            dataType: "JSON",
            success: function (response) {

            }
        });
    }

</script>

</html>
