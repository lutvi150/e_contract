@include('layouts.header')
@include('layouts.datatable')
<link rel="stylesheet" href="{{ asset('css/loading.css') }}">

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Kontrak Register </h3>
            </div>

            {{-- <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div> --}}
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Kontrak Register</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <p class="text-muted font-13 m-b-30">

                        </p>
                        <a href="#" class="btn btn-success btn-sm" onclick="showRegister()"><i
                                class="fa fa-book"></i>Register Kontrak</a>
                        <table id="data-contract"
                            class="table table-striped data-contract table-bordered dt-responsive nowrap"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nomor Kontrak</th>
                                    <th>Nama Pekerjaan</th>
                                    <th>Jenis Pengadaan</th>
                                    <th style="width: 10px">Status</th>
                                    <th style="width: 160px">Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal loading show --}}
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

<!-- Modal send contract -->
<div class="modal fade" id="modalSendContract" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Kirim Kontrak</h5>

            </div>
            <div class="modal-body">
                <input type="text" name="id" hidden id="id">
                Yakin akan kirim kontrak ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" onclick="sendConfirmContract()">Ya</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal register -->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register Kontrak</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nomor Kontrak</label>
                    <input type="text" name="numberContract" id="numberContract" class="form-control" placeholder=""
                        aria-describedby="helpId">
                    <small id="helpId" class="text-muted red msg-number-contract">Help text</small>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="prosesContract()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal success -->
<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Success</h5>
            </div>
            <div class="modal-body">
                Data Kontrak Berhasil di kirim !!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" >tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal delete data -->
<div class="modal fade" id="deleteData" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>

            </div>
            <div class="modal-body">
                Yakin akan hapus data ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" onclick="sendDeleteData()">Ya</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal eror -->
