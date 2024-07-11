<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'full_name' => 'Admin BthF',
            'email_coquan' => 'admin@example.com',
            'password' => Hash::make('OneFord@2024'),
            'role_id' => 5,
            'department_id'=> 8,
            'gender_id'=>2,
            'ma_nhan_vien'=>'BITF00001'
        ]);

    }
}
