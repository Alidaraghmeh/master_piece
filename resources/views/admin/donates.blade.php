@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>All Donates</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>NID</th>
                                <th>Name_orphanange</th>
                                <th>email</th>
                                <th>card_name</th>
                                <th>card_number</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donates as $donate)
                            <tr>
                                <td>{{ $donate->name }}</td>
                                <td>{{ $donate->NID }}</td>
                                <td>{{ $donate->email }}</td>
                                <td>{{ $donate->card_name }}</td>
                                <td>{{ $donate->card_number }}</td>
                                <td>{{ $donate->amount }}</td>
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