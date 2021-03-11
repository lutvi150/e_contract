<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Contract;
use App\Models\skpd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContractController extends Controller
{

    public function contractCheck(Request $request)
    {
        $contract = Contract::where("contract_number", $request->contract_number);
        if ($contract->count() == 0) {
            $id=Contract::create([
                'contract_number' => $request->contract_number,
                'id_user' => $request->id_user,
                'id_field' => $request->id_field,
                'id_skpd' => $request->id_skpd,
                'status' => 'draf',
            ])->id;
            $respon = [
                'status' => 'success',
                'msg' => 'Contract Make it',
                'data' => [
                    'contract_number' => $request->contract_number,
                    'id'=>encrypt($id),
                ],
            ];
        } else {
            $respon = [
                'status' => 'failed',
                'msg' => 'Number Contract Already Exist',
                'data' => $contract->first(),
            ];
        }
        return response()->json($respon);
    }
    public function getContract(Request $request)
    {

        $contract = Contract::where('id_field', session()->get('id_field'))->select('contract_number', 'job_name', 'status', 'id')->orderBy('id','desc')->get();
        return view('user.contract', ['contract' => $contract]);
        // dd($contract);
    }
    public function editContract(Request $request)
    {
        $contract=Contract::find(decrypt($request->id));
        $skpd=skpd::select('id_skpd','skpd_name')->where('id_skpd',$contract->id_skpd)->first();
        // dd($skpd);
        return view('user.createContract',['contract'=>$contract,'skpd'=>$skpd]);
    }
    public function findContract(Request $request)
    {
        $contract=Contract::find(decrypt($request->id));
        $skpd=skpd::select('id_skpd','skpd_name')->where('id_skpd',$contract->id_skpd)->first();
        $attachment=$this->getAttachment();
        $respon = [
            'status' => 'success',
            'msg' => 'Contract found',
            'data' => [
                'contract' =>$contract,
                'skpd'=>$skpd,
                'attachment'=>$attachment
            ],
        ];
        return response()->json($respon,200);
    }
    public function updateContract(Request $request)
    {
        $rules=[
            'job_name'=>'required',
            'ppk_name'=>'required|alpha_dash',
            'ceiling'=>'required|numeric',
            'contract_value'=>'required|numeric',
            'source_founds'=>'required|alpha_dash',
        ];
        $message=[
            'job_name.required'=>'Nama Pekerjaan Wajib di Isi',
            'ppk_name.required'=>'Nama PPK Wajib di Isi',
            'ceiling.required'=>'Pagu Wajib di Isi',
            'contract_value.required'=>'Nilai Kontrak Wajib di Isi',
            'source_founds.required'=>'Sumber Dana Wajib di Isi'
        ];
        $validator=Validator::make($request->all(),$rules,$message);
        if ($validator->fails()) {
            $respon=[
                'status'=>'error',
                'msg'=>'Validation Error',
                'erors'=>$validator->errors(),
                'content'=>null
            ];
            return response()->json($respon,200);
        } else {
            $id=decrypt($request->id);
            $insert=[
                'job_name'=>$request->job_name,
                'ppk_name'=>$request->ppk_name,
                'ceiling'=>$request->ceiling,
                'contract_value'=>$request->contract_value,
                'source_founds'=>$request->source_founds,
                'procuretment_type'=>$request->procuretment,
                'method_selection'=>$request->method_selection,
            ];
            Contract::where('id',$id)->update($insert);
            $respon=[
                'status'=>'success',
                'msg'=>'Data Update',
                'erors'=>null,
                'content'=>null,
                'data'=>$insert
            ];
            return response()->json($respon,200);
        }
    }
    public function sendContract(Request $request)
    {
        $id=$request->id;
        Contract::where('id',$id)->update(['status'=>'process']);
        $respon=[
            'status'=>'success',
            'msg'=>'Data Update',
            'erors'=>null,
            'content'=>null,
            'data'=>null,
        ];
        return response()->json($respon,200);
    }
    public function countContractUser(Request $request)
    {
        $contract=Contract::where('id_skpd',1)->where('status','sucess')->count();
        $process=Contract::where('id_skpd',1)->where('status','process')->count();
        $draf=Contract::where('id_skpd',1)->where('status','draf')->count();
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
    public function getAttachment(Type $var = null)
    {
        $attachment=Attachment::select('id_attachment','attachment')->get();
        return $attachment;
    }
}
