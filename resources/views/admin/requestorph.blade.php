@extends('admin.layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">All Requests</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($requestOrphs as $requestOrph)
                                <div class="col-md-4 mb-4">
                                    <div class="card border-primary shadow">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $requestOrph->name_orphan }}</h5>
                                            <p class="card-text">{{ $requestOrph->name_orphanage }}</p>
                                            <p class="card-text">{{ $requestOrph->name_user }}</p>
                                            <p class="card-text">{{ $requestOrph->id_orphanage }}</p>
                                            <hr>
                                            <p class="card-text"><strong>Full Name:</strong> {{ $requestOrph->full_name }}</p>
                                            <p class="card-text"><strong>Email:</strong> {{ $requestOrph->email }}</p>
                                            <p class="card-text"><strong>Phone:</strong> {{ $requestOrph->phone }}</p>
                                            <p class="card-text"><strong>Financial Status:</strong> {{ $requestOrph->financial }}</p>
                                            <p class="card-text"><strong>Amount:</strong> {{ $requestOrph->amount }}</p>
                                            <p class="card-text"><strong>Address:</strong> {{ $requestOrph->address }}</p>
                                            <p class="card-text"><strong>Card Number:</strong> {{ $requestOrph->card_number }}</p>
                                            <p class="card-text"><strong>Card Name:</strong> {{ $requestOrph->card_name }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
