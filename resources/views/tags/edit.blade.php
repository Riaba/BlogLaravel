@extends('main')
@section('title', '| Edit')
@section('content')
{{ Form::model($tag,['route'=>['tags.update', $tag->id], 'method'=>"PUT"]) }}
    {{ Form::label('name','Назва') }}<br>
    {{ Form::text('name',null,['class'=>'form-control']) }}<hr>
    {{Form::submit('Зберегти', ['class'=>'btn btn-dark'])}}
{{ Form::close() }}
@stop