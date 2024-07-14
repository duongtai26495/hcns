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
        $heading = 'Trang chủ';
    
        return view('pages.dashboard',[
            'title' => 'Bình Thuận Ford - Trang Chủ',
            'user'=>$user,
            'heading'=>$heading
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

    public function xem_nghi_phep()
    {
        
        $user = Auth::user();
        return view('pages.list-nghi-phep',[
            'title'=>'Danh sách đơn nghỉ phép',
            'heading'=> 'Danh sách đơn nghỉ phép',
            'user'=>$user
        ]);
    }

    public function them_nghi_phep()
    {
        $user = Auth::user();
        return view('pages.them-nghi-phep',[
            'title'=>'Tạo đơn nghỉ phép',
            'heading'=> 'Tạo mới đơn nghỉ phép',
            'user'=>$user
        ]);
    }
    public function xem_don_nghi_phep()
    {
        $user = Auth::user();
        return view('pages.don-nghi-phep',[
            'title'=>'Xem đơn nghỉ phép',
            'heading'=> 'Chi tiết đơn nghỉ phép',
            'user'=>$user
        ]);
    }
    public function cai_dat()
    {
        $user = Auth::user();
        return view('pages.cai-dat',[
            'title'=>'Thiết lập',
            'heading'=> 'Thiết lập',
            'user'=>$user
        ]);
    }

    public function tintuc()
    {
        $user = Auth::user();
        return view('pages.tintuc',[
            'title'=>'Tin tức nội bộ',
            'heading'=> 'Tin tức nội bộ',
            'user'=>$user
        ]);
    }

    public function bangluong()
    {
        $user = Auth::user();
        return view('pages.bang-luong',[
            'title'=>'Bảng lương nhân viên',
            'heading'=> 'Bảng lương nhân viên',
            'user'=>$user
        ]);
    }
}
