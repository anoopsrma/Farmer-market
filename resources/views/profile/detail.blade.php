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
                                    <a href="/delete/{{ $products->id }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Delete item</a> 
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
                      
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                    <form action="/editproduct/{{ $products->id }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('name') ? 'has-error':''}}">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$products->name}}">
                            </div>
                            
                            <div class="form-group {{ $errors->has('description') ? 'has-error':''}}">
                                <label for="description">description</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{$products->description}}">
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
                                <input type="text" class="form-control" id="price" name="price" value="{{$products->price}}">
                            </div>
                            <div class="form-group {{ $errors->has('stock') ? 'has-error':''}}">
                                <label for="stock">Stock</label>
                                <input type="text" class="form-control" id="stock" name="stock" value="{{$products->stock}}">
                            </div>
                            <div class="form-group {{ $errors->has('unit') ? 'has-error':''}}">
                                <label for="unit">unit</label>
                                <input type="text" class="form-control" id="unit" name="unit" value="{{$products->unit}}">
                            </div>
                            <div class="form-group">
                                <label for="image-upload"><b>Profile Image</b></label>
                                <input class="form-control" type="file" name="featured" >
                            </div>
                            <div class="form-group">
                                <label for="image-upload">Image 1</label>
                                <input class="form-control" type="file" name="image1" >
                            </div>
                            <div class="form-group">
                                <label for="image-upload">Image 2</label>
                                <input class="form-control" type="file" name="image2" >
                            </div>
                            <div class="form-group">
                                <label for="image-upload">Image 3</label>
                                <input class="form-control" type="file" name="image3" >
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Update Product</button>
                            </div>

                                    
                    </form>
                                    
                    </div>
                                
                </div>
                
                            
                           
                </div>

                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>

@endsection