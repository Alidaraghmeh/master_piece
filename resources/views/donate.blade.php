<!DOCTYPE html>
<html lang="en">
  <head>
    <title>WWD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,400i,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-white  bg-dark " >
      <div class="container">
        <a class="navbar-brand" href="{{ route('ali') }}">
          <img src="{{ asset('images/orph.jpg') }}" alt="Orphans Logo" style="width: 100px;height:80px;">
      </a>       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
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
    <!-- END nav -->
   <br><br>
   <div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card" style="border: 1px solid rgb(222, 90, 23)">
            <div class="card-body">
                <h4 class="card-title text-center mb-4">Donation</h4>
                <form action="{{ route('donate.store') }}" method="post" class="form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control border-dark @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>                  
                    <div class="form-group">
                        <label for="NID">National ID</label>
                        <input type="text" class="form-control border-dark @error('NID') is-invalid @enderror" id="NID" name="NID" value="{{ old('NID') }}">
                        @error('NID')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control border-dark @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control border-dark @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <img src="images/card.jpg" alt="">
                    <div class="form-group">
                        <label for="card_name">Card Name</label>
                        <input type="text" class="form-control border-dark @error('card_name') is-invalid @enderror" id="card_name" name="card_name" value="{{ old('card_name') }}">
                        @error('card_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="card_number">Card Number</label>
                        <input type="text" class="form-control border-dark @error('card_number') is-invalid @enderror" id="card_number" name="card_number" value="{{ old('card_number') }}">
                        @error('card_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="amount">amount</label>
                      <input type="text" class="form-control border-dark @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}">
                      @error('amount')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
                    <div class="form-group">
                        <input type="submit" value="Donate" class="btn btn-primary btn-block">
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


 <script src="js/jquery.min.js"></script>
 <script src="js/jquery-migrate-3.0.1.min.js"></script>
 <script src="js/popper.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/jquery.easing.1.3.js"></script>
 <script src="js/jquery.waypoints.min.js"></script>
 <script src="js/jquery.stellar.min.js"></script>
 <script src="js/owl.carousel.min.js"></script>
 <script src="js/jquery.magnific-popup.min.js"></script>
 <script src="js/aos.js"></script>
 <script src="js/jquery.animateNumber.min.js"></script>
 <script src="js/bootstrap-datepicker.js"></script>
 <script src="js/jquery.timepicker.min.js"></script>
 <script src="js/scrollax.min.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
 <script src="js/google-map.js"></script>
 <script src="js/main.js"></script>