@extends('layout')

@section('content')

        <section class="flex-center position-ref full-height container welcome-container">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    MFour
                    <small>Software Engineer Assessment</small>
                </div>

                <div class="links">
                    <a href="/users">View Users</a>
                    <a href="/users/create">Create User</a>
                </div>
            </div>
        </section>

@endsection
