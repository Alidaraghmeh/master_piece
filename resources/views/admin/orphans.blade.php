{{-- resources/views/admin/orphans/index.blade.php --}}
@extends('admin.layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4>All Orphans</h4>
                        <a href="{{ route('admin.orphans.create') }}" class="btn btn-warning">Create orphans</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Orphanage</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orphans as $orphan)
                                <tr>
                                    <td>{{ $orphan->name }}</td>
                                    <td>{{ $orphan->id_orphanage}}</td>
                                    <td>
                                        <a href="{{ route('admin.orphans.edit', $orphan) }}"
                                           class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.orphans.destroy', $orphan) }}" method="POST"
                                              style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this orphan?')">
                                                Delete
                                            </button>
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
