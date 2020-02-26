@extends('layout')

@section('content')

  <section class="full-height container">
    <div class="row full-height align-items-center justify-content-center">
      <form class="col-lg-12" method="POST" action="/users">
          <h1 class="form-title text-center">Create A New User</h1>
        @csrf
        <div class="form-input row">
          <label class="col-4 d-flex justify-content-end">First Name</label>
          <input class="col-4" type="text" name="first_name">
        </div>

        <div class="form-input row">
          <label class="col-4 d-flex justify-content-end">Last Name</label>
          <input class="col-4" type="text" name="last_name">
        </div>

        <div class="form-input row">
          <label class="col-4 d-flex justify-content-end">Email</label>
          <input class="col-4" type="text" name="email">
        </div>

        <div class="row justify-content-center">
          <button class="btn btn-dark" type="submit">Submit</button>
        </div>

        @include('layouts.errors')

      </form>

    </div>
  </section>

@endsection
