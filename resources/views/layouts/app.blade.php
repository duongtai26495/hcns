<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>

<body class="w-full bg-zinc-100"> 

<main class="w-full flex">
    <div class="hidden h-screen bg-blue-950 sidebar md:block fixed top-0 left-0 z-[99] overflow-hidden whitespace-nowrap px-3">
            @include('includes.sidebar')
    </div>
    <div class="w-full dashboard block">
        @include('includes.header')
        <div class="flex-1 h-full p-10">
            @yield('content')
        </div>
        @include('includes.footer')
    </div>
</main>



</body>
</html>