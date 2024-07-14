<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>

<body class="w-full h-screen overflow-y-hidden bg-zinc-100 relative"> 

<main class="w-full flex">
    <div class="fixed left-0 top-0 shadow">
        @include('includes.side-taskbar')
    </div>
    <div class="w-full block overflow-auto">
        @include('includes.header')
        <div class="flex-1 h-full content-wrapper flex gap-0 xl:gap-3">
            <div class="w-full xl:w-4/5">
            @yield('content')
            </div>
            <div class="hidden xl:block w-full xl:w-1/5 bg-blue-300 h-full">
                @include('includes.right-content')
            </div>
        </div>
        {{-- @include('includes.footer') --}}
    </div>
</main>


@include('includes.scripts-body')

</body>
</html>