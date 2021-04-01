<?php

namespace Database\Seeders;

use App\Models\Attachment;
use Illuminate\Database\Seeder;

class AttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [
            [
                'id_attachment' => 1,
                'attachment' => 'RAB (Rencana Anggaran Biaya)'
            ],
            [
                'id_attachment' => 2,
                'attachment' => 'SPM'
            ],
            [
                'id_attachment' => 3,
                'attachment' => 'Time Schedule'
            ],

            [
                'id_attachment' => 4,
                'attachment' => 'PHO'
            ],
            [
                'id_attachment'=>5,
                'attachment'=>'SPK (Surat Perintah Kerja)'
            ]
        ];
        Attachment::insert($insert);
    }
}
