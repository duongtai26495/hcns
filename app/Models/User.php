<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'email_canhan', 'email_coquan', 'verified_email_coquan', 
        'email_coquan_verified_at', 'phone_number', 'mobile_number', 'password', 
        'ma_nhan_vien', 'ngay_sinh', 'trang_thai', 'ngay_thu_viec', 'ngay_chinh_thuc', 
        'identification_number', 'ngay_cap', 'noi_cap', 'nganh_hoc', 'dia_chi', 
        'que_quan', 'bien_so_xe', 'position_id', 'role_id', 'department_id', 'gender_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_coquan_verified_at' => 'datetime',
        'ngay_sinh' => 'datetime',
        'ngay_thu_viec' => 'datetime',
        'ngay_chinh_thuc' => 'datetime',
        'ngay_cap' => 'datetime',
    ];

    /**
     * Get the role associated with the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the department associated with the user.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the gender associated with the user.
     */
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

}
