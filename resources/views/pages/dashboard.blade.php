@extends('layouts.app')

@section('content')
    <!-- Nội dung của trang chủ -->
    <div class="w-full mx-auto text-center">
        <div class="container mx-auto">
            @auth
                 @if (auth()->user()->role->name === 'root' || auth()->user()->role->name === 'admin' || auth()->user()->role->name === 'moderator')
            <h2 class="text-2xl font-bold mb-4">Danh sách nhân viên</h2>
            @if (auth()->user()->role->name === 'root' || auth()->user()->role->name === 'admin')
            <div class="w-full p-3 border rounded my-3 flex items-center justify-start">
                <a href="{{ route('create-user') }}" class="rounded bg-green-600 p-2 text-white">Tạo nhân viên mới</a>
            </div>
            @endif
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2">STT</th>
                            <th class="px-4 py-2">Mã nhân viên</th>
                            <th class="px-4 py-2">Họ và Tên</th>
                            <th class="px-4 py-2">Email cơ quan</th>
                            <th class="px-4 py-2">Email cá nhân</th>
                            <th class="px-4 py-2">Số điện thoại</th>                           
                            <th class="px-4 py-2">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                        <tr class="{{ $index % 2 === 0 ? 'bg-gray-50' : 'bg-white' }}">
                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $user->ma_nhan_vien }}</td>
                            <td class="border px-4 py-2">{{ $user->full_name }}</td>
                            <td class="border px-4 py-2">{{ $user->email_coquan }}</td>
                            <td class="border px-4 py-2">{{ $user->email_canhan }}</td>
                            <td class="border px-4 py-2">{{ $user->mobile_number }}</td>
                            <td class="border px-4 py-2 flex gap-2">
                                <button class="rounded bg-blue-600 p-2 text-white">Xem chi tiết</button>
                                <button class="rounded bg-green-600 p-2 text-white">Cập nhật</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Hiển thị nút phân trang -->
            <div class="mt-4">
                {{ $users->links() }}
            </div>
            @endif
            @endauth
        </div>
    </div>
    
@endsection 