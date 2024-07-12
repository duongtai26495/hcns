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
        $user = Auth::user();
        $role =  $user->role;
    
        return view('pages.dashboard',[
            'title' => 'Dashboard',
            'user'=>$user
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('ma_nhan_vien', 'password');

        if (Auth::attempt($credentials)) {
            // Xác thực thành công
            return redirect()->intended('/dashboard'); // Điều hướng đến trang quản trị
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không chính xác. Mời thử lại !',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng
        $request->session()->invalidate(); // Hủy bỏ session hiện tại
        $request->session()->regenerateToken(); // Tạo lại CSRF token

        return redirect('/'); // Chuyển hướng về trang chủ hoặc trang bạn muốn sau khi đăng xuất
    }

}
