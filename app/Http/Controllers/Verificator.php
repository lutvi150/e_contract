<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\ProcessVerification;
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
    public function sendVerificator(Request $request)
    {
        $start=microtime(true);
        if ($request->verification=='true') {
            $status='success';
        } else {
            $status='refuse';
        }

        Contract::find($request->id)->update(['status'=>$status]);
        // data verification
        $verification=[
            'id_contract'=>$request->id,
            'id_user'=>$request->id_user,
            'reason'=>$request->reason,
            'created_at'=>date('Y-m-d H:i:s')
        ];
        ProcessVerification::insert($verification);
        $respon=[
            'status'=>'success',
            'msg'=>null,
            'content'=>null,
            'executed_time'=>microtime(true)-$start,
        ];
        return response()->json($respon,200);
    }
}
