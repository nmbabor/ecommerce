@extends('frontend.app')
@section('content')

       
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->            
                <div class="col-md-6 col-sm-6 sign-in col-md-offset-3 col-sm-offset-3">
                    <h4 class="">Sign in</h4>
                    <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
                                        {{ csrf_field() }}
                        <div class="form-group  {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                            <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="radio outer-xs">
                            <a href="{{ url('/password/reset') }}" class="forgot-password pull-right">Forgot your Password?</a>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                        </div>
                    </form>                 
                </div>

            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
   </div><!-- /.container -->
</div><!-- /.body-content -->
        
    
@endsection
