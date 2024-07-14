@extends('layouts.app')

@section('content')

@include('includes.top-view')
<div class="max-w-3xl p-2 lg:p-6 ">

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Oops!</strong>
        <span class="block sm:inline">Có lỗi xảy ra trong quá trình xử lý của bạn.</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Đóng</title>
                <path fill-rule="evenodd" d="M14.348 14.849a1 1 0 1 1-1.415 1.414l-3.535-3.536-3.536 3.536a1 1 0 1 1-1.414-1.414l3.536-3.535-3.536-3.536a1 1 0 0 1 1.414-1.414l3.536 3.536 3.535-3.536a1 1 0 0 1 1.415 1.414l-3.536 3.536 3.536 3.535z" clip-rule="evenodd" />
            </svg>
        </span>
    </div>
@endif
@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Thành công!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Đóng</title>
                <path fill-rule="evenodd" d="M14.348 14.849a1 1 0 1 1-1.415 1.414l-3.535-3.536-3.536 3.536a1 1 0 1 1-1.414-1.414l3.536-3.535-3.536-3.536a1 1 0 0 1 1.414-1.414l3.536 3.536 3.535-3.536a1 1 0 0 1 1.415 1.414l-3.536 3.536 3.536 3.535z" clip-rule="evenodd" />
            </svg>
        </span>
    </div>
