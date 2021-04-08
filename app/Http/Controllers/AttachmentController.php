<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Contract;
use App\Models\FileAttachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function show(Attachment $attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function edit(Attachment $attachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attachment $attachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attachment $attachment)
    {
        //
    }
    public function attachmentPriview(Request $request)
    {
        $start=microtime(true);
        $id = $request->id;
        $id_contract=($request->id_contract);
        Contract::where('id',$id_contract)->update(['procuretment_type'=>$id]);
       $filter=$this->filterAttachment($id);
        foreach ($filter as $key => $value) {
            $checkAttachment=Attachment::select('attachment','id_attachment')->where('id_attachment',$value)->first();
            $checkFile=FileAttachment::where('id_contract',$id_contract)->where('id_attachment',$value)->pluck('file_attachment')->first();
            $file='';
            if ($checkFile!==null) {
                $file=$id_contract."/".$checkFile;
            } else {
                $file=null;
            }
            $attachment[]=[
                'attachment'=>$checkAttachment['attachment'],
                'id_attachment'=>$checkAttachment['id_attachment'],
                'file_attachment'=>$file,
            ];
        }
        $end=microtime(true)-$start;
        $response = [
            'status' => 'succes',
            'data' =>$attachment,
            'executed_time'=>$end,
        ];
        return response()->json($response, 200);
    }
    public function filterAttachment($id)
    {
        switch ($id) {
            case 4:
                $filter = [1, 2, 3, 4];
                break;
            case 1:
                $filter = [5, 6];
                break;
            case 2:
                $filter = [1, 7, 3];
                break;
            case 3:
                $filter = [8];
                break;
        }
        return $filter;
    }

}
