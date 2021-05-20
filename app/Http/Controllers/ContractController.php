<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\FileAttachment;
use App\Models\Geolocation;
use App\Models\PackageLocation;
use App\Models\skpd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ContractController extends Controller
{

    public function contractCheck(Request $request)
    {
        $contract = Contract::select('contract_number')->where("contract_number", $request->contract_number)->first();
        if ($contract == null) {
            $store = [
                'contract_number' => $request->contract_number,
                'id_user' => $request->id_user,
                'id_field' => $request->id_field,
                'id_skpd' => $request->id_skpd,
                'status' => 'draf',
            ];
            $id = Contract::create($store)->id;
            $respon = [
                'status' => 'success',
                'msg' => 'Contract Make it',
                'data' => [
                    'contract_number' => $request->contract_number,
                    'id' => ($id),
                ],
            ];
        } else {
            $respon = [
                'status' => 'failed',
                'msg' => 'Number Contract Already Exist',
                'data' => $contract,
            ];
        }
        return response()->json($respon);
    }
    public function getContract(Request $request)
    {
        if ($request->session()->get('data.role') == 1) {
            $contract = Contract::where('id_user', session()->get('data.id'))->select('contract_number', 'job_name', 'status', 'procuretment_type', 'id')->orderBy('id', 'desc')->get();
        } elseif ($request->session()->get('data.role') == 2) {
            $contract = Contract::where('status', '!=', 'draf')->select('contract_number', 'job_name', 'status', 'contracts.id', 'procuretment_type', 'skpds.skpd_name')->join('skpds', 'contracts.id_skpd', '=', 'skpds.id')->orderBy('id', 'desc')->get();
        }
        return DataTables::of($contract)->make(true);
        // dd($contract);
    }
    public function editContract(Request $request)
    {
        $contract = Contract::find($request->id);
        $skpd = skpd::select('id_skpd', 'skpd_name')->where('id_skpd', $contract->id_skpd)->first();
        // dd($skpd);
        return view('user.createContract', ['contract' => $contract, 'skpd' => $skpd]);
    }
    public function findContract(Request $request)
    {
        $start = microtime(true);
        $contract = Contract::find($request->id);
        $skpd = skpd::select('id_skpd', 'skpd_name')->where('id_skpd', $contract->id_skpd)->first();
        $support_view = $this->arraySupport();
        $end = microtime(true) - $start;
        $respon = [
            'status' => 'success',
            'msg' => 'Contract found',
            'data' => [
                'contract' => $contract,
                'skpd' => $skpd,
                'support_view' => $support_view,
            ],
            'executed_time' => $end,
        ];
        return response()->json($respon, 200);
    }
    // array for support view
    public function arraySupport(Type $var = null)
    {
        $result['category_procurement'] = [
            [
                'id' => 1,
                'category' => 'Barang',
            ], [
                'id' => 2,
                'category' => 'Jasa Konsultansi',
            ], [
                'id' => 3,
                'category' => 'Jasa Lainnya',
            ], [
                'id' => 4,
                'category' => 'Konstruksi',
            ],
        ];
        $result['method_selection'] = [
            [
                'id' => 1,
                'method' => 'E-Purchasing',
            ], [
                'id' => 2,
                'method' => 'Pengadaan Langsung',
            ], [
                'id' => 3,
                'method' => 'Penunjukan Langsung',
            ], [
                'id' => 4,
                'method' => 'Seleksi',
            ], [
                'id' => 5,
                'method' => 'Tender',
            ], [
                'id' => 6,
                'method' => 'Tender Cepat',
            ],
        ];
        $result['source_fund'] = [
            [
                'id' => 1,
                'source' => 'DAK',
            ], [
                'id' => 2,
                'source' => 'APBD',
            ], [
                'id' => 3,
                'source' => 'Hibah',
            ],
        ];
        return $result;
    }
    public function updateContract(Request $request)
    {
        $rules = [
            'job_name' => 'required',
            'ppk_name' => 'required',
            'ceiling' => 'required',
            'contract_value' => 'required',
            'source_founds' => 'required|alpha_dash',
            'provider' => 'required',
            'contract_date' => 'required',
        ];
        $message = [
            'job_name.required' => 'Nama Pekerjaan Wajib di Isi',
            'ppk_name.required' => 'Nama PPK Wajib di Isi',
            'ceiling.required' => 'Pagu Wajib di Isi',
            'contract_value.required' => 'Nilai Kontrak Wajib di Isi',
            'source_founds.required' => 'Sumber Dana Wajib di Isi',
            'provider.required' => 'Nama Penyedia Harus di isi',
            'contract_date' => 'Tanggal Kontrak Wajib di Isi',
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            $respon = [
                'status' => 'error',
                'msg' => 'Validation Error',
                'erors' => $validator->errors(),
                'content' => null,
            ];
            return response()->json($respon, 200);
        } else {
            $id = ($request->id);
            $replace = ['Rp', ','];
            $insert = [
                'job_name' => $request->job_name,
                'ppk_name' => $request->ppk_name,
                'ceiling' => str_replace($replace, '', $request->ceiling),
                'contract_value' => str_replace($replace, '', $request->contract_value),
                'source_founds' => $request->source_founds,
                'procuretment_type' => $request->procuretment,
                'method_selection' => $request->method_selection,
                'provider' => $request->provider,
                'contract_date' => $request->contract_date,
            ];
            $countLocation = count($request->district);
            for ($i = 0; $i < $countLocation; $i++) {
                $inserLocation[] = [
                    'id_contract' => $id,
                    'district' => $request->district[$i],
                    'villages' => $request->villages[$i],
                ];
            }
            if ($request->procuretment == 4) {
                $checkGeo = Geolocation::where('id_contract', $id)->first();
                if ($checkGeo == null) {
                    $respon = [
                        'status' => 'map not found',
                        'msg' => 'Maaf Data Tidak bisa di simpan dikarenakan anda belum menyimpan lokasi pekerjaan di peta',
                        'content' => null,
                    ];
                } else {
                    PackageLocation::where('id_contract', $id)->delete();
                    PackageLocation::insert($inserLocation);
                    Contract::where('id', $id)->update($insert);
                    $respon = [
                        'status' => 'success',
                        'msg' => 'Data Update',
                        'erors' => null,
                        'content' => null,
                    ];
                }
            } else {
                PackageLocation::where('id_contract', $id)->delete();
                PackageLocation::insert($inserLocation);
                Contract::where('id', $id)->update($insert);
                $respon = [
                    'status' => 'success',
                    'msg' => 'Data Update',
                    'erors' => null,
                    'content' => null,
                ];
            }

            return response()->json($respon, 200);
        }
    }
    public function sendContract(Request $request)
    {
        $start = microtime(true);
        $id = $request->id;
        $checkContract = Contract::select('job_name', 'procuretment_type', 'ppk_name', 'ceiling', 'contract_value', 'source_founds', 'method_selection', 'provider')->where('id', $id)->first();
        if ($checkContract['job_name'] == null || $checkContract['procuretment_type'] == null || $checkContract['ppk_name'] == null || $checkContract['ceiling'] == null || $checkContract['contract_value'] == null || $checkContract['source_founds'] == null || $checkContract['method_selection'] == null || $checkContract['provider'] == null) {
            $respon = [
                'status' => 'error',
                'msg' => 'field not fill',
                'error' => 'field not fill',
                'content' => null,
                'time_exeuted' => microtime(true) - $start,
            ];
        } else {
            $filter = app(AttachmentController::class)->filterAttachment($checkContract['procuretment_type']);
            $result = [];
            foreach ($filter as $key => $value) {
                $checkAttachmentFile = '';
                $checkAttachmentFile = FileAttachment::select('file_attachment')->where('id_contract', $id)->where('id_attachment', $value)->first();
                if ($checkAttachmentFile == null) {
                    break;
                } else {
                    $result[] = $checkAttachmentFile;
                }
            }
            if ($result == null) {
                $respon = [
                    'status' => 'error',
                    'msg' => 'attachment not found',
                    'error' => 'attachment not fount',
                    'content' => null,
                    'time_exeuted' => microtime(true) - $start,
                ];
            } else {
                $count_result = count($result);
                $count_filter = count($filter);
                if ($count_result == $count_filter) {
                    Contract::where('id', $id)->update(['status' => 'process']);
                    $respon = [
                        'status' => 'success',
                        'msg' => 'Data Update',
                        'erors' => null,
                        'content' => [
                            'terms' => $count_filter,
                            'fill' => $count_result,
                        ],
                        'time_executed' => microtime(true) - $start,
                    ];
                } else {
                    $respon = [
                        'status' => 'error',
                        'msg' => 'attachment not compleate',
                        'error' => 'attachment not compleate',
                        'content' => [
                            'terms' => $count_filter,
                            'fill' => $count_result,
                        ],
                        'time_exeuted' => microtime(true) - $start,
                    ];
                }
            }
        }

        return response()->json($respon, 200);
    }
    public function countContractUser(Request $request)
    {
        $contract = Contract::where('id_skpd', 1)->where('status', 'sucess')->count();
        $process = Contract::where('id_skpd', 1)->where('status', 'process')->count();
        $draf = Contract::where('id_skpd', 1)->where('status', 'draf')->count();
        $respon = [
            'status' => 'success',
            'msg' => 'Data Found',
            'erors' => null,
            'content' => null,
            'data' => [
                'contract' => $contract,
                'process' => $process,
                'draf' => $draf,
            ],
        ];
        return response()->json($respon, 200);
    }
    public function shoftDelete(Request $request)
    {
        $data = Contract::find(($request->id))->delete();
        $respon = [
            'status' => 'success',
            'msg' => 'data success deleted',
            'data' => $data,
        ];
        return response()->json($respon, 200);
    }
    public function getDistrict(Type $var = null)
    {
        $respon = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=1305');
        return $respon->body();
    }
    public function getVillages(Request $request)
    {
        $respon = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=' . $request->district_id);
        return $respon->body();
    }
    // use this for tes uuid
    public function getUiid(Request $request)
    {
        for ($i = 0; $i < 2000; $i++) {
            $model = Contract::create()->id;
        }
        // return response()->json($model);
    }
}
