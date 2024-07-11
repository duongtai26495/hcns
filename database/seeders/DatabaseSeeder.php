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

            $positions = [
                ['name' => 'Không biết'],
                ['name' => 'Bảo hiểm'],
                ['name' => 'Bảo vệ'],
                ['name' => 'Chuyên viên đào tạo và hỗ trợ kỹ thuật'],
                ['name' => 'Chăm sóc khách hàng'],
                ['name' => 'Cố vấn dịch vụ'],
                ['name' => 'DCRC'],
                ['name' => 'Giám Sát Vệ Sinh'],
                ['name' => 'Giám Đốc Kinh Doanh'],
                ['name' => 'Giám Đốc Trải Nghiệm Khách Hàng'],
                ['name' => 'Giám đốc dịch vụ'],
                ['name' => 'Giám đốc hành chính nhân sự'],
                ['name' => 'Hành chính'],
                ['name' => 'IT'],
                ['name' => 'Kế toán trưởng'],
                ['name' => 'Kế toán viên'],
                ['name' => 'Kỹ thuật viên bảo dưỡng nhanh'],
                ['name' => 'Kỹ thuật viên lắp phụ kiện'],
                ['name' => 'Kỹ thuật viên máy'],
                ['name' => 'Kỹ thuật viên sơn'],
                ['name' => 'Kỹ thuật viên sửa chữa chung'],
                ['name' => 'Kỹ thuật viên đồng'],
                ['name' => 'Lễ tân'],
                ['name' => 'Nhân sự'],
                ['name' => 'Nhân viên kho phụ tùng - phụ kiện'],
                ['name' => 'Nhân viên marketing'],
                ['name' => 'Nhân viên Đăng kiểm'],
                ['name' => 'Pha chế'],
                ['name' => 'Phó Phòng Kế Toán'],
                ['name' => 'Phó giám đốc dịch vụ'],
                ['name' => 'Phó giám đốc kinh doanh xe mới'],
                ['name' => 'Quản đốc sửa chữa chung'],
                ['name' => 'Quản đốc Đồng - Sơn'],
                ['name' => 'Rửa xe'],
                ['name' => 'Thư ký kinh doanh'],
                ['name' => 'Thủ quỹ'],
                ['name' => 'Trưởng bộ phận kinh doanh xe theo lô - Fleet Sale Manager'],
                ['name' => 'Trưởng bộ phận kinh doanh xe đã qua sử dụng'],
                ['name' => 'Trưởng nhóm tư vấn bán hàng'],
                ['name' => 'Trưởng phòng nhân sự'],
                ['name' => 'Tài xế'],
                ['name' => 'Tư vấn bán hàng'],
                ['name' => 'Tổng giám đốc'],
                ['name' => 'Điều phối'],
            ];
    
            DB::table('positions')->insert($positions);

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
