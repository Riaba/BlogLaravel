@extends ('main')
@section('title', '| Posts')
@section ('content')
<div class="row">
    <div class="col-md-10">
        <h1>Пости</h1>
    </div>
    <div class="col-md-2">
        <a href="{{ route('posts.create') }}" class="btn btn-lg btn-dark">Новий пост</a>
    </div>
    <div class="col-md-12">
      <hr />
    </div>
 </div> <!-- end first row-->
    <div class="row">
        <div class="col-md-12">
            <table class="table">
               <thead class="thead-dark">
                <th>№</th>
                <th>Заголовок</th>
                <th>Опис</th>
                <th>Дата створення</th>
                <th>Дата оновлення</th>
                <th></th>
               </thead>
               <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <th>{{ $post->id }}</th>
                        <td>{{ $post->title}}</td>
                        <td>{{ substr(strip_tags($post->body),0,50)}}{{ strlen(strip_tags($post->body))>50 ? "..." : "" }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td><a href="{{route('posts.show', $post->id)}}" ><img src="https://img.icons8.com/material-sharp/24/000000/view-shedule.png"></a><hr>
                            <a href="{{route('posts.edit', $post->id)}}" ><img src="https://img.icons8.com/metro/26/000000/edit-property.png"></a><hr>
                           {!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!} 
                           {!! Form::image(url('https://img.icons8.com/material/24/000000/delete--v1.png'), 'submit') !!}
                           {!! Form::close() !!}
                     <!-- <a href="{{route('posts.destroy', $post->id)}}"><img src="https://img.icons8.com/material/24/000000/delete--v1.png"></a></td>-->
                    </tr>
                    @endforeach
               </tbody> 
            </table>  
            <div class="text-center" style=" color: #fff; background-color: #352828; ">
                {!! $posts->links(); !!}
            </div>
        </div>
    </div>

@stop
