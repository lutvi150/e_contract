<?php

namespace App\Http\Controllers;

use App\Models\PackageLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PackageLocationController extends Controller
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
     * @param  \App\Models\PackageLocation  $packageLocation
     * @return \Illuminate\Http\Response
     */
    public function show(PackageLocation $packageLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageLocation  $packageLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageLocation $packageLocation)
    {
        $location = PackageLocation::where('id_contract', $packageLocation->id)->get();
        $respon = [
            'status' => 'success',
            'msg' => null,
            'content' => $location,
            'id' => $packageLocation->id,
        ];
        return response()->json($respon, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackageLocation  $packageLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackageLocation $packageLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageLocation  $packageLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageLocation $packageLocation)
    {
        //
    }
    public function find(Request $request)
    {
        $start = microtime(true);
        $location = PackageLocation::select('villages', 'district')->where('id_contract', $request->id)->get();
        $result = [];
        if ($location !== null) {
            foreach ($location as $key => $value) {
                $result[] = [
                    'district' => $value['district'],
                    'district_name'=>Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan/'.$value['district'])->json()['nama'],
                    'villages'=>$value['villages'],
                    'villages_name'=>Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan/'.$value['villages'])->json()['nama'],
                ];
            }
        }
        $respon = [
            'status' => 'success',
            'msg' => null,
            'content' => $result,
            'time_executed' => microtime(true) - $start,
        ];
        return response()->json($respon, 200);
    }
    public function tesApi(Type $var = null)
    {
        $arr=Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan/3214080')->json();
        return $arr['nama'];
    }
}
