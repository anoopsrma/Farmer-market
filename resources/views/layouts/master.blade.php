<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
    </title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
    <link href="/css/font-awesome.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/test.css" rel="stylesheet">
    <link href="/css/animate.min.css" rel="stylesheet">
    <link href="/css/owl.carousel.css" rel="stylesheet">
    <link href="/css/owl.theme.css" rel="stylesheet">
    <link href="/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    <script src="/js/respond.min.js"></script>
    <link rel="shortcut icon" href="favicon.png">

</head>

<body>

    <!-- *** NAVBAR ***-->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="/" data-animate-hover="bounce">
                    <img src="/img/log.png" alt="Obaju logo" class="hidden-xs">
                    <img src="/img/log-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li ><a href="/">Home</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="/buy">Buy</a>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="/profile/addproduct">Sell</a>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="#" >Blog</a>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="/information">Information</a>
                    </li>
                </ul>
            </div>

            <div class="navbar-collapse collapse" id="navigation" style="float: right;">
                    <ul class="nav navbar-nav">
                    
                    @if (Auth::guest())
                    <li>
                        <a href="{{ url('/login') }}">Login </a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="{{ url('/register') }}">Register</a>
                    </li>
                    
                    @else
                    <li class="dropdown yamn-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-expanded="false"  style="position:relative; padding-left:50px;">
                        <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:20px; left:10px; border-radius:50%">
                            {{ Auth::user()->name }} <b><span class="caret"></span></b>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="/profile/myaccount">Profile</a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                </form>
                            </li>
                            
                        </ul>
                    </li>
                    @endif

                    <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="{{ route('product.shoppingCart') }}" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">Cart 
                    <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty :'' }}</span> </span></a>
                    </div>
                    

                </ul>


            </div>
            <!--/.nav-collapse -->
        </div>
        
    </div>

    <!-- *** NAVBAR END *** -->

    @yield('content')

    <!-- *** FOOTER ***-->

        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Support</h4>
                        <a href="#">Email us</a>
                    </div>
                    
                    <div class="col-md-3 col-sm-6">
                        <h4>Blog</h4>
                        <a href="#">New Articles</a>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <h4>Contact</h4>
                        <a href="contact.html">Phone : 9816640008</a>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <h4>Stay in touch</h4>
                        <p class="social">
                            <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                        </p>
                    </div>
                    </div>
                </div>
            </div>
        <!-- *** FOOTER END *** -->

            <!-- *** COPYRIGHT *** -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2015 Farmer's market.</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">Template by <a href="http://anupsrma.com.np" target="_blank">FunkyCoder</a>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->

    <!-- *** SCRIPTS TO INCLUDE *** -->
    <
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.cookie.js"></script>
    <script src="/js/waypoints.min.js"></script>
    <script src="/js/modernizr.js"></script>
    <script src="/js/bootstrap-hover-dropdown.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/front.js"></script>
    <script type="text/javascript" src="/js/checkout.js'"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
    


</body>

</html>