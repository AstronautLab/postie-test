@extends('layouts.app')

@section('content')
<h1 >({{$user->user_name}}) Images</h1>
<br>

@foreach ($user->medias->chunk(4) as $mediasChunk)

<div class="row">
        
    @foreach($mediasChunk as $media)
    <div class="col-sm-3">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text"></p>
             <a href="#" target="_blank">
                <img widht=200  height=200 src="{{url('storage/'.$media->image)}}">
            </a>
        </div>
        </div>
    </div>

    @endforeach
</div>
@endforeach

@endsection