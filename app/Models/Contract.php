<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'contract_number','job_name','id_skpd','ppk_name','ceiling','contract_value','procuretment_type','source_founds','status','method_selecttion','addenum'
    ];
}
