@extends('layouts.master')

@section('content')


<div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Add Product</li>
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
                                
                                <li>
                                    <a href="/profile/myaccount"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li class="active">
                                    <a href="#""><i class="fa fa-list"></i>Add Product</a>

                                </li>
                                <li>
                                    <a href="/profile/myproduct"><i class="fa fa-list"></i>My Products</a>
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
                        

                {{-- ADD Product Form --}}
                
                <div class="col-md-9" id="customer-orders">
                <div class="col-md-9">
                    <div class="box">
                        <h1>Add Product</h1>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p class="lead">All fields are required</p>
                        <form enctype="multipart/form-data" action="/product/addproduct" method="POST">
                        {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('name') ? 'has-error':''}}">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group {{ $errors->has('description') ? 'has-error':''}}">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="form-group {{ $errors->has('category') ? 'has-error':''}}">
                                <label for="category">Category</label>
                                <select type="category" class="form-control" id="category" name="category">
                                    <option value="">Select an option</option>
                                    <option value="fruit">Fruit</option>
                                    <option value="vegetable">Vegetable</option>
                                    <option value="cereal">Cereal</option>
                                    <option value="tools">Tools</option>
                                    <option value="animal">Animal</option>
                                </select>
                            </div>
                            <div class="form-group {{ $errors->has('price') ? 'has-error':''}}">
                                <label for="price">Price</label>
                                <input type="price" class="form-control" id="price" name="price">
                            </div>
                            <div class="form-group {{ $errors->has('stock') ? 'has-error':''}}">
                                <label for="stock">Stock</label>
                                <input type="stock" class="form-control" id="stock" name="stock">
                            </div>
                            <div class="form-group {{ $errors->has('unit') ? 'has-error':''}}">
                                <label for="unit">Unit</label>
                                <input type="unit" class="form-control" id="unit" name="unit">
                            </div>
                            <div class="form-group">
                                <label for="image-upload"><b>Profile Image</b></label>
                                <input class="form-control" type="file" name="featured" />
                            </div>
                            <div class="form-group">
                                <label for="image-upload">Image 1</label>
                                <input class="form-control" type="file" name="image1" />
                            </div>
                            <div class="form-group">
                                <label for="image-upload">Image 2</label>
                                <input class="form-control" type="file" name="image2" />
                            </div>
                            <div class="form-group">
                                <label for="image-upload">Image 3</label>
                                <input class="form-control" type="file" name="image3" />
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>    
                </div>
            </div>
        </div>
    </div>
@endsection
   