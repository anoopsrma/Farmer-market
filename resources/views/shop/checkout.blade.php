@extends('layouts.master')
@section('title','Checkout')
@section('content')


        <div id="content">
            <div class="container">

                <div class="col-md-9" id="checkout">


                    <div class="box">
                    	<div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}">
                                {{ Session::get('error') }} </div>
                        <form method="post" action="{{ route('checkout') }}" id="checkout-form">
                        	{{ csrf_field() }}
                            <h1>Checkout</h1>
                            
                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="card-name">Card-Holder Name</label>
                                            <input type="text" class="form-control" id="card-name" name="name"required>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="card-number">Card Number</label>
                                            <input type="text" class="form-control" id="card-number" required placeholder="16 digits">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="card-expiry-month">Expire month</label>
                                            <input type="text" class="form-control" id="card-expiry-month" required placeholder="2 digits ">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="card-expiry-year">Expire year</label>
                                            <input type="text" class="form-control" id="card-expiry-year" required >
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="card-cvc">CVC</label>
                                            <input type="text" class="form-control" id="card-cvc" required placeholder="3 digits">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="addr1">Address 1</label>
                                            <input type="text" class="form-control" id="addr1" name="address" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="addr2">Adress 2 (optional)</label>
                                            <input type="text" class="form-control" id="addr2">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="district">District</label>
                                            <input type="text" class="form-control" id="district" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Telephone</label>
                                            <input type="phone" class="form-control" id="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" required>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.row -->
                            </div>
                                
                                    <button type="submit" class="btn btn-primary">Continue to Delivery Method<i class="fa fa-chevron-right"></i>
                                    </button>
                               
                        </form>

                        </div>
                    </div>
                    <!-- /.box -->

                <!-- /.col-md-9 -->

                <div class="col-md-3">

                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>Rs.{{ $total }}</th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>$10.00</th>
                                    </tr>
                                    
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>Rs.{{ $total }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>

@endsection