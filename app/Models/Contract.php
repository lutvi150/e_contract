<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Contract extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuid;
    protected $keyType='string';
    public $incrementing=false;
    protected $guarded=[];
    protected $fillable=[
        'contract_number','job_name','id_skpd','id_user','id_field','ppk_name','ceiling','contract_value','procuretment_type','source_founds','status','method_selecttion','addenum'
    ];
}
