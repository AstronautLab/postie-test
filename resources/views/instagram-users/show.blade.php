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
            <p class="card-text">Likes ({{$media->likes}}) , Comments ({{$media->comments}})</p>
             <a href="{{route('instagram-user-image.show',[$user->user_name, $media->id])}}">
                <img widht=200  height=200 src="{{url('storage/'.$media->image)}}">
            </a>
        </div>
        </div>
    </div>

    @endforeach
</div>
@endforeach

@endsection