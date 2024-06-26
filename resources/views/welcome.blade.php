@extends('layout.layout')

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a href="{{ url('/dashboard') }}">Dashboard</a>
        @else
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
    </div>
    @endif
<div class="content center">
    <div class="d-flex justify-content-center align-items-center">
        <div class="title">
            <img src="/img/judiciary-img1.png" alt=""><br />
        </div>
    </div>
    <div>
        {{-- <h4 class='mssg'>{{ session('mssg') }}</h4> --}}
    </div>

</div>
</div>
@endsection
