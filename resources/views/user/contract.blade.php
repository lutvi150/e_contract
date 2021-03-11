@include('layouts.header')
@include('layouts.datatable')

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
                                    <th style="width: 10px">Status</th>
                                    <th style="width: 160px">Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($contract as $item)
                                    <td>{{$no++}}</td>
                                <td>{{ $item->contract_number }}</td>
                                <td>{{ $item->job_name }}</td>
                                <td>
                                    @if ($item->status=='draf')
                                    <label for="" class="label label-danger">Draf</label>
                                    @elseif ($item->status=='process')
                                    <label for="" class="label label-warning">Process</label>
                                    @elseif ($item->status=='success')
                                    <label for="" class="label label-success">Success</label>
                                    @elseif ($item->status=='refuse')
                                    <label for="" class="label label-danger">Di Tolak</label>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status=='draf')
                                    <a href="#" class="btn btn-success btn-sm" onclick="sendContract({{ $item->id}});"><i class="fa fa-send"></i> Kirim</a>
                                    <a href="#" data-id="" onclick="edit('{{ encrypt($item->id) }}')" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>

                                    @endif
                                    @if ($item->status=='success')
                                    <a href="{{ url('contract/'.encrypt($item->id)) }}" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> Cetak</a>
                                    <a href="#" class="btn btn-warning btn-sm"><i
                                        class="fa fa-hand-o-up"></i>Adendum</a>
                                    @endif


                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal send contract -->
<div class="modal fade" id="modalSendContract" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="sendConfirmContract()">Save</button>
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
                <button type="button" class="btn btn-secondary" onclick="redirect()" >tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->
<script>
    $("#data-contract").DataTable();
    $(document).ready(function () {
        // showDataContract();
    });
    function redirect() {
         window.location.href="{{ url('user/contract') }}";
      }
      function edit(id) {
          localStorage.setItem("id",id);
          window.location.href="{{url('user/contract/create')}}"
       }
    function showDataContract() {
        $('.data-contract').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{url('user/contract/get')}}",
            columns: [
                {
                    data: 'contract_number',
                    name: 'contract_number'
                },
                {
                    data: 'job_name',
                    name: 'job_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ]
        });
    }

    function showRegister() {
        $("#numberContract").val("");
        $(".text-muted").text("");
        $("#modalRegister").modal("show");
    }
    function sendConfirmContract(){
        let id=$("#id").val();
        $.ajax({
            type: "POST",
            url: "{{ url('user/contract/sendContract') }}",
            data: {id:id,_token:"{{ csrf_token() }}"},
            dataType: "JSON",
            success: function (response) {
                if (response.status=='success') {
                    $("#modalSendContract").modal("hide");
                    $("#success").modal("show");
                }
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
                id_user: "{{ session()->get('data.id_user') }}",
                id_field: "{{ session()->get('data.id_field') }}",
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
                        localStorage.setItem('id',response.data.id);
                        window.location.href = "{{url('user/contract/create')}}";
                    }
                }
            });
        }
    }

    function hideText() {
        setTimeout(function () {
            $(".text-muted").text("");
        }, 3000);
    }

</script>
@include('layouts.footer')
