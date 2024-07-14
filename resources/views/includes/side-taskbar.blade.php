<div class="side-taskbar h-full box-effect-taskbar fixed flex flex-col left-0 top-0 shadow-xl z-10 md:flex px-2 items-center justify-between">
<div class="h-fit flex flex-col  gap-3 items-center w-full text-center my-5">
    <img class="object-contain mx-auto w-full" height="50" width="80%" src="{{ '/img/BthF.png' }}" />


<ul class="flex flex-col gap-5 items-center justify-start w-full mt-5">
    <li class="whitespace-nowrap text-xs mx-auto cursor-pointer rounded-md">
        <a class="whitespace-nowrap text-xs flex flex-col gap-2 items-center justify-center text-center"href="{{route('dashboard')}}"><svg class="w-full" width="100px" height="auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274" stroke="#00095B" stroke-width="1" stroke-linecap="round"/>
            <path d="M15 18H9" stroke="#00095B" stroke-width="1" stroke-linecap="round"/>
            </svg>
            <span>Trang chủ</span>
        </a>
    </li>
    @auth
@if (auth()->user()->role->name === 'root' || auth()->user()->role->name === 'admin' || auth()->user()->role->name === 'moderator')
    <li class="mx-auto cursor-pointer p-2 rounded-md">
        <a class="whitespace-nowrap text-xs flex flex-col gap-2 items-center justify-center text-center" href="{{route('user.list')}}">
        <svg class="w-full" width="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="9" cy="6" r="4" stroke="#00095B" stroke-width="1"/>
            <path d="M15 9C16.6569 9 18 7.65685 18 6C18 4.34315 16.6569 3 15 3" stroke="#00095B" stroke-width="1" stroke-linecap="round"/>
            <path d="M5.88915 20.5843C6.82627 20.8504 7.88256 21 9 21C12.866 21 16 19.2091 16 17C16 14.7909 12.866 13 9 13C5.13401 13 2 14.7909 2 17C2 17.3453 2.07657 17.6804 2.22053 18" stroke="#00095B" stroke-width="1" stroke-linecap="round"/>
            <path d="M18 14C19.7542 14.3847 21 15.3589 21 16.5C21 17.5293 19.9863 18.4229 18.5 18.8704" stroke="#00095B" stroke-width="1" stroke-linecap="round"/>
            </svg>
            
            <span>Nhân viên</span>
        </a>
    </li>
    @endif
    @endauth
    
    <li class="mx-auto cursor-pointer p-2 rounded-md">
        <a class="whitespace-nowrap text-xs flex flex-col gap-2 items-center justify-center text-center" href="{{route('user.list')}}">
        <svg class="w-full" width="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="#00095B" stroke-width="1"/>
            <path d="M8 13H10.5" stroke="#00095B" stroke-width="1" stroke-linecap="round"/>
            <path d="M8 9H14.5" stroke="#00095B" stroke-width="1" stroke-linecap="round"/>
            <path d="M8 17H9.5" stroke="#00095B" stroke-width="1" stroke-linecap="round"/>
            <path d="M3 14V10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157M21 14C21 17.7712 21 19.6569 19.8284 20.8284M4.17157 20.8284C5.34315 22 7.22876 22 11 22H13C16.7712 22 18.6569 22 19.8284 20.8284M19.8284 20.8284C20.7715 19.8853 20.9554 18.4796 20.9913 16" stroke="#00095B" stroke-width="1" stroke-linecap="round"/>
            </svg>
            
            <span>Nghỉ phép</span>
        </a>
    </li>

    <li class="mx-auto cursor-pointer p-2 rounded-md">
        <a class="whitespace-nowrap text-xs flex flex-col gap-2 items-center justify-center text-center" href="{{route('user.list')}}">
        <svg class="w-full" width="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9.10745 2.67414C9.98414 2.24187 10.9649 2 12 2C15.7274 2 18.7491 5.13623 18.7491 9.00497V9.70957C18.7491 10.5552 18.9903 11.3818 19.4422 12.0854L20.5496 13.8095C21.5612 15.3843 20.789 17.5249 19.0296 18.0229C14.4273 19.3257 9.57274 19.3257 4.97036 18.0229C3.21105 17.5249 2.43882 15.3843 3.45036 13.8095L4.5578 12.0854C5.00972 11.3818 5.25087 10.5552 5.25087 9.70957V9.00497C5.25087 7.93058 5.48391 6.91269 5.90039 6.00277" stroke="#00095B" stroke-width="1" stroke-linecap="round"/>
            <path d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C12.2445 22 12.4847 21.9827 12.7192 21.9492M16.5 19C16.2329 19.7126 15.781 20.3428 15.1985 20.8393" stroke="#00095B" stroke-width="1" stroke-linecap="round"/>
            </svg>
            
            <span>Tin tức</span>
        </a>
    </li>
    <li class="mx-auto cursor-pointer p-2 rounded-md">
        <a class="whitespace-nowrap text-xs flex flex-col gap-2 items-center justify-center text-center" href="{{route('user.list')}}">
        <svg class="w-full" width="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14 14.5C14 12.8431 15.3431 11.5 17 11.5C18.6569 11.5 20 12.8431 20 14.5C20 16.1569 18.6569 17.5 17 17.5C15.3431 17.5 14 16.1569 14 14.5Z" stroke="#00095B" stroke-width="1"/>
            <path d="M4 9.5C4 11.1569 5.34315 12.5 7 12.5C8.65685 12.5 10 11.1569 10 9.5C10 7.84315 8.65685 6.5 7 6.5C5.34315 6.5 4 7.84315 4 9.5Z" stroke="#00095B" stroke-width="1"/>
            <path d="M7.00001 13L7 18M7.00001 21.0001L7.00001 22.0001" stroke="#00095B" stroke-width="1" stroke-linecap="round"/>
            <path d="M17 11.0001L17 6.0001M17 3.00002L17 2" stroke="#00095B" stroke-width="1" stroke-linecap="round"/>
            <path d="M17 22L17 18" stroke="#00095B" stroke-width="1" stroke-linecap="round"/>
            <path d="M7 2L7 6" stroke="#00095B" stroke-width="1" stroke-linecap="round"/>
            </svg>
            
            <span>Thiết lập</span>
        </a>
    </li>
</ul>
</div>
<button class="mx-auto py-4 mb-3 flex flex-col gap-2">
    <a class="whitespace-nowrap text-xs flex flex-col gap-2 items-center justify-center text-center" href="{{ route('logout') }}">
    <svg class="w-full" width="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M15 12L2 12M2 12L5.5 9M2 12L5.5 15" stroke="red" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M9.00195 7C9.01406 4.82497 9.11051 3.64706 9.87889 2.87868C10.7576 2 12.1718 2 15.0002 2L16.0002 2C18.8286 2 20.2429 2 21.1215 2.87868C22.0002 3.75736 22.0002 5.17157 22.0002 8L22.0002 16C22.0002 18.8284 22.0002 20.2426 21.1215 21.1213C20.3531 21.8897 19.1752 21.9862 17 21.9983M9.00195 17C9.01406 19.175 9.11051 20.3529 9.87889 21.1213C10.5202 21.7626 11.4467 21.9359 13 21.9827" stroke="red" stroke-width="1" stroke-linecap="round"/>
        </svg>
        
        <span>Đăng xuất</span>
    </a>
</button>
</div>