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
                'attachment' => 'Surat Perintah Kerja/ Surat Perjanjian/ Surat Pesanan'
            ],
            [
                'id_attachment' => 2,
                'attachment' => 'Surat Perintah Mulai Kerja (SPMK)'
            ],
            [
                'id_attachment' => 3,
                'attachment' => 'Daftar Kuantitas dan Harga/RAB'
            ],

            [
                'id_attachment' => 4,
                'attachment' => 'Time Schedule'
            ]
        ];
        Attachment::insert($insert);
    }
}
