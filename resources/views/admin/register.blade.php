@extends('layout.master')

@section('content')
<div class="p-3 max-w-sm mx-auto my-2 bg-white rounded-xl shadow-xl items-center ">
    <p class="text-2xl font-bold">Administrator Registration</p>
    
    <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="my-4">    
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            Administrator Name
            </label>
            <input class="w-full shadow appearance-none border-bottom rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="enter you name">
            @error('name')
            <span class="text-sm text-red"> {{$message}}</span>
            @enderror
        </div>
        <div class="my-4">    
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            E-Mail Address
            </label>
            <input class="w-full shadow appearance-none border-bottom rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="text" placeholder="enter your e-mail address">
            @error('email')
            <span class="text-sm text-red"> {{$message}}</span>
            @enderror
        </div>
        <div class="my-4">    
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Password
            </label>
            <input class="w-full shadow appearance-none border-bottom rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="enter your password">
            @error('password')
            <span class="text-sm text-red"> {{$message}}</span>
            @enderror
        </div>
        <div class="my-4">    
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
            Password (Again)
            </label>
            <input class="w-full shadow appearance-none border-bottom rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" name="password_confirmation" type="password" placeholder="enter your password again">
            @error('password_confirmation')
            <span class="text-sm text-red"> {{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="bg-cyan-600 m-2 p-2 rounded hover:text-black hover:bg-cyan-400">Register</button>
    </form>

    
</div>
@endsection