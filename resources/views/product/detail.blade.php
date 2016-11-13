@extends('layouts.master')
@section('title','Product Detail')
@section('content')



        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="/uploads/product/{{ $products->featured }}" alt="" class="img-responsive">
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center">{{ $products->name }}</h1>
                                <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details</a>
                                </p>
                                <p class="price">Rs.{{ $products->price }}</p>

                                <p class="text-center buttons">
                                    <a href="/add-to-cart/{{ $products->id }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a> 
                                </p>

                                <p class="text-center buttons">
                                    <a href="/report/{{ $products->id }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Report</a> 
                                </p>


                            </div>

                            <div class="row" id="thumbs">
                                <div class="col-xs-4">
                                    <a href="/uploads/product/{{ $products->image1 }}" class="thumb">
                                        <img src="/uploads/product/{{ $products->image1 }}" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="/uploads/product/{{ $products->image2 }}" class="thumb">
                                        <img src="/uploads/product/{{ $products->image2 }}" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="/uploads/product/{{ $products->image2 }}" class="thumb">
                                        <img src="/uploads/product/{{ $products->image2 }}" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="box" id="details">
                        <div class="row" >
                        <div class="col-md-6 col-md-offset-5">
                            <h4>Product details</h4>
                            <p>{{ $products->description }}</p> 
                            <p>{{ $products->stock }} units of item left </p>                          
                            <hr>
                                                       
                           {{--  <a href="/product/review/{{$products->id}}" type="button" class="btn btn-primary"><i class="fa fa-user-md"></i>View Comment
                            </a> --}}
                        </div>
                        </div>
                        <hr>
                      
                
                
                            
                           
                </div>

                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>

@endsection