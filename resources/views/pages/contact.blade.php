@extends ('main')
@section ('title', '| Contact')
@section ('content')
          <div class="row">
              <div class="col-md-12">
                  <h1>Мої контакти</h1>
                  <hr>
                  <p>+380973281125</p>
                  <p>romashka@gmail.com</p>
                  <p>instagram:real_romashka</p>
                  <hr>
                  <h2>Answer or Question?</h2>
                  <br>
                  <form action="{{ url('contact') }}" method="POST">
                      {{ csrf_field() }}
                      <div class="form-group">
                          <label name="email">Email:</label>
                          <input id="email" name="email" class="form-control" />
                      </div>
                      
                      <div class="form-group">
                          <label name="subject">Предмет:</label>
                          <input id="subject" name="subject" class="form-control" />
                      </div>
                      
                      <div class="form-group">
                          <label name="message">Повідомлення:</label>
                          <textarea id="message" name="message" class="form-control">Залиш повідомлення тут...</textarea>
                      </div>
                      <input type="submit" value="Send me" class="btn btn-dark" />
                  </form>
              </div>
           </div><!-- end header row-->  
@endsection