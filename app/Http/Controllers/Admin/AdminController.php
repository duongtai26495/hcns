<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use App\Models\Gender;

class AdminController extends Controller
{
    public function createUser()
    {
        $role = Auth::user()->role;
        $roles = Role::all();
        $user = Auth::user();
        $departments = Department::all();
        $genders = Gender::all();

        if ($role->name === 'root' || $role->name === 'admin') {
            return view('pages.new_user', [
                'title' => 'Tạo nhân viên mới',
                'roles' => $roles,
                'departments' => $departments,
                'user' => $user,
                'genders' => $genders,
            ]);
        }

        return view('pages.dashboard', [
            'title' => 'Dashboard',
        ]);
    }

    public function store(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email_coquan' => 'required|string|email|unique:users,email_coquan',
            'email_canhan' => 'required|string|email|unique:users,email_canhan',
            'mobile_number' => 'nullable|string|max:30',
            'ma_nhan_vien' => 'nullable|string|max:100',
            'password'=> 'nullable|string|max:200',
            'ngay_sinh' => 'nullable|date',
            'ngay_thu_viec' => 'nullable|date',
            'identification_number' => 'nullable|string|max:100',
            'role_id' => 'required|exists:roles,id',
            'department_id' => 'required|exists:departments,id',
            'gender_id' => 'required|exists:genders,id',
        ]);

        // Hash password if provided
        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        // Create new user
        $user = User::create($validatedData);

        if ($user) {
            return redirect()->route('dashboard')->with('success', 'Người dùng đã được tạo thành công!');
        } else {
            return back()->withErrors(['error' => 'Có lỗi xảy ra khi tạo người dùng. Vui lòng thử lại.']);
        }
    }
}
