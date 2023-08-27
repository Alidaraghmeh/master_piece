@extends('layouts.layout')


@section('content')
    
<style>
  /* Custom CSS for error messages */
  .invalid-feedback {
      color: black;
  }
</style>

    <div class="hero-wrap" style="background-image: url('images/bg_7.jpg');" data-stellar-background-ratio="0.5">
     
      <div class="container" >
      
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          @if (Session::has('success'))
          <div class="alert alert-warning">
              {{ Session::get('success') }}
          </div>
          @endif
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '30%' }">
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', }">If you give something in this life, do not wait for something in return, because God will give you ten times what you gave</p>

   <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href={{ route('signup' ) }} class="btn btn-white btn-outline-white px-4 py-3 "><span class=" mr-2"></span>Sign Up</a></p>
          </div>
        </div>
      </div>
    </div>
  
    <section class="ftco-counter ftco-intro" id="section-counter">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-5 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 color-1 align-items-stretch">
              <div class="text">
              	<span>Served Over</span>
                <strong class="number" data-number="1432805">0</strong>
                <span>Children in 190 countries in the world</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 color-2 align-items-stretch">
              <div class="text">
              	<h3 class="mb-4">Donate Money</h3>
              	<p>Even the all-powerful Pointing has no control about the blind texts.</p>
              	<p><a href="{{route('donate')}}" class="btn btn-white px-3 py-2 mt-2">Donate Now</a></p>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 color-3 align-items-stretch">
              <div class="text">
              	<h3 class="mb-4">Be a Volunteer</h3>
              	<p>Even the all-powerful Pointing has no control about the blind texts.</p>
              	<p><a href="#volu" class="btn btn-white px-3 py-2 mt-2">Be A Volunteer</a></p>
              </div>
            </div>
          </div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 d-flex services p-3 py-4 d-block">
              <div class="icon d-flex mb-3"><span class="flaticon-donation-1"></span></div>
              <div class="media-body pl-4">
                <h3 class="heading">Make Donation</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 d-flex services p-3 py-4 d-block">
              <div class="icon d-flex mb-3"><span class="flaticon-charity"></span></div>
              <div class="media-body pl-4">
                <h3 class="heading">Become A Volunteer</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 d-flex services p-3 py-4 d-block">
              <div class="icon d-flex mb-3"><span class="flaticon-donation"></span></div>
              <div class="media-body pl-4">
                <h3 class="heading">Sponsorship</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>    
          </div>
        </div>
    	</div>
    </section>


    <section class="ftco-section bg-light">
      <div class="container-fluid">
          <div class="row justify-content-center mb-5 pb-3">
              <div class="col-md-5 heading-section ftco-animate text-center">
                  <h2 class="mb-4">Our Causes</h2>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 ftco-animate">
                  <div class="carousel-cause owl-carousel">
                      <div class="item">
                          <div class="cause-entry">
                              <a href="#" class="img" style="background-image: url(images/bg_1.jpg);"></a>
                              <div class="text p-3 p-md-4">
                                  <h3><a href="#">About Orphans</a></h3>
                                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                  <div class="progress custom-progress-success">
                                      <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="item">
                          <div class="cause-entry">
                              <a href="#" class="img" style="background-image: url(images/bg_2.jpg);"></a>
                              <div class="text p-3 p-md-4">
                                  <h3><a href="#">Challenges Faced by Orphans</a></h3>
                                  <p>
                                      Orphans are children who have lost one or both parents due to various circumstances such as illness, natural disasters
                                  </p>
                                  <div class="progress custom-progress-success">
                                      <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="item">
                          <div class="cause-entry">
                              <a href="#" class="img" style="background-image: url(images/event-5.jpg);"></a>
                              <div class="text p-3 p-md-4">
                                  <h3><a href="#">Supporting Orphaned Children</a></h3>
                                  <p>
                                      Organizations and communities worldwide work tirelessly to support orphaned children and provide them with essential needs
                                  <div class="progress custom-progress-success">
                                      <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="item">
                          <div class="cause-entry">
                              <a href="#" class="img" style="background-image: url(images/image_1.jpg);"></a>
                              <div class="text p-3 p-md-4">
                                  <h3><a href="#">Get Involved with Orphan Care</a></h3>
                                  <p>
                                      If you are interested in making a difference and contributing to the well-being of orphaned children
                                  </p>
                                  <div class="progress custom-progress-success">
                                      <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="item">
                          <div class="cause-entry">
                              <a href="#" class="img" style="background-image: url(images/bg_5.jpg);"></a>
                              <div class="text p-3 p-md-4">
                                  <h3><a href="#">Building a Brighter Future</a></h3>
                                  <p>
                                      Together, we can create a brighter future for orphaned children and ensure they receive the love, care, and opportunities they deserve.
                                  </p>
                                  <div class="progress custom-progress-success">
                                      <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  
  

   
   
  <section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Our Latest Events</h2>
            </div>
        </div>
        <div class="row">
            @php
            // Fetch the last three events from the Event model
            $lastThreeEvents = \App\Models\Event::orderBy('id', 'desc')->take(3)->get();
            @endphp
  
            @foreach($lastThreeEvents as $event)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="{{ route('events') }}" class="block-20" style="background-image: url('{{ asset('images/' . $event->image_event) }}');">
                    </a>
                    <div class="text p-4 d-block">
                        <div class="meta mb-3">
                            <div><a href="{{ route('events') }}">{{ $event->Date_event }}</a></div>
                            <div><a href="{{ route('events') }}">{{ $event->name_orphange }}</a></div>
                        </div>
                        <h3 class="heading mb-4"><a href="#">{{ $event->name_event }}</a></h3>
                        <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> {{ $event->Time_event }}-{{ $event->Time_event1 }}</span> <span><i class="icon-map-o"></i> {{ $event->address_event }}</span></p>
                        <p>{{ $event->description_event }}</p>
                        <p><a href="{{ route('events') }}" class="btn btn-primary">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

		
		<section class="ftco-section-3 img" style="background-image: url(images/bg_3.jpg);">
    	<div class="overlay"></div>
    	<div class="container">
    		<div class="row d-md-flex">
    		<div class="col-md-6 d-flex ftco-animate">
    			<div class="img img-2 align-self-stretch" style="background-image: url(images/bg_4.jpg);"></div>
    		</div>
       
    		<div class="col-md-6 volunteer pl-md-5 ftco-animate">
    			<h3 class="mb-3">Be a volunteer</h3>
          @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
          @endif
          <form action="{{ route('requestvol.store') }}" method="POST" id="volu" class="volunter-form">
            @csrf
            <div class="form-group">
                <input type="text" name="name_user" class="form-control @error('name_user') is-invalid @enderror" placeholder="Your Name" value="{{ old('name_user') }}">
                @error('name_user')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your Email" value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <textarea name="message" cols="30" rows="3" class="form-control @error('message') is-invalid @enderror" placeholder="Message">{{ old('message') }}</textarea>
                @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-white py-3 px-5">
            </div>
        </form>
        
        
    		</div>    			
    		</div>
    	</div>
    </section>

   
    
  

 
  @endsection
  </body>
</html>

