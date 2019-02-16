@extends('layouts.app')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Profile Image</th>
      <th scope="col">User Name</th>
      <th scope="col">Full Name</th>
      <th scope="col">Score</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr >
      <th scope="row">{{$user->id}}</th>
      <td><img src="{{$user->profile_pic_url}}" width="50" height="50"></td>
      <td>{{$user->user_name}}</td>
      <td>{{$user->full_name}}</td>
      <td>{{$user->score}}</td>
      <td><a class="btn btn-sm btn-primary" href="{{route('instagram-users.show', $user->user_name)}}">View Images</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $users->links() }}

@endsection