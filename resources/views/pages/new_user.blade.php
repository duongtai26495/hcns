@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-5 p-6 bg-white shadow-md rounded-lg">
    <form id="createUserForm" action="{{ route('user.store')}}" method="POST">
        @csrf

        <!-- Họ và tên đầy đủ -->
        <div class="mb-4">
            <label for="full_name" class="block text-sm font-medium text-gray-700">Họ và tên đầy đủ</label>
            <input type="text" id="full_name" name="full_name" placeholder="Họ và tên đầy đủ"
                class="mt-1 block w-full px-3 py-2 border @error('full_name') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('full_name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email cá nhân -->
        <div class="mb-4">
            <label for="email_canhan" class="block text-sm font-medium text-gray-700">Email cá nhân</label>
            <input type="email" id="email_canhan" name="email_canhan" placeholder="Email cá nhân"
                class="mt-1 block w-full px-3 py-2 border @error('email_canhan') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('email_canhan')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email cơ quan -->
        <div class="mb-4">
            <label for="email_coquan" class="block text-sm font-medium text-gray-700">Email cơ quan</label>
            <input type="email" id="email_coquan" name="email_coquan" placeholder="Email cơ quan"
                class="mt-1 block w-full px-3 py-2 border @error('email_coquan') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('email_coquan')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Số điện thoại di động -->
        <div class="mb-4">
            <label for="mobile_number" class="block text-sm font-medium text-gray-700">Số điện thoại di động</label>
            <input type="tel" id="mobile_number" name="mobile_number" placeholder="Số điện thoại di động"
                class="mt-1 block w-full px-3 py-2 border @error('mobile_number') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('mobile_number')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Mã nhân viên -->
        <div class="mb-4">
            <label for="ma_nhan_vien" class="block text-sm font-medium text-gray-700">Mã nhân viên</label>
            <input type="text" id="ma_nhan_vien" name="ma_nhan_vien" placeholder="Mã nhân viên"
                class="mt-1 block w-full px-3 py-2 border @error('ma_nhan_vien') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('ma_nhan_vien')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Mật khẩu -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu khởi tạo</label>
            <input type="password" id="password" name="password" placeholder="Mật khẩu"
                class="mt-1 block w-full px-3 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Ngày sinh -->
        <div class="mb-4">
            <label for="ngay_sinh" class="block text-sm font-medium text-gray-700">Ngày sinh</label>
            <input type="date" id="ngay_sinh" name="ngay_sinh"
                class="mt-1 block w-full px-3 py-2 border @error('ngay_sinh') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('ngay_sinh')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Ngày thử việc -->
        <div class="mb-4">
            <label for="ngay_thu_viec" class="block text-sm font-medium text-gray-700">Ngày thử việc</label>
            <input type="date" id="ngay_thu_viec" name="ngay_thu_viec"
                class="mt-1 block w-full px-3 py-2 border @error('ngay_thu_viec') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('ngay_thu_viec')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Số CMND/CCCD -->
        <div class="mb-4">
            <label for="identification_number" class="block text-sm font-medium text-gray-700">Số CMND/CCCD</label>
            <input type="text" id="identification_number" name="identification_number"
                placeholder="Số CMND/CCCD"
                class="mt-1 block w-full px-3 py-2 border @error('identification_number') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('identification_number')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Dropdown Vai trò -->
        <div class="mb-4">
            <label for="role_id" class="block text-sm font-medium text-gray-700">Vai trò</label>
            <select id="role_id" name="role_id"
                class="mt-1 block capitalize w-full px-3 py-2 border @error('role_id') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
                @foreach ($roles as $role)
                @if($role->name !== 'root')
                <option class="capitalize" value="{{ $role->id }}">{{ $role->name }}</option>
                @endif
                @endforeach
            </select>
            @error('role_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Dropdown Phòng ban -->
        <div class="mb-4">
            <label for="department_id" class="block text-sm font-medium text-gray-700">Phòng ban</label>
            <select id="department_id" name="department_id"
                class="mt-1 block w-full px-3 py-2 border @error('department_id') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
                @foreach ($departments as $department)
                <option class="capitalize" value="{{ $department->id }}">{{ $department->ten }}</option>
                @endforeach
            </select>
            @error('department_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Dropdown Giới tính -->
        <div class="mb-4">
            <label for="gender_id" class="block text-sm font-medium text-gray-700">Giới tính</label>
            <select id="gender_id" name="gender_id"
                class="mt-1 block w-full px-3 py-2 border @error('gender_id') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
                @foreach ($genders as $gender)
                <option class="capitalize" value="{{ $gender->id }}">{{ $gender->value }}</option>
                @endforeach
            </select>
            @error('gender_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Nút submit -->
        <div class="mb-4">
            <button type="submit"
                class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Tạo người dùng
            </button>
        </div>
    </form>
</div>

@endsection
