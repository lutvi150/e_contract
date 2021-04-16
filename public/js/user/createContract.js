$(document).ready(function () {
    localStorage.removeItem('count_row');
    getData();
    map();
    check_district();
});

function check_district() {
    let html='';
    let datadistric = JSON.parse(localStorage.getItem('distric'));
    if (datadistric == null) {
        district();
    } else {
        datadistric.kecamatan.forEach(element => {
            html+=`<option value="`+element.id+`">`+element.nama+`</option>`;
        });
        $("#district1").html(html);
    }
}
function check_villages(id) {

    $('.text-loading').text('Loading Data Mohon Tunggu !!!!');
    $('#modalLoading').modal('show');
    let district_id=$('#district'+id).children('option:selected').val();
    $.ajax({
        type: "POST",
        url: url+"/villages",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {district_id:district_id},
        dataType: "JSON",
        success: function (response) {
            let html="";
            response.kelurahan.forEach(element => {
                html+=`<option value="`+element.id+`">`+element.nama+`</option>`;
            });
            $("#villages"+id).html(html);
            $('#modalLoading').modal('hide');
        },
        error: function (resposnse) {
            $('#modalLoading').modal('hide');
            $(".error-msg").text('Error Server Access !!');
            $("#modal-alert").modal("show");
        }
    });
 }

function district(id) {
    $('.text-loading').text('Loading Data Mohon Tunggu !!!!');
    $('#modalLoading').modal('show');
    $.ajax({
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url + "/district",
        dataType: "JSON",
        success: function (response) {
            let html="";
            localStorage.setItem('distric', JSON.stringify(response))
            response.kecamatan.forEach(element => {
                html+=`<option value="`+element.id+`">`+element.nama+`</option>`;
            });
            $("#district"+id).html(html);
            $('#modalLoading').modal('hide');
        },
        error: function (resposnse) {
            $('#modalLoading').modal('hide');
            $(".error-msg").text('Error Server Access !!');
            $("#modal-alert").modal("show");
        }
    });
}

function district_add() {
    let count_row = localStorage.getItem('count_row');
    let sum_row = '';
    if (count_row == null) {
        sum_row = 2
        localStorage.setItem('count_row', sum_row);
    } else {
        sum_row = parseInt(count_row) + 1;
        localStorage.setItem('count_row', sum_row);
    }
    let datadistric = JSON.parse(localStorage.getItem('distric'));
    let option='';
    datadistric.kecamatan.forEach(element => {
        option+=`<option value="`+element.id+`">`+element.nama+`</option>`;
    });
    let html = `                                                    <tr id="row` + sum_row + `">
     <td>` + sum_row + `</td>
     <td>
         <select name="district[]" class="form-control" onchange="check_villages(`+sum_row+`)" id="district`+sum_row+`">`+option+`</select>
     </td>
     <td>
         <select name="villages[]" class="form-control"  id="villages`+sum_row+`"></select>
     </td>
     <td>
         <button type="button" onclick="remove_row('row` + sum_row + `')" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>

     </td>
 </tr>`;
    $('#district_value').append(html);
    district(sum_row);
}

function remove_row(param) {
    let count_row=localStorage.getItem('count_row');
    localStorage.setItem('count_row',parseInt(count_row)-1);
    $('#'+param).remove();
}
$('#contract_date').datetimepicker({
    format: "DD/MM/YYYY"
});

function map() {
    var map = L.map('mapid').setView([-0.45812, 100.59402], 10);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 30,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoibHV0dmkxNTAwIiwiYSI6ImNrbG0zdDJxbDA1aWUyeG53dGc1dDd0dnYifQ.x9x7gSeaZ4nYfHN27_RXow'
    }).addTo(map);
    var theMarker = {};

    map.on('click', function (e) {
        lat = e.latlng.lat;
        lon = e.latlng.lng;

        console.log("You clicked the map at LAT: " + lat + " and LONG: " + lon);
        //Clear existing marker,

        if (theMarker != undefined) {
            map.removeLayer(theMarker);
        };

        //Add a marker to show where you clicked.
        theMarker = L.marker([lat, lon]).addTo(map);

        $('#lat').val(lat);
        $('#lng').val(lon);
    });

}

function refresh() {
    location.reload();
}


