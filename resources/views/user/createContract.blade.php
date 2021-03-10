@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/loading.css') }}">
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
                    <div class="x_content loading">
                        <div class="loader">Loading...</div>
                    </div>
                    <div class="x_content formCreate" hidden>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="id" id="id" hidden value="">
                                <div class="form-group">
                                    <label for="">No. Kontrak</label>
                                    <input type="text" name="contract_number" id="contract_number" readonly
                                        class="form-control" placeholder="" value="" aria-describedby="helpId">
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
                                    <input type="text" name="ppk_name" value="" id="ppk_name" class="form-control"
                                        placeholder="" aria-describedby="helpId">
                                    <small id="helpId" class="text-muted red ppk_name"></small>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Pagu</label>
                                            <input type="text" name="ceiling" value="" id="ceiling" class="form-control"
                                                placeholder="" aria-describedby="helpId">
                                            <small id="helpId" class="text-muted red ceiling"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nilai Kontrak</label>
                                            <input type="text" name="contract_value" value="" id="contract_value"
                                                class="form-control" placeholder="" aria-describedby="helpId">
                                            <small id="helpId" class="text-muted red contract_value"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Jenis Pengadaan </label>
                                            <select name="procuretment" class="form-control" onchange="showMap()"
                                                id="procuretment">
                                                <option value="1">Barang</option>
                                                <option value="2">Jasa Konsultansi</option>
                                                <option value="3">Jasa Lainnya</option>
                                                <option value="4">Konstruksi</option>
                                            </select>
                                            <small id="helpId" class="text-muted red procuretment"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Metode Pemilihan</label>
                                            <select name="method_selection" class="form-control" id="method_selection">
                                                <option value="1">E-Purchasing</option>
                                                <option value="2">Pengadaan Langsung</option>
                                                <option value="3">Penunjukan Langsung</option>
                                                <option value="4">Seleksi</option>
                                                <option value="5">Tender</option>
                                                <option value="6">Tender Cepat</option>
                                            </select>
                                            <small id="helpId" class="text-muted red method_selection"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Sumber Dana</label>
                                    <input type="text" name="source_founds" value="" id="source_founds"
                                        class="form-control" placeholder="" aria-describedby="helpId">
                                    <small id="helpId" class="text-muted red source_founds"></small>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-success btn-sm" type="button" onclick="saveData()"><i
                                        class="fa fa-save"></i> Simpan</button>
                                <a href="{{ url("user/contract") }}" class="btn btn-info btn-sm"><i
                                        class="fa fa-reply"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                Data Kontrak Berhasil di simpan !!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="redirect()">tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->
<script>
    $(document).ready(function () {
        getData();
    });

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
                $("#contract_number").val(response.data.contract.contract_number);
                $("#job_name").val(response.data.contract.job_name);
                $("#ppk_name").val(response.data.contract.ppk_name);
                $("#ceiling").val(response.data.contract.ceiling);
                $("#contract_value").val(response.data.contract.contract_value);
                $("#procuretment").children("option:selected").val();
                $("#method_selection").children("option:selected").val();
                $("#source_founds").val(response.data.contract.source_founds);
                $("#id_skpd").val(response.data.skpd.skpd_name);
                $("#id").val(id);
            }
        });
    }

    function saveData() {
        $(".red").text("");
        let data = {
            job_name: $("#job_name").val(),
            ppk_name: $("#ppk_name").val(),
            ceiling: $("#ceiling").val(),
            contract_value: $("#contract_value").val(),
            procuretment: $("#procuretment").children("option:selected").val(),
            method_selection: $("#method_selection").children("option:selected").val(),
            source_founds: $("#source_founds").val(),
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
                    $("#success").modal("show");
                }
            }
        });
    }

    function showMap() {
        let procuretment = $("#procuretment").children("option:selected").val();
        console.log(procuretment);
    }

    function redirect() {
        window.location.href = "{{ url('user/contract') }}";
    }

</script>
@include('layouts.footer')
