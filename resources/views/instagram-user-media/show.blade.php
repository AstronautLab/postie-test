@extends('layouts.app')


@section('content')

<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <button type="submit" class="btn btn-primary">Send Email With Total Points</button>
</form>
<br>
<div class="row">
        
    <div class="col-sm-3">

        <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">Likes ({{$media->likes}}) , Comments ({{$media->comments}})</p>
                    <img widht=200  height=200 src="{{url('storage/'.$media->image)}}">
                    <br><br>
                    <a href="{{$media->media_url}}" target="_blank" class="btn btn-primary">Go To Post Link</a>
                </div>
        </div>
    </div>

</div>

@endsection