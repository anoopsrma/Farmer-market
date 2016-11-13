@extends('layouts.master')
@section('content')
<div class="row">


<div class="col-md-3 col-md-offset-2">
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
                                <li >
                                    <a href="/profile/addproduct""><i class="fa fa-list"></i>Add Product</a>

                                </li>
                                <li>
                                    <a href="/profile/myproduct"><i class="fa fa-list"></i>My Products</a>
                                </li>
                                <li class="active">
                                    <a href="#"><i class="fa fa-money"></i>Transaction</a>
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


	<div class="col-md-5 ">
		<h4>MY Orders</h4>
		@foreach($orders as $order)
		<div class="panel panel-default">
			<div class="panel-body">
				<ul class="list-group">
				@foreach($order->cart->items as $item)
					<li class="list-group-item">
						<span class="badge">{{ $item['price'] }}</span>
						{{ $item['item']['name'] }} |
						{{ $item['qty'] }} Units
					</li>
				@endforeach
				</ul>
			</div>
			<div class"panel-footer">
				<strong>Total Price {{ $order->cart->totalPrice }}</strong>
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection