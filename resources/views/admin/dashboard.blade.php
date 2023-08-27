@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Card for counting Orphans -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-warning text-center">
                                        <i class="ti-user"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Orphans</p>
                                        {{ \App\Models\Orphan::count() }}
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
                <!-- Card for counting Orphanages -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-success text-center">
                                        <i class="ti-home"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Orphanages</p>
                                        {{ \App\Models\Orphanage::count() }}
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
                <!-- Card for counting Users -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-danger text-center">
                                        <i class="ti-user"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Users</p>
                                        {{ \App\Models\User::count() }}
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <!-- Card for counting Products -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-info text-center">
                                        <i class="ti-package"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Products</p>
                                        {{ \App\Models\Product::count() }}
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Card for counting Sales -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-primary text-center">
                                        <i class="ti-shopping-cart-full"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Sales</p>
                                        {{ \App\Models\Sale::count() }}
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <!-- Card for counting Donates -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-info text-center">
                                        <i class="ti-gift"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Donates</p>
                                        {{ \App\Models\Donate::count() }}
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <!-- Card for counting Events -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-warning text-center">
                                        <i class="ti-calendar"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Events</p>
                                        {{ \App\Models\Event::count() }}
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
