@extends('layout')

@section('content')

  <div class="row flex-column content view-users">
    <h1 class="col-12">All Users</h1>
  </div>

  @if (session()->has('message'))
  <div class="offset-4 col-4 alert alert-success text-center confirmation">
        {{ session()->get('message') }}
  </div>
  @endif

  <hr>
  <div class="row">
    <table class="col-12">
      <thead style="font-weight: bold">
        <td class="table-header">ID</td>
        <td class="table-header">First Name</td>
        <td class="table-header">Last Name</td>
        <td class="table-header">Email</td>
        <td class="table-header">Profile</td>
      </thead>
      <hr>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td class="inner-table">{{ $user->id }}</td>
            <td class="inner-table">{{ $user->first_name }}</td>
            <td class="inner-table">{{ $user->last_name }}</td>
            <td class="inner-table">{{ $user->email }}</td>
            <td class="inner-table"><a class="btn btn-dark" href="/users/{{$user->id}}">Profile</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
