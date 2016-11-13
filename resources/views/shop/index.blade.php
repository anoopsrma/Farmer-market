@extends('layouts.master')
@section('content')


        <div id="content">
        <div class="col-md-8 col-md-offset-2">
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        </div>
            <div class="container">

                <div class="col-md-12">

                    <div class="box info-bar">
                        <div class="row">
                        

                            <div class="col-sm-12 col-md-8  products-number-sort">
                                <div class="row">
                                        
                                        <div class="col-md-6 col-sm-6">
                                            <h3>Latest Items</h3>
                                            </div>
                                            <div class=" products-sort-by">
                                                <form action="{{ route('sort-by') }}" method="POST" >
                                                {{ csrf_field() }}
                                                <label for="sortby"> Sort by</label>
                                                <select type="category" name="sortby" class="form-group" >
                                                    <option value="price">Price</option>
                                                    <option value="name">Name</option>
                                                    <option value="category">Category</option>
                                                    <option value="sold">Most Sold</option>
                                                </select>
                                                <button type="submit" class="btn btn-default">Submit</button>
                                                </form>
                                            </div>
                                            
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                         <div class="aa-properties-content-head">
                                        <div class="aa-properties-content-head-left">
                                            {!! Form::open([ 'route' => 'shop.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left', 'role' => 'search' ]) !!}

                                            <div class="input-group">
                                                {!! Form::text('term', Request::get('term'), ['class' => 'form-control', 'placeholder' => 'Search..', 'id' => 'term' ]) !!}

                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="submit">
                                                        <i class="glyphicon glyphicon-search"></i>
                                                    </button>
                                                 </span>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="aa-properties-content-head-right">

                                            <a id="aa-grid-properties" href="#"><span class="fa fa-th"></span></a>
                                            <a id="aa-list-properties" href="#"><span class="fa fa-list"></span></a>
                                        </div>
                                    </div>
                    </div>
                    

                    <div class="row products">
                    @foreach( $products as $product)
                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="/detail/{{ $product->id }}">
                                                <img src="/uploads/product/{{ $product->featured }}" alt="featured image" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="/detail/{{ $product->id }}">
                                                <img src="/uploads/product/{{ $product->featured }}" alt="featured image" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="/detail/{{ $product->id }}" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="/detail/{{ $product->id }}">{{ $product->name}}</a></h3>
                                    <p class="price">Rs. {{ $product->price}} per {{ $product->unit}}</p>
                                    <p class="buttons">
                                        <a href="/add-to-cart/{{ $product->id }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        @endforeach
                        </div>
                        
                        <div class="col-md-offset-6 box">
                            <h3>Best Selling Items</h3>
                        </div>
                    <!-- /.products -->
                </div>
                <!-- /.col-md-9 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
                    
@endsection