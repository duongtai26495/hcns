@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
    <label for="select-example" class="block text-sm font-medium text-gray-700">Chọn một tùy chọn</label>
    <select id="select-example" class="capitalize mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
       
        @foreach ($roles as $role)
            @if($role -> name !== 'root')
        <option class="capitalize" value="{{ $role -> id}}">{{ $role -> name }}</option>
        @endif
        
@endforeach

    </select>
</div>
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
    <label for="select-example" class="block text-sm font-medium text-gray-700">Chọn một tùy chọn</label>
    <select id="select-example" class="capitalize mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
       
        @foreach ($departments as $depart)
        <option class="capitalize" value="{{ $depart -> id }}">{{ $depart -> ten }}</option>
@endforeach

    </select>
</div>

@endsection