function getData() {
    let id = localStorage.getItem('id');
    $.ajax({
        type: "POST",
        url: url + "/user/contract/find",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
        },
        dataType: "JSON",
        success: function (response) {
            showFormContract(response.data, id)
            methodSelection(response);
            categoryProcurement(response);
            sourceFund(response);
            showMap();
            $(".loading").hide();
            $(".formCreate").show();
        },
        error: function (resposnse) {
            $(".error-msg").text('Error Server Access !!');
            $("#modal-alert").modal("show");
        }
    });
}

function showFormAttachement() {
    $('.text-loading').text('Loading File Mohon Tunggu !!!!');
    $('#modalLoading').modal('show');
    $.ajax({
        type: "POST",
        url: url + "/user/attachment/priview",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: $('#procuretment').children('option:selected').val(),
            id_contract: localStorage.getItem('id')
        },
        dataType: "JSON",
        success: function (response) {
            let html = '';
            let status = '';
            response.data.forEach(element => {
                if (element.file_attachment !== null) {
                    status = `<a href="#" onclick="priviewAttachment('` + element
                        .file_attachment + `','` + element.attachment +
                        `')" class="label label-success"><i class="fa fa-check" ></i> Sudah di Upload (Klik Untuk Priview)</a>`;
                } else {
                    status = ` <label for="" class="label label-danger">Belum di Upload</label>`
                }
                html += ` <tr>
                                                    <td>` + element.attachment + `</td>
                                                    <td>
                                                       ` + status + `
                                                    </td>
                                                    <td>
                                                        <a href="#" onclick="uploadAttachment(` + element
                    .id_attachment + `)"
                                                            class="btn btn-success btn-sm"><i
                                                                class="fa fa-upload"></i> Upload Lampiran</a>
                                                    </td>
                                                </tr>`;
            });
            $(".attachment").html(html);
            $('#modalLoading').modal('hide');

        },
        error: function () {
            $(".error-msg").text('Error Server Access !!');
            $("#modal-alert").modal("show");
        }
    });
}
// prview attachment
function priviewAttachment(param, title) {
    $('.show-file-attachment').html(`<embed src="`+url+`/attachment/`+param+`" style="width: 100%;height:700px">`)
    $('.title-show-attachment').text(title);
    $('#modelShowAttachment').modal('show');
}
// function for show method selection
function methodSelection(response) {
    let html = '';
    let selected = '';
    response.data.support_view.method_selection.forEach(element => {
        if (element.id == response.data.contract.method_selection) {
            selected = 'selected'
        } else {
            selected = '';
        }
        html += ` <option ` + selected + ` value="` + element.id + `">` + element.method + `</option>`;
    });
    $('#method_selection').html(html);
}

function categoryProcurement(response) {
    let html = '';
    let selected = '';
    response.data.support_view.category_procurement.forEach(element => {
        if (element.id == response.data.contract.procuretment_type) {
            selected = 'selected'
        } else {
            selected = '';
        }
        html += `<option ` + selected + ` value="` + element.id + `">` + element.category + `</option>`;
    });
    $('#procuretment').html(html)
}

function sourceFund(response) {
    let html = '';
    let selected = '';
    response.data.support_view.source_fund.forEach(element => {
        if (element.id == response.data.contract.source_founds) {
            selected = 'selected'
        } else {
            selected = '';
        }
        html += `<option ` + selected + ` value="` + element.id + `">` + element.source + `</option>`;
    });
    $('#source_fund').html(html)
}

function showFormContract(response, id) {
    $("#contract_number").val(response.contract.contract_number);
    $("#job_name").val(response.contract.job_name);
    $("#ppk_name").val(response.contract.ppk_name);
    $("#ceiling").val(response.contract.ceiling);
    $("#contract_value").val(response.contract.contract_value);
    $("#procuretment").children("option:selected").val();
    $("#method_selection").children("option:selected").val();
    $("#source_founds").val(response.contract.source_founds);
    $("#id_skpd").val(response.skpd.skpd_name);
    $('#provider').val(response.contract.provider);
    $('#contract_date').val(response.contract.contract_date);
    $("#id").val(id);
    make_currency();
}

function make_currency() {
    let contract_value = $('#contract_value');
    let ceiling = $('#ceiling');
    formatCurrency(contract_value);
    formatCurrency(ceiling);
}

