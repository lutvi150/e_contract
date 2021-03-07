<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'name' => 'Rahmat Lutvi Furkon',
            'email' => 'lutvi1500@gmail.com',
            'password' => Hash::make("lutvi"),
            'role' => 3,
            'status_account' => 2,
            'id_skpd' => 1,
            'id_field' => 1,
        ], [
            'name' => 'Verificator',
            'email' => 'verificator@gmail.com',
            'password' => Hash::make("verificator"),
            'role' => 2,
            'status_account' => 2,
            'id_skpd' => 1,
            'id_field' => 1,
        ], ['name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make("user"),
            'role' => 1,
            'status_account' => 2,
            'id_skpd' => 1,
            'id_field' => 1],
        ];
        DB::table('users')->insert($data);
    }
}
