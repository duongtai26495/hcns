@extends('layouts.authen')

@section('content')

<div class="flex flex-col md:flex-row w-full h-full bg-zinc-100 overflow-hidden">

    <div class="w-full h-screen md:w-1/2  xl:w-3/5">

        <div class="max-w-md w-full h-full flex flex-col mx-auto px-5 py-3 justify-between">
            <img class="object-contain mx-auto mt-5" height="80" width="300" src="{{ 'img/LogoNgang.png' }}" />
          
            <div class="w-full">
                <div class="w-full text-center mb-5">
                <h3 class="text-3xl font-bold w-fit mx-auto my-3 main-color">Chào mừng trở lại !</h3>
                <h2 class="text-xl mt-3 mb-4 w-fit mx-auto main-color">Đăng nhập bằng Mã nhân viên và Mật khẩu để tiếp tục</h2>
                </div>
                <hr/>
                <form class="mt-3" method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf
                    <div class="mb-4">
                        <label for="ma_nv" class="block text-sm font-medium text-gray-700">Mã nhân viên</label>
                        <input placeholder="Mã nhân viên" type="text" id="ma_nv" name="ma_nhan_vien" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required autofocus>
                    </div>
                    <div class="mb-3">
                        <div class="flex justify-between items-center">
                            <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                            <a class="text-orange-600 text-sm" href="#">Quên mật khẩu?</a>
                        </div>
                        <input placeholder="Mật khẩu đăng nhập" type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    </div>
                    <div class="flex gap-3 my-3 items-center justify-start">
                        <div class="h-5 rounded-full switch-bg remember-switch enabled relative cursor-pointer">
                            <div class="switch-btn rounded-full h-[15px] w-[15px] border absolute"></div>
                        </div>
                        <span>Ghi nhớ tài khoản</span>
                    </div>
                    <button type="submit" class="w-full bg-blue-900 text-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 hover:bg-blue-600" id="loginButton" disabled>Đăng nhập</button>
                </form>
                
                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 mt-3 pb-3 rounded relative" role="alert">
                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            </div>
            <div class="w-full text-center mb-5">
               Duong Tai - 2024
         </div>
        </div>
    </div>

    <div class="md:w-1/2 xl:w-2/5 md:flex flex-col relative gap-3 hidden bg-cover bg-center henry_ford">
            <div class="ford_quote absolute bottom-0 left-0 z-[1]">
                <div class="ford_quote-content font-normal">
                </div>
                <h4 class="text-2xl w-fit font-bold">- Henry Ford -</h4>
            </div>
                <div class="absolute bottom-0 left-0 bg-overlay z-[0] w-full h-1/2"></div>
    </div>

    <script>
        

const images = [
        "{{ asset('img/henry_ford_1.webp') }}",
        "{{ asset('img/henry_ford_2.webp') }}",
        "{{ asset('img/henry_ford_3.jpg') }}",
];
// Danh sách các câu quote
const quotes = [
    "The basically simple things are best, whether it's automobiles or diets or philosophy.",
    "The only true test of values, either of men or of things, is that of their ability to make the world a better place in which to live.",
    "The short successes that can be gained in a brief time and without difficulty, are not worth much.",
    "Education is preeminently a matter of quality, not amount",
    "Any man can learn anything he will, but no man can teach except to those who want to learn.",
    "Two classes of people lose money; those who are too weak to guard what they have; those who win money by trick. They both lose in the end.",
    "The most closely organized groups and movements in the world are those which have been the least friendly to the people's progress and liberty.",
    "Be ready to revise any system, scrap any method, abandon any theory, if the success of the job requires it.",
];

// Hàm chọn ngẫu nhiên
function getRandomItem(arr) {
    const randomIndex = Math.floor(Math.random() * arr.length);
    return arr[randomIndex];
}

// Chọn ngẫu nhiên ảnh và câu quote
const randomImage = getRandomItem(images);
const randomQuote = getRandomItem(quotes);

// Đặt ảnh nền và câu quote
document.querySelector('.henry_ford').style.backgroundImage = `url(${randomImage})`;
document.querySelector('.ford_quote-content').innerText = randomQuote;

    </script>
    
</div>
@endsection