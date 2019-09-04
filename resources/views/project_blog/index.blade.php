@extends('main')
@section('title', '| Blog')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Блог</h1>
    </div>
</div>
@foreach($posts as $post)
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2><img src="{{ asset('images/'.$post->image) }}" style="width: 50px; height: 50px;">{{ $post->title }}</h2>
        <h5>Опубліковано {{$post->created_at}}</h5>
        <p>{{ substr(strip_tags($post->body),0,50)}}{{ strlen(strip_tags($post->body))>50 ? "..." : "" }}</p>
        <a href="{{ route('project_blog.single',$post->slug) }}">Читати більше</a>
    </div>
</div>
@endforeach
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            {!! $posts->links() !!}
        </div>
    </div>
</div>
@stop