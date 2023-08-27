<!DOCTYPE html>
<html lang="en">
  <head>
    <title>WWD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" class="asset">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}" class="asset">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" class="asset">
    
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}" class="asset">
    
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}" class="asset">
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}" class="asset">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}" class="asset">
    
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" class="asset">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}" class="asset">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" class="asset">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="{{ route('ali') }}">
          <img src="{{ asset('images/orph.jpg') }}" alt="Orphans Logo" style="width: 100px;height:70px;">
      </a>        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
    
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('ali') }}" class="nav-link">Home</a></li>
          <li class="nav-item {{ Request::is('events') ? 'active' : '' }}"><a href="{{ route('events') }}" class="nav-link">Events</a></li>
            <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
            @auth
        <!-- If user is authenticated (session exists), display logout link -->
       
          <li class="nav-item"> <a href="{{ route('orphanages') }}" class="nav-link">Orphancare</a>        </li>

            <li class="nav-item"> <a href="{{ route('products') }}" class="nav-link">products</a>         </li>
            <li class="nav-item"> <a href="{{ route('logout') }}" class="nav-link">Logout</a>

        </li>
    @else
        <!-- If user is not authenticated (no session), display login link -->
        <li class="nav-item {{ Request::is('login') ? 'active' : '' }}"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
    @endauth
          </ul>
        </div>
      </div>
    </nav>
 
    <!-- END nav -->
   
    