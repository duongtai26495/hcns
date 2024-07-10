
<header class="block">
    <nav class="w-full bg-neutral-300 flex items-center justify-between px-5">
        <ul class="flex flex-row gap-10 w-fit">
            <li><span class="cursor-pointer block py-3">Menu</span></li>
            <li><a class="block py-3" href="{{ route('dashboard') }}">Trang chủ</a></li>
        </ul>
        <div>
            @auth
            <div class="w-fit flex items-center gap-3 border-l pl-2 border-gray-400">
                <h4 class="">Xin chào, <strong>{{ $user -> full_name}}</strong></h4>
                <a class="text-white p-2 rounded-md font-bold bg-red-600" href="{{ route('logout') }}">Đăng xuất</a>
            </div>
            @endauth
        </div>
    </nav>
</header>