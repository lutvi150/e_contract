@include('layouts.header')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        @include('user.tiles')

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Informasi</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sebaran Paket Konstruksi</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="col-md-12">
                        <style>
                            #mapid {
                                height: 500px;
                            }

                        </style>
                        {{-- <div id="mapid"></div> --}}
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->
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
<script >
    $(document).ready(function () {
        countTiles();
    });
    function countTiles() {
        $.ajax({
            type: "POST",
            url: "{{ url('user/contract/count') }}",
            data: {id_skpd:"{{ session()->get('field') }}",_token:"{{ csrf_token() }}"},
            dataType: "JSON",
            success: function (response) {
                if (response.status=='success') {
                    $(".success").text(response.data.contract);
                    $(".draf").text(response.data.draf);
                    $(".process").text(response.data.process);
                }
            }
        });
      }
</script>
@include('layouts.footer')
