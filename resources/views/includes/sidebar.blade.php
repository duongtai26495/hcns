
<div class="h-fit flex gap-3 items-center w-full text-center my-5">
    <img class="object-contain mx-auto w-full" height="60" width="100%" src="{{ '/img/BthFw.png' }}" />
</div>
@auth
@if (auth()->user()->role->name === 'root' || auth()->user()->role->name === 'admin' || auth()->user()->role->name === 'moderator')
<div class="h-fit content-admin">
    <h4 class="font-bold text-2xl w-fit text-white">Khu vực quản trị</h4>
<ul class="flex flex-col p-3">
    <li><a class="py-3 text-white font-bold flex items-center justify-start gap-5" href="{{ route('user.list') }}">
        <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="12" cy="6" r="4" stroke="#1C274C" stroke-width="1.5"/>
        <path d="M19.9975 18C20 17.8358 20 17.669 20 17.5C20 15.0147 16.4183 13 12 13C7.58172 13 4 15.0147 4 17.5C4 19.9853 4 22 12 22C14.231 22 15.8398 21.8433 17 21.5634" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        <span>Danh sách nhân viên</span></a></li>
    <li><a class="py-3 text-white font-bold block" href="">Danh sách xin nghỉ phép</a></li>
</ul>
</div>
@endif
@endauth