@extends('layout')

@section('content')

  <section class="container full-height">
    <div class="row align-items-center full-height">
      <div class="col-12">
        <h1>{{"$userID->first_name $userID->last_name"}}</h1>
      </div>
      <div class="col-12 text-center">
        <a href="/users/{{$userID->id}}/edit">Edit User</a>
      </div>
    </div>
  </section>

@endsection
