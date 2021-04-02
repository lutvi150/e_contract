@include('layouts.header')
<script src="{{ asset('assets/jqform/form/dist/jquery.form.min.js') }}"></script>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Register Kontrak</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row form-contract">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Isi Data Kontrak</h2>

                        <div class="clearfix"></div>
                    </div>
                    @include('layouts.loading')
                    <div class="x_content formCreate" hidden>

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#data_contract" id="home-tab" role="tab"
                                        data-toggle="tab" aria-expanded="true">Data Kontrak</a>
                                </li>
                                <li role="presentation" class=""><a href="#attachment" role="tab" id="profile-tab"
                                        data-toggle="tab" aria-expanded="false">Lampiran</a>
                                </li>
                                {{-- <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2"
                                        data-toggle="tab" aria-expanded="false">Profile</a>
                                </li> --}}
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="data_contract"
                                    aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="id" id="id" hidden value="">
                                            <div class="form-group">
                                                <label for="">No. Kontrak</label>
                                                <input type="text" name="contract_number" id="contract_number" readonly
                                                    class="form-control" placeholder="" value=""
                                                    aria-describedby="helpId">
                                                <small id="helpId" class="text-muted red contract_number"></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nama Pekerjaan</label>
                                                <textarea name="job_name" class="form-control" id="job_name" cols="30"
                                                    rows="2"></textarea>
                                                <small id="helpId" class="text-muted red job_name"></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="">SKPD</label>
                                                <input type="text" name="id_skpd" readonly class="form-control" value=""
                                                    id="id_skpd">
                                                <small id="helpId" class="text-muted red"></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="">PPK</label>
                                                <input type="text" name="ppk_name" value="" id="ppk_name"
                                                    class="form-control" placeholder="" aria-describedby="helpId">
                                                <small id="helpId" class="text-muted red ppk_name"></small>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Pagu</label>
                                                        <input type="text" name="ceiling" value="" id="ceiling"
                                                            class="form-control" placeholder=""
                                                            aria-describedby="helpId">
                                                        <small id="helpId" class="text-muted red ceiling"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Nilai Kontrak</label>
                                                        <input type="text" name="contract_value" value=""
                                                            id="contract_value" class="form-control" placeholder=""
                                                            aria-describedby="helpId">
                                                        <small id="helpId"
                                                            class="text-muted red contract_value"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Penyedia</label>
                                                        <input type="text" name="provider" id="provider"
                                                            class="form-control" placeholder=""
                                                            aria-describedby="helpId">
                                                        <small id="helpId" class="text-muted red provider"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Jenis Pengadaan </label>
                                                        <select name="procuretment" class="form-control"
                                                            onchange="showMap()" id="procuretment">

                                                        </select>
                                                        <small id="helpId" class="text-muted red procuretment"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Metode Pemilihan</label>
                                                        <select name="method_selection" class="form-control"
                                                            id="method_selection">

                                                        </select>
                                                        <small id="helpId"
                                                            class="text-muted red method_selection"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Sumber Dana</label>
                                                        <select name="source_founds" id="source_fund"
                                                            class="form-control">
                                                        </select>
                                                        <small id="helpId" class="text-muted red source_founds"></small>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade " id="attachment"
                                    aria-labelledby="profile-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <thead>
                                                    <th>Jenis Lampiran</th>
                                                    <th>Status</th>
                                                    <th>Menu</th>
                                                </thead>
                                                <tbody class="attachment">
                                                    <tr>
                                                        <td>Surat Perintah Kerja/ Surat Perjanjian/ Surat Pesanan</td>
                                                        <td>
                                                            <label for="" class="label label-danger">Belum di
                                                                Upload</label>
                                                        </td>
                                                        <td>
                                                            <a href="#" onclick="uploadAttachment(1)"
                                                                class="btn btn-success btn-sm"><i
                                                                    class="fa fa-upload"></i> Upload Lampiran</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content3"
                                    aria-labelledby="profile-tab">
                                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin
                                        coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next
                                        level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                        photo
                                        booth letterpress, commodo enim craft beer mlkshk </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-success btn-sm" type="button" onclick="saveData()"><i
                                    class="fa fa-save"></i> Simpan</button>
                            <a href="{{ url("user/contract") }}" class="btn btn-info btn-sm"><i class="fa fa-reply"></i>
                                Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- map location --}}
        <div class="row map" hidden>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Pilih Lokasi Pekerjaan Konstruksi</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">


                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-success btn-sm" type="button" onclick="#"><i
                                        class="fa fa-save"></i> Simpan</button>
                                <a href="#" class="btn btn-info btn-sm"><i class="fa fa-reply"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Success</h5>
            </div>
            <div class="modal-body">
                <p class="text-success">
                    Data Kontrak Berhasil di simpan !!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" >tutup</button>
            </div>
        </div>
    </div>
