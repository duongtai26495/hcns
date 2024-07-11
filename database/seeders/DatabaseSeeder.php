<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = array('user','manager','moderator','admin','root');
        $genders = array('Chưa biết','Nam','Nữ');
        $departments = array(
            "Ban Tổng Giám Đốc",
            "Bộ Phận Kế Toán",
            "Bộ Phận Kinh Doanh",
            "Bộ Phận Dịch Vụ",
            "Bộ Phận Hành Chính Nhân Sự",
            "Bộ Phận Marketing",
            "Bộ Phận CX",
            "Bộ Phận Công Nghệ Thông Tin");


        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name'=>$role
            ]);
        }

        foreach ($departments as $depart) {
            DB::table('departments')->insert([
                'ten'=>$depart
            ]);
        }

        foreach ($genders as $gender) {
            DB::table('genders')->insert([
                'value'=>$gender
            ]);
        }
    }
}
