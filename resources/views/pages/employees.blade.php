@extends('layouts.app')

@section('content')
    <!-- Nội dung của trang chủ -->

    @include('includes.top-view')
    <div class="w-full text-center px-4">
        <div class="container">
            @if (auth()->user()->role->name === 'root' || auth()->user()->role->name === 'admin')
                <div class="w-full p-3 border rounded my-3 flex items-center justify-between">
                    <a href="{{ route('create-user') }}" class="rounded bg-green-600 p-2 text-white">Tạo nhân viên mới</a>
                    <form action="{{ route('user.list') }}" method="GET" class="">
                        <div class="flex gap-3 items-center">
                            <!-- Sắp xếp -->
                            <div class="flex items-center">
                                <label for="sort" class="mr-2">Sắp xếp:</label>
                                <select name="sort" id="sort" class="border rounded px-2 py-1">
                                    <option value="default">Mặc định</option>
                                    <option value="az">A->Z</option>
                                    <option value="za">Z->A</option>
                                    <option value="ma_nhan_vien">Mã nhân viên</option>
                                    <option value="ma_nhan_vien_rev">Mã nhân viên</option>
                                </select>
                            </div>

                            <!-- Giới tính -->
                            <div class="flex items-center">
                                <label for="gioi_tinh" class="mr-2">Giới tính:</label>
                                <select name="gioi_tinh" id="gioi_tinh" class="border rounded px-2 py-1">
                                    <option value="">Tất cả</option>
                                    @foreach ($genders as $gender)
                                        <option class="capitalize" value="{{ $gender->id }}">{{ $gender->value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Bộ phận -->
                            <div class="flex items-center">
                                <label for="bo_phan" class="mr-2">Bộ phận:</label>
                                <select name="bo_phan" id="bo_phan" class="border rounded px-2 py-1">
                                    <option value="">Tất cả</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->ten }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Quyền hạn -->
                            <div class="flex items-center">
                                <label for="quyen" class="mr-2">Quyền hạn:</label>
                                <select name="quyen" id="quyen" class="border rounded px-2 py-1">
                                    <option value="">Tất cả</option>
                                    @foreach ($roles as $role)
                                        @if($role->name !== 'root')
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tìm kiếm -->
                            <div class="flex items-center gap-2">
                                <input type="text" name="keyword" id="keyword" placeholder="Nhập từ khóa tìm kiếm"
                                    class="border rounded px-2 py-1">
                                <button type="submit"
                                    class=" bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Tìm kiếm</button>
                            </div>
                        </div>

                        <!-- Nút tìm kiếm -->
                        <!-- Sử dụng JavaScript để tự động gửi form khi thay đổi các trường lọc -->
                        <script>
                            document.querySelectorAll('select').forEach(select => {
                                select.addEventListener('change', () => {
                                    select.closest('form').submit();
                                });
                            });
                        </script>


                    </form>
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
                                    <a class="font-bold" href="{{ route('user.show', $user->id) }}">
                                        {{ $user->ma_nhan_vien }}
                                    </a>
                                </td>
                                <td class="border px-2 py-2">{{ $user->full_name }}</td>
                                <td class="border px-2 py-2">{{ $user->department->ten }}</td>
                                <td class="border px-2 py-2">{{ $user->position->name }}</td>
                                <td class="border px-2 py-2 capitalize">{{ $user->role->name }}</td>
                                <td class="border px-2 py-2">{{ $user->gender->value }}</td>
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
