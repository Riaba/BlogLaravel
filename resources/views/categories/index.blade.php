@extends('main')
@section('title', '| Categories')
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
                    @foreach ($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->name}}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td><a href="{{route('categories.edit', $category->id)}}" ><img src="https://img.icons8.com/metro/26/000000/edit-property.png"></a>
                           {!! Form::open(['route'=>['categories.destroy',$category->id],'method'=>'DELETE']) !!} 
                           {!! Form::image(url('https://img.icons8.com/material/24/000000/delete--v1.png'), 'submit') !!}
                           {!! Form::close() !!}</td>
                    </tr>
                    @endforeach
               </tbody> 
            </table>  
    </div>
    <div class="col-md-3">
        {!! Form::open(['route'=>'categories.store', 'method'=>'POST']) !!}
        <h2>Нова категорія</h2>
        {{ Form::label('name', 'Назва') }}
        {{ Form::text('name', null, ['class'=>'form-control']) }}<br>
        {{ Form::submit('Створити', ['class'=>'btn btn-dark']) }}
        {!! Form::close() !!}
    </div>
</div>
@stop