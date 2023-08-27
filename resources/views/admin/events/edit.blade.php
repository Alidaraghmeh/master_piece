@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Event</div>

                <div class="card-body">
                    <form action="{{ route('admin.events.update', $event) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name_event">Name</label>
                            <input type="text" name="name_event" id="name_event" class="form-control @error('name_event') is-invalid @enderror" value="{{ old('name_event', $event->name_event) }}" required>
                            @error('name_event')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="date_event">Date</label>
                            <input type="date" name="date_event" id="date_event" class="form-control @error('date_event') is-invalid @enderror" value="{{ old('date_event', $event->date_event) }}" required>
                            @error('date_event')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="time_event">Start Time</label>
                            <input type="time" name="time_event" id="time_event" class="form-control @error('time_event') is-invalid @enderror" value="{{ old('time_event', $event->time_event) }}" required>
                            @error('time_event')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="time_event1">End Time</label>
                            <input type="time" name="time_event1" id="time_event1" class="form-control @error('time_event1') is-invalid @enderror" value="{{ old('time_event1', $event->time_event1) }}" required>
                            @error('time_event1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address_event">Address</label>
                            <input type="text" name="address_event" id="address_event" class="form-control @error('address_event') is-invalid @enderror" value="{{ old('address_event', $event->address_event) }}" required>
                            @error('address_event')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description_event">Description</label>
                            <textarea name="description_event" id="description_event" class="form-control @error('description_event') is-invalid @enderror" rows="4" required>{{ old('description_event', $event->description_event) }}</textarea>
                            @error('description_event')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name_orphanage">Orphanage Name</label>
                            <input type="text" name="name_orphanage" id="name_orphanage" class="form-control @error('name_orphanage') is-invalid @enderror" value="{{ old('name_orphanage', $event->name_orphanage) }}" required>
                            @error('name_orphanage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
