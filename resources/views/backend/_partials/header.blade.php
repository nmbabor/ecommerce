<?
$pendingOrder=App\Model\Order::leftJoin('users','orders.fk_user_id','users.id')->orderBy('orders.id','desc')
            ->select('orders.id','orders.invoice_id','email','name')
            ->where('orders.status',1)->get();
$info=DB::table('about_company')->first();
?>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="{{URL::to('dashboard')}}" class="logo">
        <img src="{{asset($info->logo)}}" alt="">
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <li id="header_notification_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">

                    <i class="fa fa-bell-o"></i>
                    @if(count($pendingOrder)>0)
                    <span class="badge bg-warning">{{count($pendingOrder)}}</span>
                    @endif
                </a>
                <ul class="dropdown-menu extended notification">
                    <li>
                        <p>Notifications</p>
                    </li>
                @foreach($pendingOrder as $pendingData)
                    <li>
                        <div class="alert alert-info clearfix">
                            <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                            <div class="noti-info">
                                <a href='{{asset("order/$pendingData->id")}}'>{{$pendingData->name}} ({{$pendingData->invoice_id}})</a>
                            </div>
                        </div>
                    </li>
                @endforeach
                </ul>
            </li>
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    
    <ul class="nav pull-right top-menu">
        <!-- <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li> -->
        <!-- user login dropdown start-->
       
        <!-- user login dropdown end -->
        <!-- <li>
            <div class="toggle-right-box">
                <div class="fa fa-bars"></div>
            </div>
        </li> -->
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->