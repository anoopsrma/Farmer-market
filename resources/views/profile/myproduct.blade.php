@extends('layouts.master')
@section('content')

<div id="all">

        <div id="content">
            <div class="container">
                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU *** -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li >
                                    <a href="/profile/myaccount"><i class="fa fa-list"></i>My Account</a>
                                </li>
                                <li>
                                    <a href="/profile/addproduct"><i class="fa fa-heart"></i>Add Product</a>
                                </li>
                                <li class="active">
                                    <a href=""><i class="fa fa-user"></i> My products</a>
                                </li>
                                <li>
                                    <a href="/profile/myorders"><i class="fa fa-sign-out"></i> Transaction</a>
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

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="wishlist">

                    <div class="row products">
                        @foreach( $products as $product)
                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="/uploads/product/{{ $product->featured }}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="/uploads/product/{{ $product->featured }}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="/uploads/product/{{ $product->featured }}" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.html">{{ $product->name }}</a></h3>
                                    <p class="price">Rs {{ $product->price }}</p>
                                    <p class="price">{{ $product->stock }} items left</p>
                                    <p class="buttons">
                                        <a href="/detail1/{{ $product->id }}" class="btn btn-primary">Edit</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
</div>

@endsection