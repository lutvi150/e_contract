<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'admin',
            'email' => 'lutvi1500@gmail.com',
            'password' => Hash::make("administrator"),
            'role' => 3,
            'status_account' => 2,
            'id_skpd' => 1,
            'id_field' => 1,
            'created_at'=>date('Y-m-d H:i:s')
        ], [
            'name' => 'Jonifriwalwaldi',
            'email' => 'verificator@gmail.com',
            'password' => Hash::make("verificator"),
            'role' => 2,
            'status_account' => 2,
            'id_skpd' => 1,
            'id_field' => 1,
            'created_at'=>date('Y-m-d H:i:s')
        ], [
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make("user"),
            'role' => 1,
            'status_account' => 2,
            'id_skpd' => 1,
            'id_field' => 1,
            'created_at'=>date('Y-m-d H:i:s')
        ]];
        User::insert($data);
    }
}
