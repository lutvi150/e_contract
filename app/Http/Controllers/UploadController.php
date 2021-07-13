<?php

namespace App\Http\Controllers;

use App\Models\FileAttachment;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dev.upload');
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
        $rules =
            [
            'attachment' => 'required|mimetypes:application/pdf|max:10000',
        ];
        $message = [
            'attachment.required' => 'File yang akan di upload tidak boleh kosong',
            'attachment.mimetypes' => 'Jenis file yang di izinkan hanya pdf',
            'attchment.max' => 'Maksimal Ukuran file hanyalan 10mb',
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            $respon = [
                'status' => 'error',
                'msg' => 'Validation Error',
                'error' => $validator->errors(),
                'content' => null,
            ];
        } else {
            $start = microtime(true);
            $id_contract = ($request->id_contract);
            $id_attachment=$request->id_attachment;
            $file = $request->file('attachment');
            $destination = 'attachment/' . $id_contract;
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extention;
            $file->move($destination, $fileName);
            $insert = [
                'id_contract' => $id_contract,
                'id_attachment' => $id_attachment,
                'file_attachment' => $fileName,
                'extention'=>$extention,
            ];
            $checkFile=FileAttachment::select('file_attachment')->where('id_contract',$id_contract)->where('id_attachment',$id_attachment)->first();
            if ($checkFile==null) {
            FileAttachment::insert($insert);
            } else {
                File::delete($destination."/".$checkFile['file_attachment']);
                FileAttachment::where('id_contract',$id_contract)->where('id_attachment',$id_attachment)->update($insert);
            }
            $end = microtime(true) - $start;
            $respon = [
                'status' => 'success',
                'msg' => 'File Success uploade',
                'error' => null,
                'content' =>null,
                'executed_time' => $end,
            ];
        }
        return response()->json($respon, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function show(Upload $upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function edit(Upload $upload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upload $upload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upload $upload)
    {
        //
    }
}
