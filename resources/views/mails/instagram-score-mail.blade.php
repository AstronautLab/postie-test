@extends('layouts.app')

@section('content')

<h1>Total Score = {{$user->score}}</h1>
<br>
<h1>Image Score Points = {{$media->likes + ($media->comments * 5)}}</h1>
<br> <br>

<a  href="{{$media->media_url}}" target="_blank" >
    <img widht=200  height=200 src="{{url('storage/'.$media->image)}}">
</a>
@endsection