@extends('layouts.guest')

@section('content')

    <ul class="navbar-nav ml -auto">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif

        @else
            <li>
                ciao {{ Auth::user()->name }}
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('admin.home') }}">{{__('Dashboard')}}</a>
            </li>
        @endguest
    </ul>

    <div class="container">
        <h1>Home pubblica</h1>
        <p>nnamooooooo</p>
    </div>
@endsection
