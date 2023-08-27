@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>All Events</h4>
                    <a href="{{ route('admin.events.create') }}" class="btn btn-warning">Create Event</a>

                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Address</th>
                                <th>Description</th>
                                <th>Orphanage Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                            <tr>
                                <td>{{ $event->name_event }}</td>
                                <td>{{ $event->image_event }}</td>
                                <td>{{ $event->date_event }}</td>
                                <td>{{ $event->time_event }}</td>
                                <td>{{ $event->time_event1 }}</td>
                                <td>{{ $event->address_event }}</td>
                                <td>{{ $event->description_event }}</td>
                                <td>{{ $event->name_orphanage }}</td>
                                <td>
                                    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" style="display:flex;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
