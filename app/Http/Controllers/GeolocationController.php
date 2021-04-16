<?php

namespace App\Http\Controllers;

use App\Models\Geolocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GeolocationController extends Controller
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
        $start=microtime(true);
        $rules=[
            'lat'=>'required',
            'lng'=>'required',
        ];
        $message=[
            'lat.required'=>'Lat lokasi tidak boleh kosong',
            'lng.required'=>'Lng lokasi tidak boleh kosong'
        ];
        $validator=Validator::make($request->all(),$rules,$message);
        if ($validator->fails()) {
            $respon=[
                'status'=>'error',
                'msg'=>'Validation Error',
                'error'=>$validator->errors(),
                'content'=>null,
                'executed_time'=>microtime(true)-$start,
            ];
        } else {
            $respon=[
                'status'=>'error',
                'msg'=>'Validation Error',
                'error'=>$validator->errors(),
                'content'=>null,
                'executed_time'=>microtime(true)-$start,
            ];
        }
        return response()->json($respon);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Geolocation  $geolocation
     * @return \Illuminate\Http\Response
     */
    public function show(Geolocation $geolocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Geolocation  $geolocation
     * @return \Illuminate\Http\Response
     */
    public function edit(Geolocation $geolocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Geolocation  $geolocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Geolocation $geolocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Geolocation  $geolocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Geolocation $geolocation)
    {
        //
    }
    public function costumeLogLnt(Request $request)
    {
        $coordinate=$request->coordinate;
        $respon=[
            'status'=>'success',
            'msg'=>null,
            'content'=>$coordinate,
        ];
    return response()->json($respon);
    }
}
