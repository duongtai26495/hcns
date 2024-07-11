@extends('layouts.authen')

@section('content')
<style>
    @media (min-width: 767px) {
        .bg-image {
            background-image: url('https://plus.unsplash.com/premium_photo-1683910767532-3a25b821f7ae?q=80&w=2608&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
        }
    }
</style>

<div class="flex flex-col md:flex-row w-full h-full bg-zinc-100 overflow-hidden">

    <div class="w-full h-screen md:w-1/2  xl:w-3/4 3xl:w-4/5">

        <div class="max-w-md w-full h-full flex flex-col mx-auto px-5 py-3 justify-between">
            <img class="object-contain mx-auto" height="80" width="160" src="{{ 'img/BthF.png' }}" />

            <div class="w-full">
                <div class="w-full text-center mb-5">
                <h3 class="text-3xl font-bold w-fit mx-auto my-3 main-color">Chào mừng trở lại !</h3>
                <h2 class="text-xl mt-3 mb-4 w-fit mx-auto main-color">Đăng nhập bằng Mã nhân viên và Mật khẩu để tiếp tục</h2>
                </div>
                <hr/>
                <form class="mt-3" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-700">Mã nhân viên</label>
                        <input placeholder="Mã nhân viên" type="text" id="username" name="ma_nhan_vien" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required autofocus>
                    </div>
                    <div class="mb-6">
                        <div class="flex justify-between items-center"><label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label><a class="text-orange-600 text-sm" href="#" >Quên mật khẩu ?</a></div>
                        <input placeholder="Mật khẩu đăng nhập" type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    </div>
                    <button type="submit" class="w-full bg-blue-900 text-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 hover:bg-blue-600">Đăng nhập</button>
                </form>
            </div>
            <div class="w-full text-center">
               Duong Tai - 2024
         </div>
        </div>
    </div>

    <div class="md:w-1/2 xl:w-1/4 3xl:w-1/5 md:block hidden bg-cover bg-center bg-image"></div>
    
</div>
@endsection