<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class Verificator extends Controller
{
    public function countContract(Request $request)
    {
        $contract=Contract::select('id')->where('status','sucess')->count();
        $process=Contract::select('id')->where('status','process')->count();
        $draf=Contract::select('id')->where('status','draf')->count();
        $respon=[
            'status'=>'success',
            'msg'=>'Data Found',
            'erors'=>null,
            'content'=>null,
            'data'=>[
                'contract'=>$contract,
                'process'=>$process,
                'draf'=>$draf
            ],
        ];
        return response()->json($respon,200);
    }
}
