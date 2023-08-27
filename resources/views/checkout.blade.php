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
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-white  bg-dark " >
      <div class="container">
        <a class="navbar-brand" href= "{{ route('ali') }}"  >WWD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
    
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('ali') }}" class="nav-link">Home</a></li>
            <li class="nav-item {{ Request::is('events') ? 'active' : '' }}"><a href="{{ route('events') }}" class="nav-link">Events</a></li>
            <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
            <li class="nav-item {{ Request::is('signup') ? 'active' : '' }}"><a href="{{ route('signup') }}" class="nav-link">sign up</a></li>
          </ul>
        </div>
      </div>
    </nav>
    @if(session('success'))
    <div class="alert alert-warning">
        {{ session('success') }}
    </div>
    @endif
    <!-- END nav -->
 <br><br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Checkout</h4>
                    <div>    
                      <p>Total Price: ${{ $totalPrice }}</p>
                    <form action="{{ route('checkout.store') }}" method="post" class="form">
                        @csrf
                        <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <img src="images/card.jpg" alt="">
                        <div class="form-group">
                            <label for="card_name">Card Name</label>
                            <input type="text" class="form-control @error('card_name') is-invalid @enderror" id="card_name" name="card_name" value="{{ old('card_name') }}">
                            @error('card_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="card_number">Card Number</label>
                            <input type="text" class="form-control @error('card_number') is-invalid @enderror" id="card_number" name="card_number" value="{{ old('card_number') }}">
                            @error('card_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> 
                        <div class="form-group">
                            <input type="submit" value="Checkout" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
      
      
           
          </div>
          <br><br> 






















      <footer class="ftco-footer ftco-section img">
    <div class="overlay"></div>
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-3">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">About Us</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Recent Blog</h2>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
            <div class="text">
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
              </div>
            </div>
          </div>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
            <div class="text">
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2">
         <div class="ftco-footer-widget mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Site Links</h2>
          <ul class="list-unstyled">
            <li><a href="#" class="py-2 d-block">Home</a></li>
            <li><a href="#" class="py-2 d-block">About</a></li>
            <li><a href="#" class="py-2 d-block">Donate</a></li>
            <li><a href="#" class="py-2 d-block">Causes</a></li>
            <li><a href="#" class="py-2 d-block">Event</a></li>
            <li><a href="#" class="py-2 d-block">Blog</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
              </ul>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">

        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      </div>
    </div>
  </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('js/scrollax.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
