@extends('main')
@section('title', '| Edit')
@section('content')
<hr />
{!! Form::model($category, ['route'=>['categories.update', $category->id],'method'=>'PUT']) !!}
<div class="row">
    <div class="col-md-8">
        {{ Form::label('name','Назва:') }}
        {{ Form::text('name', null, ['class'=>'form-control']) }}
 <br>
                <div class="col-sm-6">
                    {{ Form::submit('Зберегти', ['class'=>'btn btn-dark btn-block']) }}
                </div>  
 

 <br> <div class="col-sm-6">
                    {!! Html::linkRoute('categories.index', 'Вийти', 
                    array($category->id),array('class'=>'btn btn-dark btn-block')) !!}
                    </div>
   </div>
</div><!-- end a row form-->
{!! Form::close() !!}
@stop
