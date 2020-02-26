@extends('layout')

@section('content')

  <section class="container full-height">
    <div class="row align-items-center full-height">
      <div class="col-12 user-profile">
        <h1>User Profile</h1>
        <hr>
        <p><span>Name:</span> {{ "$userID->first_name $userID->last_name" }}</p>
        <p><span>Email:</span> {{ $userID->email }}</p>
        <a class="btn btn-dark" href="/users/{{$userID->id}}/edit">Edit User</a>
      </div>
    </div>
  </section>

@endsection
