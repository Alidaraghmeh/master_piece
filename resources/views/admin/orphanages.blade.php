@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>All Orphanages</h4>
                    <a href="{{ route('admin.orphanages.create') }}" class="btn btn-warning">Create Orphanage</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Phone</th>
                                <th>Location</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orphanages as $orphanage)
                            <tr>
                                <td>{{ $orphanage->name }}</td>
                                <td>
                                    <img src="{{ asset('images/'.$orphanage->image) }}" alt="Orphanage Image" style="max-height: 100px;">
                                </td>
                                <td>{{ $orphanage->phone }}</td>
                                <td>{{ $orphanage->location }}</td>
                                <td>
                                    <a href="{{ route('admin.orphanages.edit', $orphanage) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('admin.orphanages.destroy', $orphanage) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this orphanage?')">Delete</button>
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
