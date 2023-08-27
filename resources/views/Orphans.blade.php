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

@if (Session::has('success'))
    <div class="alert alert-warning">
        {{ Session::get('success') }}
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-warning">
        {{ Session::get('error') }}
    </div>
@endif
<section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach($orphans as $orphan)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch" style="height: 100%; width:50%;">
                    <a href="{{ route('request-orph', ['orphan' => $orphan->id, 'orphanageId' => $orphan->id_orphange]) }}" class="block-20" style="background-image: url('{{ asset('images/or.jpg') }}'); background-size: cover;"></a>
                    <div class="text p-4 d-block">
                        <div class="meta mb-3">
                            <div><a href="#">{{ $orphan->name }}</a></div>
                            <p><a href="{{ route('request-orph', ['orphan' => $orphan->id, 'orphanageId' => $orphan->id_orphange]) }}">Sponsor Orphan <i class="ion-ios-arrow-forward"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection





