@extends('main')
@section('title', '| Edit')
@section('content')
<h3>Редагувати</h3>
{!! Form::model($comment, ['route'=>['comments.update', $comment->id],'method'=>'PUT']) !!}
    {{ Form::label('name', 'Ім`я') }}
    {{ Form::text('name',null,['class'=>'form-control','disabled'=>'']) }}
    {{ Form::label('email','Email') }}
    {{ Form::text('email',null, ['class'=>'form-control','disabled'=>'']) }}
    {{ Form::label('comment', 'Коментар') }}
     {{ Form::textarea('comment',null, ['class'=>'form-control']) }}<hr>
    {{ Form::submit('Редагувати',['class'=>'btn btn-dark']) }}
{!!Form::close()!!}
@stop