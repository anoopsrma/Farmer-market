@extends('layouts.master')
@section('content')
<div class="container">
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
                                        <a href="/delete/{{ $product->id }}" class="btn btn-primary">Delete</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        @endforeach
                    </div>
                    </div>
              

@endsection