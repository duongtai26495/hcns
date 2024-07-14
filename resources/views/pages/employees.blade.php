@extends('layouts.app')

@section('content')
    <!-- Nội dung của trang chủ -->
    
    @include('includes.top-view')
    <div class="w-full text-center">
        <div class="container mx-auto">
            @if (auth()->user()->role->name === 'root' || auth()->user()->role->name === 'admin')
            <div class="w-full p-3 border rounded my-3 flex items-center justify-start">
                <a href="{{ route('create-user') }}" class="rounded bg-green-600 p-2 text-white">Tạo nhân viên mới</a>
            </div>
            @endif
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-2 py-2">STT</th>
                            <th class="px-2 py-2">Mã nhân viên</th>
                            <th class="px-2 py-2">Họ và Tên</th>
                            <th class="px-2 py-2">Bộ phận</th>
                            <th class="px-2 py-2">Vị trí công tác</th>                            
                            <th class="px-2 py-2">Quyền hạn</th>                            
                            <th class="px-2 py-2">Giới tính</th>     
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                        <tr class="{{ $index % 2 === 0 ? 'bg-gray-50' : 'bg-white' }}">
                            <td class="border px-2 py-2">{{ $index + 1 }}</td>
                            <td class="border px-2 py-2">
                                <a href="{{ route('user.show', $user->id) }}">
                                {{ $user->ma_nhan_vien }}
                                </a></td>
                            <td class="border px-2 py-2">{{ $user->full_name }}</td>
                            <td class="border px-2 py-2">{{ $user->department_id }}</td>
                            <td class="border px-2 py-2">{{ $user->position_id }}</td>
                            <td class="border px-2 py-2">{{ $user->role_id }}</td>
                            <td class="border px-2 py-2">{{ $user->gender_id }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Hiển thị nút phân trang -->
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
    
@endsection 