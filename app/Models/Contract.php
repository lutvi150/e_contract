<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $fillable=[
        'contract_number','job_name','id_skpd','ppk_name','ceiling','contract_value','procuretment_type','source_founds','status','method_selecttion','addenum'
    ];
}