</div>

{{-- upload attachment --}}
<div class="modal fade" id="modelUploadAttachment" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Lampiran</h5>

            </div>
            <div class="modal-body">
                <form action="{{ url('upload/storae') }}" enctype="multipart/form-data" method="post" id="formUpload">
                    @csrf
                    <input type="text" hidden name="id_attachment" class="id_attachment">
                    <input type="file" name="attachment" id="file-attachment">
                    <span class="text-muted red error-attachment"></span>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" onclick="sendAttachment()"><i class="fa fa-upload"></i>
                    Upload</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalLoading" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Loading</h5>

            </div>
            <div class="modal-body">
                <div class="text-center">

                    <p class="text-loading">Loading File Mohon Tunggu !!!!</p>
                    <div class="x_content">
                        <div class="loader">Loading...</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- Modal show attachment -->
<div class="modal fade" id="modelShowAttachment" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title-show-attachment">Modal title</h5>

            </div>
            <div class="modal-body">
                <div class="show-file-attachment"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@include('layouts.serveralert');
<!-- /page content -->
<script>
    $(document).ready(function () {
        getData();
    });

    function refresh() {
        location.reload();
    }

    function getData() {
        let id = localStorage.getItem('id');
        $.ajax({
            type: "POST",
            url: "{{ url('user/contract/find') }}",
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            dataType: "JSON",
            success: function (response) {
                showFormContract(response.data, id)
                methodSelection(response);
                categoryProcurement(response);
                sourceFund(response);
                showFormAttachement()
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
            url: "{{ url('user/attachment/priview') }}",
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
                let status='';
                response.data.forEach(element => {
                    if (element.file_attachment!==null) {
                        status=`<a href="#" onclick="priviewAttachment('`+element.file_attachment+`','`+element.attachment+`')" class="label label-success"><i class="fa fa-check" ></i> Sudah di Upload (Klik Untuk Priview)</a>`;
                    } else{
                        status=` <label for="" class="label label-danger">Belum di Upload</label>`
                    }
                    html += ` <tr>
                                                        <td>` + element.attachment + `</td>
                                                        <td>
                                                           `+status+`
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

            },error:function(){
                $(".error-msg").text('Error Server Access !!');
                $("#modal-alert").modal("show");
            }
        });
    }
    // prview attachment
    function priviewAttachment (param,title) {
        $('.show-file-attachment').html(`<embed src="{{ asset('attachment/`+param+`') }}" style="width: 100%;height:700px" type="">`)
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
        $("#id").val(id);
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
            id: $("#id").val(),
            _token: "{{ csrf_token() }}"
        }
        // console.log(data);
        $.ajax({
            type: "POST",
            url: "{{ url('user/contract/update') }}",
            data: data,
            dataType: "JSON",
            success: function (response) {
                if (response.status == 'error') {

                    let erors = response.erors;
                    $(".job_name").text(erors.job_name);
                    $(".ceiling").text(erors.ceiling);
                    $(".contract_value").text(erors.contract_value);
                    $(".ppk_name").text(erors.ppk_name);
                    $(".source_founds").text(erors.source_founds);
                    // $(".red").fadeOut(5000);
                } else if (response.status == 'success') {
                    $('#modalLoading').modal("hide");
                    $('.text-success').text(' Data Kontrak Berhasil di simpan !!')
                    $("#success").modal("show");
                    // countDown();
                }
            },error:function(){
                $(".error-msg").text('Error Server Access !!');
                $("#modal-alert").modal("show");
            }
        });
    }

    function showMap() {
        let procuretment = $("#procuretment").children("option:selected").val();
        showFormAttachement();
    }

    function redirect() {
        window.location.href = "{{ url('user/contract') }}";
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
            url:"{{ url('upload/store') }}",
            data:{id_contract:localStorage.getItem('id')},
            dataType:"JSON",
            success:function(response){
                if (response.status=='error') {
                    $(".error-attachment").text(response.error.attachment);
                    $('#modalLoading').modal("hide");
                } else if (response.status=='success') {
                    showFormAttachement();
                    $('#modalLoading').modal("hide");
                    $("#modelUploadAttachment").modal("hide");
                    $('.text-success').text("Upload file lapiran kontrak success")
                    $('#success').modal("show");
                }
            },error:function(response){
                $(".error-attachment").text(response.error.attachment);
                $(".error-msg").text("Server Eror");
                $("#modal-alert").modal("show");
            }
        }).submit();
    }

</script>
@include('layouts.footer')
