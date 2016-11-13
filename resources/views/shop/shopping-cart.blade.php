@extends('layouts.master')
@section('title','Shopping Cart')
@section('content')
@if(Session::has('cart'))
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-9" id="basket">

                    <div class="box">

                        <form method="post" action="checkout1.html">

                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have following items in your cart.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th>Action</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img src="/uploads/product/{{ $product['item']['featured'] }}" alt="enable javascript">
                                                </a>
                                            </td>
                                            <td>{{ $product['item']['name'] }}
                                            </td>
                                            <td>{{ $product['qty'] }}</td>
                                            <td>Rs.{{ $product['item']['price'] }}</td>
                                            <td>
                                            	<a href="/addone/{{$product['item']['id']}}"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                            	<a href="/removeone/{{$product['item']['id']}}"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                            </td>
                                            <td>Rs.{{ $product['price'] }}</td>
                                            <td><a href="/removeall/{{$product['item']['id']}}"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2">Rs.{{ $totalPrice }}</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-right">
                                    
                                    <a href="{{ route('checkout') }}" type="button" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.box -->

                </div>
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
                                        <th>Rs.{{ $totalPrice }}</th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>0.00</th>
                                    </tr>

                                    <tr>
                                        <td>Total</td>
                                        <th style="font-size: 17px;">Rs.{{ $totalPrice }}</th>
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
</div>

<!-- /#content -->
        @elseif(!Session::has('cart'))
        <div class="col-lg-offset-5" style="height:385px;">
            <h3>No items in the cart</h3>
        </div>
        @endif


@endsection