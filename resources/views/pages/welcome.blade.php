@extends ('main')
@section ('title', '| Home')
@section ('content')

          <div class="row">
              <div class="col-md-12">
                  <div class="jumbotron" style="background-image:url(https://images2.alphacoders.com/734/734356.jpg) ">
                      <h1 style="text-align: center; font-family: fantasy; letter-spacing: 20px; ">This is my blog</h1>
                  </div>
                 </div>
           </div><!-- end header row-->
           <div class="row">
               <div class="col-md-8" style="background-color: wheat; font-family: monospace; ">
                   <div class="post">
                       <h2 style="letter-spacing: 20px; color: #761b18">Мої пости</h2>
                       @foreach ($posts as $post)
                       <h3>{{ $post->title}}</h3>
                      <p>{{ substr(strip_tags($post->body),0,150)}}{{ strlen(strip_tags($post->body))>150 ? "..." : "" }}</p>
                       <a href="{{ url('project_blog/'.$post->slug) }}" class="btn btn-light">Читати більше</a>
                        @endforeach
                   </div>
                   <hr>          
                  </div>
                   <div class="col-md-4 col-md-offset-1" style="background-color: lightblue; font-family: monospace">
                       <h1 style="letter-spacing: 10px; color: #761b18">Цитати дня</h1>
                       <p style="font-family: cursive; ">
                       <ul type="disc">
                           <li>Прагніть не до успіху, а до цінностей, які він дає <br> <b>- Альберт Айнштайн</b></li><hr>
                           <li>Своїм успіхом я зобов’язана тому, що ніколи не виправдовувалася і не приймала виправдань від інших. <br><b>- Флоренс Найтінгейл</b></li><hr>
                       </ul>
                           
                           </p>
                       
                   </div>
           </div>
@endsection