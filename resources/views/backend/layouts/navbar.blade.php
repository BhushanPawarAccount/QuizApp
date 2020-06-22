<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link type="text/css" href="{{asset('admin/code/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link type="text/css" href="{{asset('admin/code/bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
        <link type="text/css" href="{{asset('admin/code/css/theme.css')}}" rel="stylesheet">
        <link type="text/css" href="{{asset('admin/code/images/icons/css/font-awesome.css')}}" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="/">{{ config('app.name', 'Laravel') }} </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        
                        <ul class="nav pull-right">
                           
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{asset('admin/code/images/user.png')}}" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                                  onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                  <i class="menu-icon icon-signout"></i> {{ __('Logout') }}
                                               </a>
           
                                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                   @csrf
                                               </form>
                                   </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->