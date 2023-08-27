<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Admin Dasboard</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets2/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications -->
    <link href="{{ asset('assets2/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS -->
    <link href="{{ asset('assets2/css/paper-dashboard.css') }}" rel="stylesheet"/>


    <!-- CSS for Demo Purpose, don't include it in your project -->
    <link href="{{ asset('assets2/css/demo.css') }}" rel="stylesheet" />


    <!-- Fonts and icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets2/css/themify-icons.css') }}" rel="stylesheet">

</head>

<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    WWD
                </a>
            </div>
            <ul class="nav">
                <li class="{{ request()->routeIs('admin') ? 'active' : '' }}">
                    <a href="{{ route('admin') }}">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}">
                        <i class="ti-user"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.donates.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.donates.index') }}">
                        <i class="ti-gift"></i>
                        <p>Donates</p>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.events.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.events.index') }}">
                        <i class="ti-calendar"></i>
                        <p>Events</p>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.orphanages.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.orphanages.index') }}">
                        <i class="ti-home"></i>
                        <p>Orphanages</p>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.orphans.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.orphans.index') }}">
                        <i class="ti-user"></i>
                        <p>Orphans</p>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.products.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.products.index') }}">
                        <i class="ti-package"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.sales.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.sales.index') }}">
                        <i class="ti-shopping-cart-full"></i>
                        <p>Sales</p>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.requestorph.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.requestorph.index') }}">
                        <i class="fa fa-users"></i>
                        <p>Orphan Request</p>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.volunteer.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.volunteer.index') }}">
                        <i class="fa fa-handshake-o"></i>
                        <p>Volunteer Request</p>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.contacts.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.contacts.index') }}">
                        <i class="fa fa-envelope"></i>
                        <p>Contact</p>
                    </a>
                </li>

            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                     
						<li>
                            <a href="{{ route('logout') }}">
                                <i class="ti-power-off"></i>
								<p>Logout</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        