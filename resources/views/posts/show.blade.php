@extends('main')
@section('title', '|View')
@section('content')
<div class="row">
    <div class="col-md-8">
        <h1><img src="{{ asset('images/'.$post->image) }}" style="width: 150px; height: 150px;">  {{ $post ->title}}</h1>
        
            <p class="lead">{!! $post->body !!}</p>
            <hr>
            @foreach($post->tags as $tag)
            <span class="label label-default">{{ $tag->name }}</span>
            @endforeach
            
            <div class="comment">
                <h3>Коментарі</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ім'я</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($post->comments as $comment)
                            <tr>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->email }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td><a href="{{route('comments.edit', $comment->id)}}" class="btn btn-xs btn-dark">Редагувати</a>
                                    <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-dark">Видалити</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody></table></div></div>
    <div class="col-md-4">
        <div class="well">
             <dl class="dl-horizontal">
                 <label>Slug:</label><br>
                <dd><a href="{{url('project_blog/'.$post->slug)}}">{{url($post->slug)}}</a></dd>             
            </dl>
             <dl class="dl-horizontal">
                 <label>Категорія:</label><br>
                <dd>{{ $post->category->name }}</dd>
            </dl>
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
                    {!! Html::linkRoute('posts.edit', 'Редагувати', 
                    array($post->id),array('class'=>'btn btn-dark btn-block')) !!}
                </div>
                <div class="col-sm-6"> 
                    {!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!} 
                    {!! Form:: submit('Видалити', ['class'=>'btn btn-dark btn-block']) !!}
                    {!! Form::close() !!}
                </div>
                 <div class="col-sm-6"> 
                    {!! Html::linkRoute('posts.index', 'До списку', 
                    array($post->id),array('class'=>'btn btn-dark btn-block')) !!}
                </div></div></div></div></div>
@endsection

