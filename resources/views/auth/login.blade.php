@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
<div id="content">
        <div class="col-md-8 col-md-offset-2">
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        </div>

		@if(count($errors)>0)
			<div class="row errordiv">
				<div class="col-md-6 col-md-offset-5">
					<ul>
						@foreach($errors->all() as $error)
						<li><font color="red">{{ $error }}</font></li>
						@endforeach			
					</ul>
				</div>
			</div>
		@endif
            <div class="container">
                <div class="col-md-6">
                    <div class="box">
                        <h1>Register</h1>

                        <p class="lead">Not our registered user yet?</p>
                        <form role="form" method="post" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('name') ? 'has-error':''}}">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error':''}}">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error':''}}">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error':''}}">
                                <label for="password">Confirm Password</label>
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>Login</h1>
                        <p class="lead">Already our user?</p>
                        <hr>

                        <form action="{{ url('/login') }}" method="post" role="form">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

@endsection