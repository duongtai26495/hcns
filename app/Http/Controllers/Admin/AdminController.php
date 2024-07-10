<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\role;
use App\Models\department;



class AdminController extends Controller
{
    public function createUser()
    {
        $role = Auth::user()->role;
        $roles = role::all();
        $user = Auth::user();
        $departments = department::all();
        if($role -> name === 'root' || $role -> name === 'admin')
        {
            return view('pages.new_user',[
                'title' => 'Tạo nhân viên mới',
                'roles'=> $roles,
                'departments'=>$departments,
                'user' => $user,
            ]);
        }
        return view('pages.dashboard',[
            'title' => 'Dashboard',
        ]);
    }
}
