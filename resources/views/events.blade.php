@extends('layouts.layout')

@section('content')
    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>

        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Event</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Events</h1>
                </div>

            </div>

        </div>

    </div>
    @if(session('success'))
        <div class="alert alert-warning">
            {{ session('success') }}
        </div>
    @endif

    @if(session('info'))
        <div class="alert alert-warning">
            {{ session('info') }}
        </div>
    @endif


    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach($events as $event)
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch" style="height: 100%;">
                            <a href="blog-single.html" class="block-20" style="background-image: url('{{ asset('images/' . $event->image_event) }}');"></a>
                            <div class="text p-4 d-block" style="height: 100%;">
                                <div class="meta mb-3">
                                    <div><a href="#">{{ $event->Date_event }}</a></div>
                                    <div><a href="#">{{ $event->name_orphange }}</a></div>
                                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span></a></div>
                                </div>
                                <h3 class="heading mb-4"><a href="#">{{ $event->name_event }}</a></h3>
                                <p class="time-loc">
                                    <span class="mr-2"><i class="icon-clock-o"></i> {{ $event->Time_event }}-{{ $event->Time_event1 }}</span>
                                    <span><i class="icon-map-o"></i> {{ $event->address_event }}</span>
                                </p>
                                <p>{{ $event->description_event }}</p>
                                <p><a href="#" class="btn btn-light" onclick="confirmJoinEvent('{{ route('join-event', ['event' => $event->id]) }}')">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <!-- Modal for Confirming Event Join -->
    <div class="modal fade" id="confirmJoinModal" tabindex="-1" role="dialog" aria-labelledby="confirmJoinModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmJoinModalLabel">Join Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to join the event?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <a href="#" id="joinEventBtn" class="btn btn-primary">Yes</a>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function confirmJoinEvent(joinUrl) {
        // Set the 'href' attribute of the "Yes" button in the modal
        document.getElementById('joinEventBtn').setAttribute('href', joinUrl);
        // Show the Bootstrap modal
        $('#confirmJoinModal').modal('show');
    }
</script>
