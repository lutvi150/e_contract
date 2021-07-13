<?php

namespace Database\Seeders;

use App\Models\Contract;
use Illuminate\Database\Seeder;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert=[
            'job_name'=>'DAK Jalan Paket 1',
            'ppk_name'=>'Refdizalis',
            'ceiling'=>2000000000,
            'contract_value'=>18000000,
            'source_founds'=>1,
            'procuretment_type'=>1,
            'method_selection'=>1,
            'id_field'=>1,
            'id_skpd'=>1,
            'contract_number'=>'360/1522/SPK/PPK/BPBD-Pdg/XII/2020',
            'status'=>'draf',
            'id_user'=>3,
            'provider'=>'CV Ani',
            'created_at'=>date('Y-m-d H:i:s')
        ];
        Contract::create($insert);
    }
}
