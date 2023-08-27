@extends('layouts.layout')
 

@section('content')
<div class="hero-wrap" style="background-image: url({{ asset('images/bg_7.jpg') }});" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
           <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Orphan</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Oprhancare</h1>
        </div>
      </div>
    </div>
  </div>
  <section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach($orphs as $orphanage)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch" style="height: 100%;">
                    <a href="{{ route('orphans', ['orphanage' => $orphanage->id]) }}" class="block-20">
                        <img src="{{ asset('images/' . $orphanage->image) }}" alt="{{ $orphanage->name }}" class="img-fluid">
                    </a>
                    <div class="text p-4 d-block">
                        <div class="meta mb-3">
                            <div><a href="#">{{ $orphanage->location }}</a></div>
                            <div><a href="#">{{ $orphanage->phone }}</a></div>
                        </div>
                        <h3 class="heading mb-4"><a href="#">{{ $orphanage->name }}</a></h3>
                        <p><a href="{{ route('orphans', ['orphanage' => $orphanage->id]) }}">GO Orphanage <i class="ion-ios-arrow-forward"></i></a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</section>





@endsection