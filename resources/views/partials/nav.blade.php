  <!--Default Bootstrap Navbar-->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">BLOG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="{{ Request::is('/') ? "active" : "" }}">
          <a class="nav-link" href="/" >Home</a>
      </li>
      <li class="{{ Request::is('project_blog') ? "active" : "" }}">
          <a class="nav-link" href="project_blog" >Blog</a>
      </li>
      <li class="{{ Request::is('about') ? "active" : "" }}">
        <a class="nav-link" href="/about">Про мене</a>
      </li>
      <li  class="{{ Request::is('contact') ? "active" : "" }}">
        <a class="nav-link" href="/contact">Контакти</a>
      </li>
      @if(Auth::check())
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('posts.index') }}">Пости</a>
           <a class="dropdown-item" href="{{ route('categories.index') }}">Категорії</a>
             <a class="dropdown-item" href="{{ route('tags.index') }}">Теги</a>
          <a class="dropdown-item" href="{{ route('auth/logout') }}">Вийти</a>
        </div>
      </li>
      @else
      <a href="{{ route('auth/login') }}" class="btn btn-dark">Login</a>
      @endif
      
      
    </ul>
  </div>
</nav>  
