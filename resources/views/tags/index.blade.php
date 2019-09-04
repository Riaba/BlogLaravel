@extends('main')
@section('title', '| Tags')
@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>Категорії</h1>
        <table class="table">
               <thead class="thead-dark">
                <th>№</th>
                <th>Назва</th>
                <th>Дата створення</th>
                <th>Дата оновлення</th>
                <th></th>
               </thead>
               <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td>{{ $tag->name}}</td>
                        <td>{{ $tag->created_at }}</td>
                        <td>{{ $tag->updated_at }}</td>
                        <td><a href="{{route('tags.show', $tag->id)}}" ><img src="https://img.icons8.com/material-sharp/24/000000/view-shedule.png"></a><hr>
                           {!! Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'DELETE']) !!} 
                           {!! Form::image(url('https://img.icons8.com/material/24/000000/delete--v1.png'), 'submit') !!}
                           {!! Form::close() !!}</td>
                    </tr>
                    @endforeach
               </tbody> 
            </table>  
    </div>
    <div class="col-md-3">
        {!! Form::open(['route'=>'tags.store', 'method'=>'POST']) !!}
        <h2>Новий тег</h2> 
        {{ Form::label('name', 'Назва') }}
        {{ Form::text('name', null, ['class'=>'form-control']) }}<br>
        {{ Form::submit('Створити', ['class'=>'btn btn-dark']) }}
        {!! Form::close() !!}
    </div>
</div>
@stop