<div class="modal fade" id="errorMessage" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title error-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="error-msg"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->
<script>
    // $('#data-contract').DataTable();
    $(document).ready(function () {
        showDataContract();
    });

    function redirect() {
        window.location.href = "{{ url('user/contract') }}";
    }

    function edit(id) {
        localStorage.setItem("id", id);
        window.location.href = "{{url('user/contract/create')}}"
    }

    function showDataContract() {
        // $('.data-contract').DataTable();
        $('.data-contract').DataTable({
            destroy:true,
            processing: true,
            serverSide: true,
            ajax: "{{url('user/contract/get')}}",
            columnDefs: [{
                    mData: 'id',
                    aTargets: [0],
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    mData: 'contract_number',
                    aTargets: [1]
                },
                {
                    mData: 'job_name',
                    aTargets: [2]
                },
                {
                    mData: 'procuretment_type',
                    aTargets: [3],
                    render:function(data){
                        let procuretment='';
                        if (data==1) {
                            procuretment='Barang'
                        } else if (data==2) {
                            procuretment='Jasa Konsultansi'
                        } else if (data==3) {
                            procuretment='Jasa Lainnya'
                        } else if (data==4) {
                            procuretment='Konstruksi'
                        }
                        return procuretment;
                    }
                },
                {
                    mData: 'status',
                    aTargets: [4],
                    render: function (data) {
                        let css = '';
                        let status = '';
                        if (data == 'draf') {
                            css = 'danger';
                            status = 'Draf';
                        } else if (data == 'process') {
                            css = 'warning';
                            status = 'Prosess';
                        } else if (data == 'success') {
                            css = 'success';
                            status = 'Sukses';
                        } else if (data == 'refuse') {
                            css = 'danger';
                            status = 'Di Tolak';
                        }
                        return `<label for="" class="label label-` + css + `">` + status + `</label>`;
                    }
                }, {
                    mData: getidAndSatus,
                    aTargets: [5]
                }
            ],
        });
    }
    function getidAndSatus(data,type,dataToSet) {

        let html='';
        if (data.status=='draf') {
            html=`<a href="#" class="btn btn-success btn-sm"
                        onclick="sendContract('`+data.id+`');"><i class="fa fa-send"></i> Kirim</a>
                    <a href="#" data-id="" onclick="edit('`+data.id+`')"
                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-danger btn-sm"
                        onclick="deleteData('`+data.id+`')"><i class="fa fa-trash"></i>
                        Hapus</a>`;
        } else if (data.status=='success') {
            html=`<a href="{{ url('contract/`+data.id+`')}}" target="_blank"
                        class="btn btn-warning btn-sm"><i class="fa fa-print"></i> Cetak</a>
                    <a href="#" class="btn btn-warning btn-sm"><i
                            class="fa fa-hand-o-up"></i>Adendum</a>`;
        }
        return html;
     }
    function showRegister() {
        $("#numberContract").val("");
        $(".text-muted").text("");
        $("#modalRegister").modal("show");
    }

    function sendConfirmContract() {
        $('#modalSendContract').modal('hide');
        $('#modalLoading').modal('show');
        let id = $("#id").val();
        $.ajax({
            type: "POST",
            url: "{{ url('user/contract/sendContract') }}",
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            dataType: "JSON",
            success: function (response) {
                if (response.status == 'success') {
                    showDataContract();
                    $("#modalLoading").modal("hide");
                    $("#success").modal("show");
                } else if (response.status == 'error') {
                    if (response.msg == 'attachment not found') {
                        $('#modalLoading').modal('hide');
                        $('.error-title').text('Lampiran Tidak Lengkap');
                        $('.error-msg').text(
                            'Dokumen lampiran anda tidak lengkap silahkan check lagi sebelum mengirim kontrak'
                        );
                        $('#errorMessage').modal('show');
                    } else if (response.msg == 'attachment not compleate') {
                        $('#modalLoading').modal('hide');
                        $('.error-title').text('Lampiran Tidak Lengkap');
                        $('.error-msg').text(`Dokumen lampiran anda tidak lengkap, yang di persyaratkan ` +
                            response.content.terms + ` dokumen, sedangkan yang terpenuhi baru ` +
                            response.content.fill +
                            ` dokumen,  silahkan check lagi sebelum mengirim kontrak`);
                        $('#errorMessage').modal('show');
                    } else if (response.msg == 'field not fill') {
                        $('#modalLoading').modal('hide');
                        $('.error-title').text('Isian Kontrak Tidak Lengkap');
                        $('.error-msg').text(
                            'Isian pada kontrak tidak lengkap silahkan di check lagi untuk pengisian datanya'
                        );
                        $('#errorMessage').modal('show');
                    }
                }
            },
            error: function () {
                $('#modalSendContract').modal("hide");
                $(".error-title").text("Eror Webservice");
                $('.error-msg').text('Eror Webservice');
                $('#errorMessage').modal("show");
            }
        });
    }

    function sendContract(id) {
        $("#id").val(id);
        $("#modalSendContract").modal("show");
    }

    function prosesContract() {
        $(".text-muted").text("");
        let numberContract = $("#numberContract").val();
        if (numberContract == "") {
            $(".msg-number-contract").text("Nomor Kontrak Tidak Boleh Kosong");
            hideText();
        } else {
            let data = {
                contract_number: numberContract,
                id_user: "{{ session()->get('data.id') }}",
                id_field: "{{ session()->get('id_field') }}",
                id_skpd: "{{ session()->get('data.id_skpd') }}",
                _token: "{{ csrf_token() }}"
            }
            $.ajax({
                type: "POST",
                url: "{{ url('user/contract/store') }}",
                data: data,
                dataType: "JSON",
                success: function (response) {
                    if (response.status == 'failed') {
                        $(".msg-number-contract").text("Nomor Kontrak Sudah Terdaftar");
                    } else {
                        localStorage.setItem("numberContract", numberContract);
                        localStorage.setItem('id', response.data.id);
                        window.location.href = "{{url('user/contract/create')}}";
                    }
                }
            });
        }
    }

    function deleteData(id) {
        $("#id").val(id);
        $("#deleteData").modal("show");
    }

    function sendDeleteData() {
        let id = $("#id").val();
        $.ajax({
            type: "POSt",
            url: "{{url('user/contract/delete')}}",
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            dataType: "JSON",
            success: function (response) {
                showDataContract();
                $('#deleteData').modal("hide");
                $(".error-title").text("Success");
                $('.error-msg').text('Data berhasil di hapus');
                $('#errorMessage').modal("show");

            },
            error: function () {
                $('#deleteData').modal("hide");
                $(".error-title").text("Eror Webservice");
                $('.error-msg').text('Eror Webservice');
                $('#errorMessage').modal("show");
            }
        });
    }

    function hideText() {
        setTimeout(function () {
            $(".text-muted").text("");
        }, 3000);
    }

</script>
@include('layouts.footer')
