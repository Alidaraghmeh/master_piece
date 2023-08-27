@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Orphan</div>

                <div class="card-body">
                    <form action="{{ route('admin.orphans.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Orphan Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="id_orphange">Orphanage ID</label>
                            <input type="number" name="id_orphange" id="id_orphange" class="form-control @error('id_orphange') is-invalid @enderror" value="{{ old('id_orphange') }}" >
                            @error('id_orphange')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create Orphan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
