@extends('layouts.frontend.app')
@section('content')
<div class="container">
    <div class="curved">
        <!--Desktop Button-->
       <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                <button class="my-2 my-sm-0 px-4 btn-login" type="button">
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                </button>
                <button class="my-2 my-sm-0 px-4 btn-register">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                </button>
                @endauth
            </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,160L120,170.7C240,181,480,203,720,197.3C960,192,1200,160,1320,144L1440,128L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
        </div>
        <div class="wrapper">
        <div class="web">
        <img class="img" src="{{ url('backend/img/hacker.png') }}">
        </div>
        <div class="web"><h1>Selamat Datang</h1>
        <p>Nama Saya Dony Setiawan, NIM 201951200</p>
        <p>dari kelas B Pemograman Web Framework</p>
        </div>
    </div>
</div>

    
@endsection