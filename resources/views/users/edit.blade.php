@extends('layout')

@section('content')

    <section class="row text-center edit">
        <div class="col-12">

            <h1>Update User</h1>
            <hr>
            <form class="row flex-column align-items-center" method="post" action="/users/update/{{$user->id}}">
                @csrf
                <!-- {{ method_field('patch') }} -->

                <div class="col-12 form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name"  value="{{ $user->first_name }}" />
                </div>

                <div class="col-12 form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name"  value="{{ $user->last_name}}" />
                </div>

                <div class="col-12 form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" />
                </div>

                <button class="col-1 btn btn-dark" type="submit">Update</button>
            </form>

        </div>

    @if (session()->has('message'))
            <div class="offset-4 col-4 alert alert-success text-center confirmation">
                {{ session()->get('message') }}
            </div>
            <div class="col-12">
                <a class="btn btn-dark" href="/users">Back To Users</a>
            </div>
    @endif

    </section>

@endsection
