@extends('main')
@section('title', '|Tag')
@section('content')
<div class="row">
    <div class="col-md-8">
<h1> Тег: {{ $tag->name }}<small> | {{$tag->posts->count()}} posts</small></h1>
    </div>
    <div class="col-md-4">
        {!! Html::linkRoute('tags.edit', 'Редагувати', 
        array($tag->id),array('class'=>'btn btn-dark btn-block')) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>№</th>
                    <th>Назва</th>
                    <th>Теги</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($tag->posts as $post)
                <tr>
                    <th>{{ $post->id }}</th>
                    <td>{{ $post->title }}</th>
                    <td>@foreach($post -> tags as $tag)
                        <span class="label label-default">{{$tag->name}}</span>
                        @endforeach
                    </td>
                    <td><a href="{{ route('posts.show', $tag->id) }}" class="btn btn-dark">Показати</a></td>
                </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

