<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>@section('title') Blog @show</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    

    <!-- Bootstrap core CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> -->
   @vite(['resources/js/app.js'])
    <!-- Favicons -->
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<header>
      @section('header')
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-white">Привет,
            @if(Auth::check())
            {{Auth::user()->name}}
           @endif</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">

            @if(Auth::check())
              @if(Auth::user()->is_admin == 1)
              <li><a href="{{ route('main.index') }}" class="text-white">View table</a></li>
              @endif
            @endif
            
            @auth
            <li><a href="/post/create" class="text-white">Create Post</a></li>
            <li><a href="{{ route('logout') }}" class="text-white">Logout</a></li>
            @endauth

            @guest
            <li><a href="{{route('user.create')}}" class="text-white">Registrazion</a></li>
            <li><a href="{{route('login.create')}}" class="text-white">Authorization</a></li>
            @endguest

            <li><a href="{{route('about')}}" class="text-white">About</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
            <li>{{dump(Auth::check())}}</li>
            
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Album</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
      @show
</header>

<main>

@if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
@endif

@if(session('error'))
      <div class="alert alert-success">
        {{ session('error') }}
      </div>
@endif

@yield('content')

</main>

@include('layouts.footer')

  </body>
</html>