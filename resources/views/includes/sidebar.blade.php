
<div class="h-fit flex gap-3 items-center w-full text-center my-5">
    <img class="object-contain mx-auto w-3/4" height="60" width="160" src="{{ '/img/BthFw.png' }}" />
</div>
@auth
@if (auth()->user()->role->name === 'root' || auth()->user()->role->name === 'admin' || auth()->user()->role->name === 'moderator')
<div class="h-fit">
    <h4 class="font-bold text-lg text-white">Khu vực quản trị</h4>
<ul class="flex flex-col">
    <li><a class="py-3 text-white font-bold block" href="">Danh sách nhân viên</a></li>
    <li><a class="py-3 text-white font-bold block" href="">Danh sách xin nghỉ phép</a></li>
    <li><a class="py-3 text-white font-bold block" href="">Danh sách nhân viên</a></li>
</ul>
</div>
@endif
@endauth