function saveData() {
    $(".red").text("");
    $('.text-loading').text('Proses Simpan Data Ke Server Mohon Tunggu');
    $("#modalLoading").modal("show");
    let data = {
        job_name: $("#job_name").val(),
        ppk_name: $("#ppk_name").val(),
        ceiling: $("#ceiling").val(),
        contract_value: $("#contract_value").val(),
        procuretment: $("#procuretment").children("option:selected").val(),
        method_selection: $("#method_selection").children("option:selected").val(),
        source_founds: $("#source_fund").children('option:selected').val(),
        provider: $('#provider').val(),
        contract_date: $('#contract_date').val(),
        lat: $('#lat').val(),
        lng: $('#lng').val(),
        id: $("#id").val(),
    }
    // console.log(data);
    $.ajax({
        type: "POST",
        url: url + "/user/contract/update",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: data,
        dataType: "JSON",
        success: function (response) {
            if (response.status == 'error') {
                $('#modalLoading').modal('hide');
                let erors = response.erors;
                $(".job_name").text(erors.job_name);
                $(".ceiling").text(erors.ceiling);
                $(".contract_value").text(erors.contract_value);
                $(".ppk_name").text(erors.ppk_name);
                $(".source_founds").text(erors.source_founds);
                $('.contract_date').text(erors.contract_date);
                $('#modalLoading').modal('hide');
                // $(".red").fadeOut(5000);
            } else if (response.status == 'success') {
                $('#modalLoading').modal("hide");
                $('.text-success').text(' Data Kontrak Berhasil di simpan !!')
                $("#success").modal("show");
                // countDown();
            }
        },
        error: function () {
            $(".error-msg").text('Error Server Access !!');
            $("#modal-alert").modal("show");
        }
    });
}

function showMap() {
    let procuretment = $("#procuretment").children("option:selected").val();
    let html = '';
    if (procuretment == 4) {
        html = `<li role="presentation" class="active"><a href="#data_contract" id="home-tab" role="tab"
                                    data-toggle="tab" aria-expanded="true">Data Kontrak</a>
                            </li>
                            <li role="presentation" class=""><a href="#attachment" role="tab" id="profile-tab"
                                    data-toggle="tab" aria-expanded="false">Lampiran</a>
                            </li>
                            <li role="presentation" class="" hidden><a href="#map" role="tab" id="tab-map"
                                    data-toggle="tab" aria-expanded="false">Peta Lokasi</a>
                            </li>`
    } else {
        html = `<li role="presentation" class="active"><a href="#data_contract" id="home-tab" role="tab"
                                    data-toggle="tab" aria-expanded="true">Data Kontrak</a>
                            </li>
                            <li role="presentation" class=""><a href="#attachment" role="tab" id="profile-tab"
                                    data-toggle="tab" aria-expanded="false">Lampiran</a>
                            </li>`;
    }
    $('#myTab').html(html);
    showFormAttachement();
}

function saveMap() {
    let data = {
        lat: $('#lat').val(),
        lnt: $('#lng').val(),
    }
    $.ajax({
        type: "POSt",
        url: url + "/user",
        data: "data",
        dataType: "dataType",
        success: function (response) {

        }
    });
    console.log(data);
}

function redirect() {
    window.location.href = url + "/user/contract";
}

function countDown() {
    var countDownDate = new Date("Jan 5, 2022 15:37:25").getTime();
    var x = setInterval(function () {

        var now = new Date().getTime();

        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
}
// attachment
function uploadAttachment(id) {
    $(".id_attachment").val(id);
    $("#modelUploadAttachment").modal("show");
}

function sendAttachment() {
    $(".text-muted").text("");
    $('.text-loading').text('Proses Upload Data, Mohon tunggu');
    $('#modalLoading').modal("show");
    $("#formUpload").ajaxForm({
        url: url + "/upload/store",
        data: {
            id_contract: localStorage.getItem('id')
        },
        dataType: "JSON",
        success: function (response) {
            if (response.status == 'error') {
                $(".error-attachment").text(response.error.attachment);
                $('#modalLoading').modal("hide");
            } else if (response.status == 'success') {
                showFormAttachement();
                $('#modalLoading').modal("hide");
                $("#modelUploadAttachment").modal("hide");
                $('.text-success').text("Upload file lapiran kontrak success")
                $('#success').modal("show");
            }
        },
        error: function (response) {
            $(".error-attachment").text(response.error.attachment);
            $(".error-msg").text("Server Eror");
            $("#modal-alert").modal("show");
        }
    }).submit();
}
