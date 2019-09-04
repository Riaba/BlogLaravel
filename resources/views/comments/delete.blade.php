@extends('main')
@section('title', '| Delete?')
@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>Справді видалити?</h1>
        <p><strong>Ім'я</strong> {{$comment->name}}<br>
            <strong>Email</strong> {{$comment->email}}<br>
            <strong>Коментар</strong> {{$comment->comment}}<br>
         </p>
         {{ Form::open(['route'=>['comments.destroy',$comment->id], 'method'=>'DELETE']) }}
         {{Form::submit('Так, видалити',['class'=>'btn btn-dark'])}}
         {{Form::close()}}
    </div>  
</div>
@stop