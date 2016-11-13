@extends('layouts.master')
@section('title','Product Detail')
@section('content')
<div class="row">
	<div class="col-lg-6 col-md-offset-3">
    	
    	<form action="/postinfo" method="post">
    	
    	<div class="input-group">
      	<input type="text" class="form-control" name="item" placeholder="Search for...">
      	<span class="input-group-btn">
        	<button class="btn btn-default" type="button">Search Product</button>
      	</span>
    	</div>
    	</form> 
	</div>
</div>

<div class="row">
	<div class="col-md-offset-5">
		<h3>Rice Information</h3>
	</div>
</div>

<div id="list" class="col-md-offset-1">
	<p>
		<iframe src="/uploads/rice.txt"  >
		</iframe>
	</p>
</div>


@endsection