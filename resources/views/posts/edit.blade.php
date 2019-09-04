<!DOCTYPE html>
@extends('main')
@section('title', '| Edit')
@section('content')
<head>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 <script>tinymce.init({
  selector: "textarea", 
  plugins: "emoticons link code"
});</script>
</head>
<hr />
{!! Form::model($post, ['route'=>['posts.update', $post->id],'files'=>true,'method'=>'PUT'] )!!}
<div class="row">
    <div class="col-md-8">
        {{ Form::label('title','Заголовок:') }}
        {{ Form::text('title', null, ['class'=>'form-control']) }}
        <br />
        
        {{ Form::label('slug', 'Slug') }}
        {{ Form::text('slug',null, ['class'=>'form-control']) }}
        <br />
        {{ Form::label('category_id', 'Категорія') }}
        {{ Form::select ('category_id',$categories, null, ['class'=>'form-control']) }}
        <br />
        
        {{ Form::label('image', 'Зображення') }}<br>
        {{ Form::file('image') }}
        <br/>
        {{ Form::label('tags','Теги') }}
        {{ Form::select('tags[]',$tags, null, ['class'=>'form-control','multiple'=>'multiple'])}}
         <br/> 
        {{ Form::label('body','Опис:') }}
        {{ Form::textarea('body',null, ['class'=>'form-control']) }}
 </div>
    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>Створений:</dt>
                <dd>{{$post->created_at}}</dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Оновлений:</dt>
                <dd>{{$post->updated_at}}</dd>
            </dl>
            <hr />
            <div class="row">
                <div class="col-sm-6">
                    {{ Form::submit('Зберегти', ['class'=>'btn btn-dark btn-block']) }}
                </div>
                <div class="col-sm-6"> 
                    {!! Html::linkRoute('posts.show', 'Вийти', 
                    array($post->id),array('class'=>'btn btn-dark btn-block')) !!}
                </div>
            </div>
        </div>
    </div>
</div><!-- end a row form-->
{!! Form::close() !!}
@stop
