columns: [{
    data: 'id',
    render: function (data, type,row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
    }
},
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
    render:function(data,type){
        let css='';
        let status='';
        if (data=='draf') {
            css='danger';
            status='Draf';
        } else if (data=='process') {
            css='warning';
            status='Prosess';
        } else if (data=='success') {
            css='success';
            status='Sukses';
        } else if (data=='refuse') {
            css='danger';
            status='Di Tolak';
        }
        return `<label for="" class="label label-`+css+`">`+status+`</label>`;
    }
},
{
    data: 'status.id',
    name:'edit',
    render:function(data,status){
        return data;
        // let html='';
        // if (data=='draf') {
        //     html=`<a href="#" class="btn btn-success btn-sm"
        //                 onclick="sendContract();"><i class="fa fa-send"></i> Kirim</a>
        //             <a href="#" data-id="" onclick="edit()"
        //                 class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
        //             <a href="#" class="btn btn-danger btn-sm"
        //                 onclick="deleteData()"><i class="fa fa-trash"></i>
        //                 Hapus</a>`;
        // } else if (data=='success') {
        //     html=`<a href="{{ url('contract/')}}" target="_blank"
        //                 class="btn btn-warning btn-sm"><i class="fa fa-print"></i> Cetak</a>
        //             <a href="#" class="btn btn-warning btn-sm"><i
        //                     class="fa fa-hand-o-up"></i>Adendum</a>`;
        // }
        // return html;
    }
},
]
