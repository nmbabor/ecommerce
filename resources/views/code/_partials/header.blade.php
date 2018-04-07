<?if(\Session::has('commonData')){
        $commonData=\Session::get('commonData');
    
    }
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!---Title-->
        <title>Home - BkBites</title>
        <!--Google Fonts-->
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,800,700' rel='stylesheet' type='text/css'>
        <!--Favicon-->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/img/favicon.png')}}">
        <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!--Main Style CSS-->
        <link href="{{asset('public/frontend/style.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/css/custom.css')}}" rel="stylesheet">
        <!--Modernizr js-->
        <script src="{{asset('public/frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="home-three">
        <!--Header Top Area Start-->
        <header>
            <div class="header-main-area">
                <div class="container">
                    <div class="header_top">
                        <div class="col-sm-4 no-padding">
                        <div class="logo">
                                <a href='{{URL::to('')}}'><img src="{{asset('public/img/logo.png')}}" alt="BkBites"></a>
                            </div>
                            
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="contact-info-header">
                                <div class="contact-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="contact-text">
                                    <p>+718 576 6464</p>
                                    <span>Fill free to contact with us</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 no-padding">
                            <div class="register">
                                <ul>
                                    <!-- Authentication Links -->
                                    @if (Auth::guest())
                                        <li><a href="{{ url('/user-login') }}"><i class="fa fa-share-square-o"></i> Login</a></li>
                                        <li><a href="{{ url('/register') }}"><i class="fa fa-lock"></i> Register</a></li>
                                    @else
                                        <li class="dropdown home_logout">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <ul class="dropdown-menu" role="menu">
                                                
                                                    <a href="{{ url('/logout') }}"
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>

                                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                            
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                                <ul class="header-main-right"> 
                                    <li><a href="{{URL::to('cart')}}" class="cart"><i class="fa fa-shopping-cart"></i><? echo((Cart::count()>0) ? '<span>'.Cart::count().'</span>' : ''); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="search-form">
                                <form id="search-form" action="#">
                                    <input type="search" placeholder="Search here..." name="s" />
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--End of Header Top Area-->
        <!--Main Menu Area Start-->
        <div class="mainmenu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="menu-area">
                            <div class="mainmenu">
                                <nav>
                                    <ul id="nav">
                                        <li class="current"><a href='{{URL::to('')}}'>HOME</a></li>
                                        <li><a href="{{URL::to('about')}}">ABOUT</a></li>
                                        <li><a href="#">BLOG</a></li>
                                        <li><a href="{{URL::to('contact')}}">CONTACT</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="{{URL::to('about')}}">About</a>
                                        <li><a href="#">blog</a></li>
                                        <li><a href="{{URL::to('contact')}}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>                  
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area end -->   
        </div>
        <!--End of Main Menu Area-->