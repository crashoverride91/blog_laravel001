@extends('layouts.app')
@section('title')
<div class="justify-content-center text-center">
  <h3 class="text-uppercase">{{$title}}</h3>
</div>
@endsection

@section('content')
@if ( !$posts->count() )
 <h5 class="text-dark text-center mt-3">There is no post till now. Login and write a new post now!!!</h5>
@else
<div class="">
  @foreach( $posts as $post )
  <div class="list-group my-3">
    <div class="list-group-item">
      <h3><a href="{{ url('/'.$post->slug) }}" class="text-decoration-none text-primary">{{ $post->title }}</a>
        @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
          @if($post->active == '1')
          <button class="btn btn-success" style="float: right"><a href="{{ url('edit/'.$post->slug)}}" class="text-decoration-none text-white">Edit Post</a></button>
          @else
          <button class="btn btn-success" style="float: right"><a href="{{ url('edit/'.$post->slug)}}" class="text-decoration-none text-white">Edit Draft</a></button>
          @endif
        @endif
      </h3>
      <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>
    </div>
    <div class="list-group-item">
      <article>
        {!! Str::limit($post->body, $limit = 1500, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}
      </article>
    </div>
  </div>
  @endforeach
  {!! $posts->render() !!}
</div>
@endif
@endsection
