<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {

    $title = 'Trang chủ';

    if(Auth::check())
    {
        return redirect('dashboard');
    }
    return view('pages.home', [
         'title' => $title
     ]);
    }

    public function dashboard()
    {
    $role = Auth::user()->role;
    $users = NULL;
    
        if($role -> name === 'root' || $role -> name === 'admin' || $role -> name === 'moderator')
        {
            $users = User::paginate(10);
            return view('pages.dashboard',[
                'title' => 'Admin Dashboard',
                'users' => $users
            ]);
        }
        return view('pages.dashboard',[
            'title' => 'Dashboard',
            'users' => $users
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('ma_nhan_vien', 'password');

        if (Auth::attempt($credentials)) {
            // Xác thực thành công
            return redirect()->intended('/dashboard'); // Điều hướng đến trang quản trị
        }

        // Xác thực không thành công
        return redirect('/')->with('error', 'Invalid credentials');
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng
        $request->session()->invalidate(); // Hủy bỏ session hiện tại
        $request->session()->regenerateToken(); // Tạo lại CSRF token

        return redirect('/'); // Chuyển hướng về trang chủ hoặc trang bạn muốn sau khi đăng xuất
    }

}