@endif
    <form id="createUserForm" action="{{ route('user.update') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="flex-col md:flex-row flex w-full gap-0 md:gap-5">
            <div class="p-5 pt-0 border rounded-md shadow-md mb-3 w-full md:w-1/2 ">
                <h4 class="my-3 text-lg font-bold">Thông tin chung</h4>
        <!-- Họ và tên đầy đủ -->
        <div class="mb-4">
            <label for="full_name" class="block text-sm font-medium text-gray-700">Họ và tên đầy đủ</label>
            <input type="text" id="full_name" name="full_name" placeholder="Họ và tên đầy đủ"
                value="{{ old('full_name', $user->full_name) }}"
                class="mt-1 block w-full px-3 py-2 border @error('full_name') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('full_name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gender -->
        <div class="mb-4">
            <label for="gender_id" class="block text-sm font-medium text-gray-700">Giới tính</label>
            <select id="gender_id" name="gender_id"
                class="mt-1 block w-full px-3 py-2 border @error('gender_id') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
                @foreach ($genders as $gender)
                <option value="{{ $gender->id }}" @if (old('gender_id', $user->gender_id) == $gender->id) selected @endif>{{ $gender->value }}</option>
                @endforeach
            </select>
            @error('gender_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Ngày sinh -->
        <div class="mb-4">
            <label for="ngay_sinh" class="block text-sm font-medium text-gray-700">Ngày sinh</label>
            <input type="text" id="ngay_sinh" name="ngay_sinh"
                value="{{ old('ngay_sinh', $user->ngay_sinh)}}"
                class="date_picker mt-1 block w-full px-3 py-2 border @error('ngay_sinh') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('ngay_sinh')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="identification_number" class="block text-sm font-medium text-gray-700">Số CMND/CCCD</label>
            <input type="text" id="identification_number" name="identification_number"
                placeholder="Số CMND/CCCD"
                value="{{ old('identification_number', $user->identification_number) }}"
                class="mt-1 block w-full px-3 py-2 border @error('identification_number') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('identification_number')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Ngày cấp -->
        <div class="mb-4">
            <label for="ngay_cap" class="block text-sm font-medium text-gray-700">Ngày cấp</label>
            <input type="text" id="ngay_cap" name="ngay_cap"
            value="{{ old('ngay_cap', $user->ngay_cap) }}"
                class="date_picker mt-1 block w-full px-3 py-2 border @error('ngay_cap') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('ngay_cap')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Nơi cấp -->
        <div class="mb-4">
            <label for="noi_cap" class="block text-sm font-medium text-gray-700">Nơi cấp</label>
            <input type="text" id="noi_cap" name="noi_cap" placeholder="Nơi cấp"
                value="{{ old('noi_cap', $user->noi_cap) }}"
                class="mt-1 block w-full px-3 py-2 border @error('noi_cap') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('noi_cap')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
          <!-- Ngành học -->
          <div class="mb-4">
            <label for="nganh_hoc" class="block text-sm font-medium text-gray-700">Ngành học</label>
            <input type="text" id="nganh_hoc" name="nganh_hoc" placeholder="Ngành học"
                value="{{ old('nganh_hoc', $user->nganh_hoc) }}"
                class="mt-1 block w-full px-3 py-2 border @error('nganh_hoc') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('nganh_hoc')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

      
            </div>
            
            <div class="p-5 pt-0 border rounded-md shadow-md mb-3 w-full md:w-1/2 ">
                <h4 class="my-3 text-lg font-bold">Thông tin liên lạc</h4>
        <!-- Email cá nhân -->
        <div class="mb-4">
            <label for="email_canhan" class="block text-sm font-medium text-gray-700">Email cá nhân</label>
            <input type="email" id="email_canhan" name="email_canhan" placeholder="Email cá nhân"
                value="{{ old('email_canhan', $user->email_canhan) }}"
                class="mt-1 block w-full px-3 py-2 border @error('email_canhan') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('email_canhan')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email cơ quan -->
        <div class="mb-4">
            <label for="email_coquan" class="block text-sm font-medium text-gray-700">Email cơ quan</label>
            <input type="email" id="email_coquan" name="email_coquan" placeholder="Email cơ quan"
                value="{{ old('email_coquan', $user->email_coquan) }}"
                class="mt-1 block w-full px-3 py-2 border @error('email_coquan') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('email_coquan')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Số điện thoại di động -->
        <div class="mb-4">
            <label for="mobile_number" class="block text-sm font-medium text-gray-700">Số điện thoại di động</label>
            <input type="tel" id="mobile_number" name="mobile_number" placeholder="Số điện thoại di động"
                value="{{ old('mobile_number', $user->mobile_number) }}"
                class="mt-1 block w-full px-3 py-2 border @error('mobile_number') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('mobile_number')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Số điện thoại khác -->
        <div class="mb-4">
            <label for="phone_number" class="block text-sm font-medium text-gray-700">Số điện thoại khác</label>
            <input type="tel" id="phone_number" name="phone_number" placeholder="Số điện thoại khác"
                value="{{ old('phone_number', $user->phone_number) }}"
                class="mt-1 block w-full px-3 py-2 border @error('phone_number') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('phone_number')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
  <!-- Địa chỉ -->
  <div class="mb-4">
    <label for="dia_chi" class="block text-sm font-medium text-gray-700">Địa chỉ</label>
    <input type="text" id="dia_chi" name="dia_chi" placeholder="Địa chỉ"
        value="{{ old('dia_chi', $user->dia_chi) }}"
        class="mt-1 block w-full px-3 py-2 border @error('dia_chi') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
    @error('dia_chi')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Quê quán -->
<div class="mb-4">
    <label for="que_quan" class="block text-sm font-medium text-gray-700">Quê quán</label>
    <input type="text" id="que_quan" name="que_quan" placeholder="Quê quán"
        value="{{ old('que_quan', $user->que_quan) }}"
        class="mt-1 block w-full px-3 py-2 border @error('que_quan') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
    @error('que_quan')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
            </div>

        </div>

        <div class="flex-col md:flex-row flex w-full gap-0 md:gap-5">
            <div class="p-5 pt-0 border rounded-md shadow-md mb-3 w-full md:w-1/2 ">
                <h4 class="my-3 text-lg font-bold">Thông tin làm việc</h4>
        <!-- Ngày thử việc -->
        <div class="mb-4">
            <label for="ngay_thu_viec" class="block text-sm font-medium text-gray-700">Ngày thử việc</label>
            <input type="text " id="ngay_thu_viec" name="ngay_thu_viec"
                value="{{ old('ngay_thu_viec', $user->ngay_thu_viec) }}"
                class="date_picker mt-1 block w-full px-3 py-2 border @error('ngay_thu_viec') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('ngay_thu_viec')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Ngày chính thức -->
        <div class="mb-4">
            <label for="ngay_chinh_thuc" class="block text-sm font-medium text-gray-700">Ngày chính thức</label>
            <input type="text" id="ngay_chinh_thuc" name="ngay_chinh_thuc"
                value="{{ old('ngay_chinh_thuc', $user->ngay_chinh_thuc) }}"
                class="date_picker mt-1 block w-full px-3 py-2 border @error('ngay_chinh_thuc') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('ngay_chinh_thuc')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        @if($user->role->name !== 'root' || $user->role->name === 'user')
        <div class="mb-4">
            <label for="role_id" class="block text-sm font-medium text-gray-700">Chức vụ</label>
            <select id="role_id" name="role_id"
                class="mt-1 block w-full px-3 py-2 border @error('role_id') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
                @foreach ($roles as $role)
                @if($role->name !== 'root')
                <option value="{{ $role->id }}" @if (old('role_id', $user->role_id) == $role->id) selected @endif>{{ $role->name }}</option>
                @endif
                @endforeach
            </select>
            @error('role_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        @endif

        <!-- Department -->
        <div class="mb-4">
            <label for="department_id" class="block text-sm font-medium text-gray-700">Bộ phận</label>
            <select id="department_id" name="department_id"
                class="mt-1 block w-full px-3 py-2 border @error('department_id') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
                @foreach ($departments as $department)
                <option value="{{ $department->id }}" @if (old('department_id', $user->department_id) == $department->id) selected @endif>{{ $department->ten }}</option>
                @endforeach
            </select>
            @error('department_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>


        <!-- Position -->
        <div class="mb-4">
            <label for="position_id" class="block text-sm font-medium text-gray-700">Vị trí công việc</label>
            <select id="position_id" name="position_id"
                class="mt-1 block w-full px-3 py-2 border @error('position_id') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
                @foreach ($positions as $position)
                <option value="{{ $position->id }}" @if (old('position_id', $user->position_id) == $position->id) selected @endif>{{ $position->name }}</option>
                @endforeach
            </select>
            @error('position_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
            </div>

      
        <div class="p-5 pt-0 border rounded-md shadow-md mb-3 w-full md:w-1/2 ">
                <h4 class="my-3 text-lg font-bold">Thông tin khác</h4>

        <!-- Biển số xe -->
        <div class="mb-4">
            <label for="bien_so_xe" class="block text-sm font-medium text-gray-700">Biển số xe</label>
            <input type="text" id="bien_so_xe" name="bien_so_xe" placeholder="Biển số xe"
                value="{{ old('bien_so_xe', $user->bien_so_xe) }}"
                class="mt-1 block w-full px-3 py-2 border @error('bien_so_xe') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
            @error('bien_so_xe')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

       

        <!-- Trạng thái -->
        <div class="mb-4">
            <label for="trang_thai" class="block text-sm font-medium text-gray-700">Trạng thái</label>
            <select id="trang_thai" name="trang_thai"
                class="mt-1 block w-full px-3 py-2 border @error('trang_thai') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300">
                <option value="1" @if (old('trang_thai', $user->trang_thai) == 1) selected @endif>Đang làm việc</option>
                <option value="0" @if (old('trang_thai', $user->trang_thai) == 0) selected @endif>Đã nghỉ việc</option>
            </select>
            @error('trang_thai')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

            </div>
        </div>
        <div class="flex items-center justify-end mt-4 gap-5">
            <a href="{{ route('dashboard') }}" class="bg-orange-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Quay lại
            </a>
            <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md">Cập nhật</button>
        </div>
    </form>
</div>

@endsection
