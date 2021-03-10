<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\skpd;
use Illuminate\Http\Request;
Use DNS1D;
Use DNS2D;
class PrintContract extends Controller
{
    public function PrintContract(Request $request)
    {
        $contract = Contract::where('id', decrypt($request->id))->first();
        $spkd=skpd::where('id_skpd',$contract->id_skpd)->select('id_skpd','skpd_name')->first();
        $this->design($contract,$spkd);
        // return view('print.print',['contract'=>$contract]);
    }

    public function barcodeTes(Request $request)
    {
        return view('print.barcode');
    }
    public function design($contract,$skpd)
    {
        $template='<!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
        </head>

        <body style="font-family:Arial, Helvetica, sans-serif;">
            <style>
                table {
                    white-space: nowrap;
                    border-spacing: 0;
                    border-collapse: collapse;
                }

                td {
                    padding: 5px;
                    border: 1px solid rgb(0, 0, 0);
                    vertical-align: middle;
                    white-space: nowrap;
                }

                .noline {
                    padding: 0px;
                    border: 0px solid rgb(0, 0, 0);
                    vertical-align: middle;
                    white-space: nowrap;
                }

            </style>
            <table style="width: 100%;">
              <tr>
                  <td>  <table class="" style="text-align: center;width: 100%;" >
                    <tr>
                        <td class="noline"> <img style="width: 150px;" src="image/favicon-96x96.png" alt="" srcset=""></td>
                    </tr>
                    <tr>
                        <td class="noline" style="height: 10px;font-size: 50px;font-weight: bold;">
                            PEMERINTAH KABUPATEN TANAH DATAR
                        </td>
                    </tr>
                    <tr>
                        <td class="noline" style="height: 10px;font-size: 50px;font-weight: bold;">SEKRETARIAT DAERAH</td>
                    </tr>
                    <tr>
                        <td class="noline"><br>
                            Jl. Sultan Alam Bagagarsyah, Kecamatan Tanjung Emas Kabupaten Tanah Datar Kode Pos 25176
                        </td>
                    </tr>
                    <tr>
                        <td class="noline">
                            '.url('').'
                        </td>
                    </tr>
                    <tr>
                        <td class="noline">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td class="noline">
                            Dengan ini menerangkan bahwa kontrak, dengan Nomor Kontrak yang tertera dibawah ini
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="noline"><br></td>
                    </tr>
                </table>
                <table style="width: 100%;" border="1" >
                    <tr>
                        <td  style="width: 100px;">Nomor Register</td>
                        <td>:050/001/REG/BAAO-PDG/2021</td>
                    </tr>
                    <tr>
                        <td>Nama Pekerjaan</td>
                        <td>: '.$contract->job_name.'</td>
                    </tr>
                    <tr>
                        <td>No. Kontrak</td>
                        <td>: '.$contract->contract_number.'</td>
                    </tr>
                    <tr>
                        <td>No. Adendum</td>
                        <td>:'.$contract->contract_number.'</td>
                    </tr>
                    <tr>
                        <td>No. BA PHO</td>
                        <td>: 0909</td>
                    </tr>
                    <tr>
                        <td>SKPD</td>
                        <td>: '.$skpd->skpd_name.'</td>
                    </tr>
                    <tr>
                        <td>Pagu</td>
                        <td>: Rp.'.number_format($contract->ceiling).'</td>
                    </tr>
                    <tr>
                        <td>Nilai Kontrak</td>
                        <td>: Rp.'.number_format($contract->contract_value).'</td>
                    </tr>
                    <tr>
                        <td>PPK</td>
                        <td>: '.$contract->ppk_name.'</td>
                    </tr>
                </table>
                <table style="width: 100%;" >
                    <tr>
                        <td colspan="2" class="noline">
                            <br><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="noline" style="text-align: center;" colspan="2"><br>Dinyatakan telah teregistrasi di Bagian Administrasi Pembangunan dan Perencanaan Kabupaten Tanah Datar</td>
                    </tr>
                    <tr>
                        <td class="noline" colspan="2"><br><br></td>
                    </tr>
                    <tr>
                        <td class="noline">
                            <img style="width: 200px;height: 200px;" src="data:image/png;base64,'.DNS2D::getBarcodePNG(url('')."/check/".encrypt($contract->id), 'QRCODE').'" alt="" srcset="">
                        </td>
                        <td class="noline" style="text-align: center;">
                            Batusangkar, 11 Februari 2021 <br>
                            Kepala Bagian Administrasi <br>
                            Pembangunan Dan Perencanaan <br><br><br><br><br>
                            <u style="font-weight: bold;">NOVALINO,SE.MM</u><br>NIP. 19710104 200112 1 007
                        </td>
                    </tr>
                </table></td>
              </tr>
            </table>

        </body>

        </html>
        ';
        require_once __DIR__ . '../../../../vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($template);
        $mpdf->Output();
    }
}
