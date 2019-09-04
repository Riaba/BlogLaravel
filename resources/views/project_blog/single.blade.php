@extends('main')
@section('title', "| $post->title")
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        
        <p><h3>Category</h3> {{ $post->category->name }}</p>
        <h1> <img src="{{ asset('images/'.$post->image) }}" style="width: 150px; height: 150px;"> {{ $post->title }}</h1>
        <p>{!! $post->body !!}</p>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        @foreach($post->comments as $comment)
        <div class="comment">
            <p><strong>Ім'я:</strong> {{ $comment->name }}</p>
            <p><strong>Коментар:</strong> <br>{{ $comment->comment }}</p>
        </div>

        @endforeach
    </div>
</div>

<div class="row">
    <div class="comment-form">
        {{ Form::open(['route'=>['comments.store',$post->id, 'method'=>'POST']]) }}
        <div class="row">
            <div class="col-md-6">
                {{ Form::label('name',"Назва") }}
                {{ Form::text('name',null,['class'=>'form-control']) }}
            
                {{ Form::label('email',"Email") }}
                {{ Form::text('email',null,['class'=>'form-control']) }}
            </div>
            <div class="col-md-12">
                {{ Form::label('comment',"Коментар") }}
                {{Form::textarea('comment', null,['class'=>'form-control'])}}<hr>
                {{ Form::submit('Додати', ['class'=>'btn btn-dark']) }}
                </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop

