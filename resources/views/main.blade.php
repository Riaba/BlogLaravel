<head>
@include('partials.head')
</head>
  <body>
     @include('partials.nav')
      <div class="container">
          @include('partials.messages')
        <!--  {{ Auth::check() ? "Logged in" : "Logged out" }} -->
          @yield('content')
           @include('partials.footer')
      </div> <!-- end container-->
  </body>
