@extends('admin.layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4>All Sales</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name Product</th>
                                    <th>Buyer Name</th>
                                    <th>Buyer Phone</th>
                                    <th>Card Name</th>
                                    <th>Card Number</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $sale)
                                    <tr>
                                        <td>{{ $sale->name_product }}</td>
                                        <td>{{ $sale->buyer_name }}</td>
                                        <td>{{ $sale->buyer_phone }}</td>
                                        <td>{{ $sale->card_name }}</td>
                                        <td>{{ $sale->card_number }}</td>
                                        <td>{{ $sale->Total }}</td>
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
