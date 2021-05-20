@include('layouts.header')
<script src="{{ asset('assets/jqform/form/dist/jquery.form.min.js') }}"></script>
<script src={{ asset('assets/moment/moment.js') }}></script>
<link rel="stylesheet" href={{ asset('assets/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}>
<script src={{ asset('assets/bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js') }}></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
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

                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="data_contract"
                                    aria-labelledby="home-tab">
                                    <div class="row">
                                        <form action="{{ route('user-contract-update') }}" id="saveContract" method="post">
                                        <input type="text" name="id" id="id" hidden value="">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">No. Kontrak</label>
                                                <input type="text" name="contract_number" id="contract_number"
                                                    class="form-control" placeholder="" value=""
                                                    aria-describedby="helpId">
                                                <small id="helpId" class="text-muted red contract_number"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tanggal Kontrak</label>
                                                <input type="text" name="contract_date" id="contract_date" class="form-control"
                                                    placeholder="" aria-describedby="helpId">
                                                <small id="helpId" class="text-muted red"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Nama Pekerjaan</label>
                                                <textarea name="job_name" class="form-control" id="job_name" cols="30"
                                                    rows="2"></textarea>
                                                <small id="helpId" class="text-muted red job_name"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">PPK</label>
                                                <input type="text" name="ppk_name" value="" id="ppk_name"
                                                    class="form-control" placeholder="" aria-describedby="helpId">
                                                <small id="helpId" class="text-muted red ppk_name"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <table class="table text-center">
                                                <thead>
                                                    <th style="width: 1px">No</th>
                                                    <th style="text-align: center">Kecamatan</th>
                                                    <th style="text-align: center">Desa</th>
                                                    <th style="width: 1px">Option</th>
                                                </thead>
                                                <tbody id="district_value" >
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <select name="district[]" class="form-control" id="district1" onchange="check_villages(1)"></select>
                                                        </td>
                                                        <td>
                                                            <select name="villages[]" class="form-control" id="villages1"></select>
                                                        </td>
                                                        <td>
                                                            <button type="button" onclick="district_add(1)" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></button>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Pagu</label>
                                                        <input type="text" data-type="currency" name="ceiling" value=""
                                                            id="ceiling" class="form-control"
                                                            placeholder="Rp 1,000,000.00" aria-describedby="helpId">
                                                        <small id="helpId" class="text-muted red ceiling"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Nilai Kontrak</label>
                                                        <input type="text" data-type="currency" name="contract_value"
                                                            value="" id="contract_value" class="form-control"
                                                            placeholder="Rp 1,000,000.00" aria-describedby="helpId">
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

                                                <div class="col-md-12">
                                                    <button class="btn btn-success btn-sm" type="button"
                                                        onclick="saveData()"><i class="fa fa-save"></i> Simpan</button>
                                                    <a href="{{ url("user/contract") }}" class="btn btn-info btn-sm"><i
                                                            class="fa fa-reply"></i>
                                                        Kembali</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
                                        <div class="col-md-12">
                                            <a href="{{ url("user/contract") }}" class="btn btn-info btn-sm"><i
                                                    class="fa fa-reply"></i>
                                                Kembali</a>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="map" aria-labelledby="profile-tab">
                                    <form action="" class="form-horizontal" id="formMap" method="post">
                                        <div class="row">
                                            <div class="col-md-8 text-center">
                                                <div style="height: 300px" class="mapid" id="mapid">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Lat</label>
                                                    <input type="text" name="" readonly id="lat" class="form-control"
                                                        placeholder="" readonly aria-describedby="helpId">
                                                        <span class="red e-lat"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Long</label>
                                                    <input type="text" name="" readonly id="lng" class="form-control"
                                                        placeholder="" aria-describedby="helpId">
                                                        <span class="red e-lng"></span>
                                                </div>
                                                <button type="button" class="btn btn-success sm"
                                                    onclick="saveMap()">Simpan Peta</button>
                                            </div>
                                            <div class="col-md-12">
                                                <a href="{{ url("user/contract") }}" class="btn btn-info btn-sm"><i
                                                        class="fa fa-reply"></i>
                                                    Kembali</a>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>
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
<!-- Modal loading -->
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
<div class="modal fade" id="modelShowAttachment" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title-show-attachment">Modal title</h5>

            </div>
            <div class="modal-body">
                <div class="show-file-attachment">
                    <embed src={{asset('attachment/b9c136df-b1d6-456b-ad72-17f2e8fb24e1/1618536359.pdf') }} style="width: 100%;height:700px">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- server alert --}}
<div class="modal fade" id="modal-alert" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alert</h5>

            </div>
            <div class="modal-body">
                <p class="error-msg"></p>
                {{-- <p id="demo"></p> --}}
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-primary" onclick="refresh()"><i class="fa fa-refresh"></i> Refresh
                    Halaman</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal error-->
<div class="modal fade" id="modal-error" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title error-title">Modal title</h5>
            </div>
            <div class="modal-body">
                <div class="error-text"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script src={{ asset('js/currency.js') }}></script>
<script src={{ asset('js/user/createContract.js') }}></script>
<!-- /page content -->

@include('layouts.footer')
