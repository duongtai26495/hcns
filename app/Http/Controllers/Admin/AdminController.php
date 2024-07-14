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
use App\Models\Position;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class AdminController extends Controller
{
    public function createUser()
    {
        $role = Auth::user()->role;
        $roles = Role::all();
        $user = Auth::user();
        $departments = Department::all();
        $genders = Gender::all();
        $positions = Position::all();

        if ($role->name === 'root' || $role->name === 'admin') {
            return view('pages.new_user', [
                'title' => 'Tạo nhân viên mới',
                'heading' => 'Tạo nhân viên mới',
                'roles' => $roles,
                'departments' => $departments,
                'user' => $user,
                'genders' => $genders,
                'positions' => $positions

            ]);
        }

        return view('pages.dashboard', [
            'title' => 'Bình Thuận Ford - Trang Chủ',
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
            'password' => 'nullable|string|max:200',
            'ngay_sinh' => 'nullable|date',
            'ngay_thu_viec' => 'nullable|date',
            'identification_number' => 'nullable|string|max:100',
            'position_id' => 'required|exists:positions,id',
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
            return redirect()->route('user.list')->with('success', 'Người dùng đã được tạo thành công!');
        } else {
            return back()->withErrors(['error' => 'Có lỗi xảy ra khi tạo người dùng. Vui lòng thử lại.']);
        }
    }

    public function employees(Request $request)
    {
        $user = Auth::user();
        $role =  $user->role;
        $users = User::all();
        $roles = Role::all();
        $departments = Department::all();
        $genders = Gender::all();
        $positions = Position::all();
        $heading = 'Danh sách nhân viên';

        if ($role->name === 'root' || $role->name === 'admin' || $role->name === 'moderator') {
            // Xử lý sắp xếp
            $users = User::query();

            // Lọc theo giới tính
            if ($request->has('gioi_tinh')) {
                $users->where('gender_id', $request->gender_id);
            }

            // Lọc theo bộ phận
            if ($request->has('bo_phan')) {
                $users->where('department_id', $request->department_id);
            }

            // Lọc theo quyền hạn
            if ($request->has('quyen')) {
                $users->where('role_id', $request->role_id);
            }

            // Tìm kiếm theo từ khóa
            if ($request->has('keyword')) {
                $keyword = $request->keyword;
                $users->where(function ($query) use ($keyword) {
                    $query->where('full_name', 'like', "%$keyword%")
                        ->orWhere('mobile_number', 'like', "%$keyword%")
                        ->orWhere('ma_nhan_vien', 'like', "%$keyword%");
                });
            }

            // Sắp xếp theo yêu cầu
            if ($request->has('sort')) {
                switch ($request->sort) {
                    case 'az':
                        $users->orderBy('full_name', 'asc')->get();
                        break;
                    case 'za':
                        $users->orderBy('full_name', 'desc')->get();
                        break;
                    case 'ma_nhan_vien':
                        $users->orderBy('ma_nhan_vien', 'asc')->get();
                        break;
                    case 'ma_nhan_vien_rev':
                        $users->orderBy('ma_nhan_vien', 'desc')->get();
                        break;
                        // Thêm các trường hợp sắp xếp khác tại đây nếu cần
                }
            } else {
                // Mặc định sắp xếp theo số thứ tự
                $users->orderBy('id', 'asc')->get();
            }

            // Lấy danh sách nhân viên đã lọc và sắp xếp
            $users = $users->paginate(10); // Đổi số lượng phần tử mỗi trang tại đây nếu cần

            return view('pages.employees', [
                'title' => 'Danh sách nhân viên',
                'users' => $users,
                'roles' => $roles,
                'departments' => $departments,
                'genders' => $genders,
                'positions' => $positions,
                'user' => $user,
                'heading' => $heading
            ]);
        }
        return view('pages.dashboard', [
            'title' => 'Bình Thuận Ford - Trang Chủ',
            'user' => $user
        ]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $departments = Department::all();
        $genders = Gender::all();
        $positions = Position::all();
        $title = $user->full_name . ' - Cập nhật thông tin';
        $heading = 'Thông tin nhân viên';
        return view('pages.user_show', compact('user', 'roles', 'departments', 'genders', 'positions', 'title', 'heading'));
    }



    public function update(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email_canhan' => 'required|email|max:255',
            'email_coquan' => 'required|email|max:255',
            'mobile_number' => 'required|string|max:15',
            'phone_number' => 'nullable|string|max:15',
            'ngay_sinh' => 'required|date_format:Y-m-d',
            'ngay_thu_viec' => 'required|date_format:Y-m-d',
            'ngay_chinh_thuc' => 'required|date_format:Y-m-d',
            'identification_number' => 'required|string|max:20',
            'ngay_cap' => 'required|date_format:Y-m-d',
            'noi_cap' => 'nullable|string|max:255',
            'nganh_hoc' => 'nullable|string|max:255',
            'dia_chi' => 'nullable|string|max:255',
            'que_quan' => 'nullable|string|max:255',
            'bien_so_xe' => 'nullable|string|max:20',
            'role_id' => 'required|integer',
            'department_id' => 'required|integer',
            'gender_id' => 'required|integer',
            'position_id' => 'required|integer',
            'trang_thai' => 'required|boolean',
        ]);

        $user = User::find($request->id);

        if ($user) {
            // Chuyển đổi định dạng ngày tháng và lưu vào cơ sở dữ liệu
            $ngaySinh = Carbon::createFromFormat('Y-m-d', $request->ngay_sinh)->startOfDay();
            $ngayThuViec = Carbon::createFromFormat('Y-m-d', $request->ngay_thu_viec)->startOfDay();
            $ngayChinhThuc = Carbon::createFromFormat('Y-m-d', $request->ngay_chinh_thuc)->startOfDay();
            $ngayCap = Carbon::createFromFormat('Y-m-d', $request->ngay_cap)->startOfDay();

            $user->update([
                'full_name' => $request->full_name,
                'email_canhan' => $request->email_canhan,
                'email_coquan' => $request->email_coquan,
                'mobile_number' => $request->mobile_number,
                'phone_number' => $request->phone_number,
                'ngay_sinh' => $request->ngay_sinh,
                'ngay_thu_viec' => $request->ngay_thu_viec,
                'ngay_chinh_thuc' => $request->ngay_chinh_thuc,
                'identification_number' => $request->identification_number,
                'ngay_cap' => $request->ngay_cap,
                'noi_cap' => $request->noi_cap,
                'nganh_hoc' => $request->nganh_hoc,
                'dia_chi' => $request->dia_chi,
                'que_quan' => $request->que_quan,
                'bien_so_xe' => $request->bien_so_xe,
                'role_id' => $request->role_id,
                'department_id' => $request->department_id,
                'gender_id' => $request->gender_id,
                'position_id' => $request->position_id,
                'trang_thai' => $request->trang_thai,
            ]);

            return redirect()->back()->with('success', 'User updated successfully');
        }

        return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại.');
    }
}
