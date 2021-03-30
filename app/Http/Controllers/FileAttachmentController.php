<?php

namespace App\Http\Controllers;

use App\Models\FileAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileAttachmentController extends Controller
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
        // $rules=[
        //     'attachment'=>'required|file|mimes:pdf',
        // ];
        // $message=[
        //     'attachment.required'=>'Document Harus di upload',
        //     'attachment.mimes'=>'Type File yang di zinkan hanya pdf',
        // ];
        // $validator=Validator::make($request->all(),$rules,$message);
        // if ($validator->fails()) {
        //     $respon=[
        //         'status'=>'error',
        //         'msg'=>'Validation Error',
        //         'erors'=>$validator->errors(),
        //         'content'=>null,
        //     ];
        //     return response()->json($respon,200);
        // } else {
        //     $fileAttachment=$request->attachtment->getClientOriginalExtension();
        //     $insert=[
        //         'id_contract'=>decrypt($request->id),
        //         'id_attachment'=>$request->id_attachment,
        //         'file_attachment'=>$fileAttachment
        //     ];

        //     $respon=[
        //         'status'=>'success',
        //         'msg'=>'Data Create',
        //         'erors'=>null,
        //         'content'=>null,
        //         'data'=>$insert,
        //     ];
        //     return response()->json($respon,200);
        // }
        return response()->json($request->allFiles()    );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileAttachment  $fileAttachment
     * @return \Illuminate\Http\Response
     */
    public function show(FileAttachment $fileAttachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileAttachment  $fileAttachment
     * @return \Illuminate\Http\Response
     */
    public function edit(FileAttachment $fileAttachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileAttachment  $fileAttachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileAttachment $fileAttachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileAttachment  $fileAttachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileAttachment $fileAttachment)
    {
        //
    }
}
