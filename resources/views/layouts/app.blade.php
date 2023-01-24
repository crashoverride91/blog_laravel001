<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Netoget Live Journal</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Google Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  </head>

   <style>

    .bg-menu{

      color:White;
      background: rgba(6, 136, 211, 0.911);
      width: 15%;
      
    }


    body{

      
      background: rgb(240, 242, 246);
      background: linear-gradient(90deg, rgb(247, 250, 255) 0%, rgba(237, 246, 253, 0.872) 100%);      
    }

    .heading{

      font-size:35px;
    }

  </style>  
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header d-flex">
          <button type="button" class="navbar-toggle collapsed btn btn-primary btn-lg" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <i class="fas fa-bars"></i>
            <span class="sr-only">Toggle Navigation</span>
          </button>
          <h1 class="ml-4 text-center"><a class="navbar-brand text-decoration-none text-dark heading" href="{{url('/')}}" class="font-title">Netoget <i class="text-muted">Live Journal</i></a></h1>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="card bg-menu">
          <ul class="nav navbar-nav">
            <li class="mt-2">
              <a href="{{ url('/') }}" class="text-decoration-none text-white fw-bold"> Home</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
            <li class="mt-1">
              <a href="{{ url('/auth/login') }}" class="text-decoration-none text-white fw-bold">Login</a>
            </li>
            <li class="mt-1">
              <a href="{{ url('/auth/register') }}" class="text-decoration-none text-white fw-bold">Register</a>
            </li>
            @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle text-white text-decoration-none" data-toggle="dropdown" role="button" aria-expanded="true">{{ Auth::user()->name }} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                @if (Auth::user()->can_post())
                <li>
                  <a href="{{ url('/new-post') }}" class="text-decoration-none text-primary fw-bold">Add new post</a>
                </li>
                <li>
                  <a href="{{ url('/user/'.Auth::id().'/posts') }}" class="text-decoration-none text-primary fw-bold">My Posts</a>
                </li>
                @endif
                <li>
                  <a href="{{ url('/user/'.Auth::id()) }}" class="text-decoration-none text-primary fw-bold">My Profile</a>
                </li>
                <li>
                  <a href="{{ url('/logout') }}" class="text-decoration-none text-primary fw-bold">Logout</a>
                </li>
              </ul>
            </li>
            @endif
          </ul>
        </div>
        </div>
      </div>
    </nav>
    <div class="container">
      @if (Session::has('message'))
      <div class="flash alert-info">
        <p class="panel-body">
          {{ Session::get('message') }}
        </p>
      </div>
      @endif
      @if ($errors->any())
      <div class='flash alert-danger'>
        <ul class="panel-body">
          @foreach ( $errors->all() as $error )
          <li>
            {{ $error }}
          </li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="row d-flex justify-content-center">
        <div class="col-12 col-lg-10">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2>@yield('title')</h2>
              @yield('title-meta')
            </div>
            <div class="panel-body">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
      <footer class="">
        <div class="container">
          <div class="row">
            <div class="col-12">
                <p class="mt-4 text-center mt-3">Netoget Live Journal | Developed by  <a href="#">Netoget</a> Antonio Lobusto</p>
            </div>
          </div>
        </div>
      </footer>
    
    </div>
    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>