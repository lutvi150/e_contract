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
            $insert=[
                'lat'=>$request->lat,
                'lng'=>$request->lng,
                'id_contract'=>$request->id_contract,
                'created_at'=>date('Y-m-h H:i:s'),
                'updated_at'=>date('Y-m-h H:i:s'),
            ];
            Geolocation::where('id_contract',$request->id_contract)->delete();
            Geolocation::insert($insert);
            $respon=[
                'status'=>'success',
                'msg'=>'Save Success',
                'error'=>null,
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
    public function find(Request $request)
    {
        $start=microtime(true);
        $map=Geolocation::select('lat','lng')->where('id_contract',$request->id_contract)->first();
        $respon=[
            'status'=>'success',
            'msg'=>'Map Found',
            'error'=>null,
            'content'=>[
                'map'=>$map
            ],
            'time_exeuted'=>microtime(true)-$start,
        ];
        return response()->json($respon,200);
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
