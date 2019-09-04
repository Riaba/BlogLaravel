<!DOCTYPE html>
@extends('main')
@section ('title', '| Create')
@section('stylesheets')
{!!Html::style('css/parsley.css')!!}
  
@endsection

<head>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 <script>tinymce.init({
  selector: "textarea", 
  plugins: "emoticons link code"
});</script>
</head>
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Створити новий пост</h1>
        <hr>
        {!! Form:: open(array('route' => 'posts.store','data-parsley-validate' => '', 'files'=>true))!!}
        {{Form:: label('title', 'Заголовок')}}
            {{Form::text('title', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'255'))}}
            
            {{ Form::label('slug', 'Slug') }}
            {{ Form::text('slug', null, array('class'=>'form-control','required'=>'','minlength'=>5,'maxlength'=>'255')) }}
            
             {{ Form::label('category_id', 'Категорія') }}
             <select class="form-control" name="category_id">
                 @foreach($categories as $category)
                 <option value="{{$category->id  }}">{{ $category->name }}</option>
                 @endforeach
             </select>
             
              {{ Form::label('tags', 'Теги') }}
             <select  class=" form-control selectpicker" multiple='multiple' name="tags[]" >
                 @foreach($tags as $tag)
                 <option value="{{$tag->id  }}">{{ $tag->name }}</option>
                 @endforeach
             </select>
             
              {{ Form::label('image', 'Додати зображення') }}<br>
              {{ Form:: file('image' ) }}<br>
            
        {{Form:: label('body', 'Опис')}}
        {{Form::textarea('body', null, array('class'=>'form-control'))}}
        <br>
        {{Form::submit('Створити', array('class'=>'btn btn-dark'))}}
        {!!Form::close()!!}
    </div>
</div>
@endsection

@section('scripts')
{!!Html::script('js/parsley.min.js')!!}
@endsection