@include('layouts.header')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Register Kontrak</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Isi Data Kontrak</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">No. Kontrak</label>
                                    <input type="text" name="contract_number" id="contract_number" readonly
                                        class="form-control" placeholder="" aria-describedby="helpId">
                                    <small id="helpId" class="text-muted red contract_number"></small>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Pekerjaan</label>
                                    <textarea name="joba_name" class="form-control" id="job_name" cols="30" rows="2"></textarea>
                                    <small id="helpId" class="text-muted red job_name"></small>
                                </div>
                                <div class="form-group">
                                    <label for="">SKPD</label>
                                    <input type="text" name="id_skpd" readonly class="form-control"  id="id_skpd">
                                    <small id="helpId" class="text-muted red"></small>
                                </div>
                                <div class="form-group">
                                    <label for="">PPK</label>
                                    <input type="text" name="ppk_name" id="ppk_name" class="form-control" placeholder=""
                                        aria-describedby="helpId">
                                    <small id="helpId" class="text-muted red"></small>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Pagu</label>
                                            <input type="text" name="" id="" class="form-control" placeholder=""
                                                aria-describedby="helpId">
                                            <small id="helpId" class="text-muted red"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nilai Kontrak</label>
                                            <input type="text" name="" id="" class="form-control" placeholder=""
                                                aria-describedby="helpId">
                                            <small id="helpId" class="text-muted">Help text</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Jenis Pengadaan </label>
                                            <select name="" class="form-control" id="">
                                                <option value="1">Barang</option>
                                                <option value="2">Jasa Konsultansi</option>
                                                <option value="3">Jasa Lainnya</option>
                                                <option value="4">Konstruksi</option>
                                            </select>
                                            <small id="helpId" class="text-muted">Help text</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Metode Pemilihan</label>
                                            <select name="" class="form-control" id="">
                                                <option value="">E-Purchasing</option>
                                                <option value="">Pengadaan Langsung</option>
                                                <option value="">Penunjukan Langsung</option>
                                                <option value="">Seleksi</option>
                                                <option value="">Tender</option>
                                                <option value="">Tender Cepat</option>
                                            </select>
                                            <small id="helpId" class="text-muted">Help text</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Sumber Dana</label>
                                    <input type="text" name="" id="" class="form-control" placeholder=""
                                        aria-describedby="helpId">
                                    <small id="helpId" class="text-muted">Help text</small>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
                                <a href="" class="btn btn-info btn-sm"><i class="fa fa-reply"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->
@include('layouts.footer')
