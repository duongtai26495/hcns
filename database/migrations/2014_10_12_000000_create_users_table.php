<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('email_canhan')->unique()->default('NULL');
            $table->string('email_coquan')->unique();
            $table->boolean('verified_email_coquan')->default(false);
            $table->timestamp('email_coquan_verified_at')->nullable()->default('2017-01-01 00:00:00');
            $table->string('phone_number', 30)->default('');
            $table->string('mobile_number', 30)->nullable()->default('');
            $table->string('password',200)->nullable();
            $table->string('ma_nhan_vien', 100)->nullable()->default('');
            $table->timestamp('ngay_sinh')->nullable()->default('2017-01-01 00:00:00');
            $table->boolean('trang_thai',2)->nullable()->default(false);    
            $table->timestamp('ngay_thu_viec')->nullable()->default('2017-01-01 00:00:00');
            $table->timestamp('ngay_chinh_thuc')->nullable()->default('2017-01-01 00:00:00');
            $table->string('identification_number', 100)->nullable()->default('000000000');
            $table->timestamp('ngay_cap')->nullable()->default('2017-01-01 00:00:00');
            $table->string('noi_cap', 100)->nullable()->default('');
            $table->string('nganh_hoc', 100)->default('');
            $table->string('dia_chi', 200)->default('');
            $table->string('que_quan', 100)->default('');
            $table->string('bien_so_xe', 100)->default('');
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('gender_id');
 
            $table->foreign('role_id')->references('id')->on('roles')->default(1);
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
