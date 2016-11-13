@extends('layouts.master')

@section('content')


 <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>{{ Auth::user()->name }}</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***-->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="#"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li>
                                    <a href="/profile/addproduct"><i class="fa fa-list"></i>Add Product</a>
                                </li>
                                <li>
                                    <a href="/profile/myproduct"><i class="fa fa-list"></i>MY products</a>
                                </li>
                                <li>
                                    <a href="/profile/myorders"><i class="fa fa-money"></i>Transaction</a>
                                </li>
                                
                                <li>
                                    <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i>Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->
                    </div>
                    <!-- *** CUSTOMER MENU END *** -->

                    {{-- Profile and Edit form --}}
                

                <div class="col-md-9" id="customer-orders">
                <div class="col-md-9">
                    <div class="box" style="height: 250px;">
                        <h3>{{ Auth::user()->name }}'s Profile</h3>
                        <img src="/uploads/avatars/{{ $user->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                        <form enctype="multipart/form-data" action="/profile" method="POST">
                            <label>Update Profile Image</label>
                            <input type="file" name="avatar">
                            {{ csrf_field() }}
                            <input type="submit" class="pull-right btn btn-sm btn-primary">
                        </form>
                    </div>
                    <hr>
                    <div>
                        @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="box">
                        <h3>Edit Account information</h3>
                        <form role="form" method="post" action="{{ url('/editaccount') }}">
                        {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('name') ? 'has-error':''}}">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error':''}}">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{Auth::user()->email}}">
                            </div>
                            <div class="form-group {{ $errors->has('city') ? 'has-error':''}}">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{Auth::user()->city}}">
                            </div>
                            <div class="form-group {{ $errors->has('district') ? 'has-error':''}}">
                                <label for="district">District</label>
                                <input type="text" class="form-control" id="district" name="district" value="{{Auth::user()->district}}">
                            </div>
                            <div class="form-group {{ $errors->has('phone') ? 'has-error':''}}">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{Auth::user()->phone}}">
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Update</button>
                            </div>
                        </form>
                    </div>          
                    </div>    
                </div>
            </div>
        </div>
    </div>
@endsection