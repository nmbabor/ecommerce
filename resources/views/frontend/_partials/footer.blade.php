<?php 
$info=DB::table('about_company')->first();
 $social_link=DB::table('social_links')->get();
 ?>

<footer id="footer" class="footer color-bg">
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Contact Us</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class="toggle-footer" style="">
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p>{{$info->address}}</p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p>{{$info->mobile_no}}<br>
                    
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body"> <span><a href=""></a></span>{{$info->email}}</div>
              </li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Customer Service</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a href="{{url('login')}}" title="
              <li class="first"><a href="{{url('page/security-policy')}}" title="My Account">Security Policy</a></li>
               <!--<li><a href="{{url('page/shipping-&-replacement')}}" title="About us">Shipping & Replacement</a></li>-->
              <li><a href="{{url('page/privacy-policy')}}" title="Size Guide">Privacy Policy</a></li>
              <li><a href="{{url('page/terms-of-use')}}" title="FAQ">Terms of Use</a></li>
            
                <li class="last"><a title="Why Shop On Aerotex" href="{{url('page/shop-with-us')}}">Why Shop With Us</a></li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Corporation</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a title="About us" href="{{url('about')}}">About us</a></li>
              <li><a title="Returns & Refunds" href="{{url('page/shipping-&-replacement')}}">Returns & Refunds</a></li>
              <li><a title="Visit our Blog" href="{{url('blog')}}">Visit our Blog</a></li>
              <li><a title="Addresses" href="{{url('contact')}}">Contact us</a></li>
            
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Connected With Us</h4>
          </div>
          <!-- /.module-heading -->
          
                <div class="fb-page" data-href="{{$info->fb_link}}" data-height="170" data-small-header="true" data-adapt-container-width="false" data-hide-cover="true" data-show-facepile="true"></div>
          </div>
          <!-- /.module-body --> 
        </div>
      </div>
      <div class="footer_info">
        <div class="row">
          <div class="col-md-12">
            <p class="info_text"><? echo $info->short_description ?></p>
            <div class="">
            <div class="clearfix payment-methods custom_payment text-center">
               <!--  <ul>
                  <li><img src="{{asset('public/frontend/images/payments/1.png')}}" alt=""></li>
                  <li><img src="{{asset('public/frontend/images/payments/2.png')}}" alt=""></li>
                  <li><img src="{{asset('public/frontend/images/payments/3.png')}}" alt=""></li>
                  <li><img src="{{asset('public/frontend/images/payments/4.png')}}" alt=""></li>
                  <li><img src="{{asset('public/frontend/images/payments/5.png')}}" alt=""></li>
                </ul> -->
        </div>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright-bar">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-xs-12">
          <div class="Company_text">
            <p>All Rights Reserved by: <span>{{$info->company_name}}</span></p>
          </div>
        </div>
        <div class="col-md-4 text-center">
         
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="develop_by text-right">
            <p>Powered By:<a href="http://www.smartsoftware.com.bd/">Smart Software Inc</a></p>
            
          </div>
        </div>
      </div>
      
    </div>
  </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= --> 
<input type="hidden" id="rootUrl" value="{{URL::to('/')}}">
<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{ asset('public/frontend/js/jquery-1.11.1.min.js') }}"></script> 
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>

<script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('public/frontend/js/bootstrap-hover-dropdown.min.js') }}"></script> 
<script src="{{ asset('public/frontend/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('public/frontend/js/echo.min.js') }}"></script> 
<script src="{{ asset('public/frontend/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{ asset('public/frontend/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('public/frontend/js/jquery.rateit.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('public/frontend/js/lightbox.min.js') }}"></script> 
<script src="{{ asset('public/frontend/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('public/frontend/js/wow.min.js') }}"></script> 
<script src="{{ asset('public/frontend/mixitup/mixitup.min.js') }}"></script> 
<script src="{{ asset('public/frontend/js/scripts.js') }}"></script>
<script src="{{ asset('public/frontend/jssocials/jssocials.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.0/sweetalert2.all.js"></script>
<script type="text/javascript">
  var path=$('#rootUrl').val();
$(document).on('focus','#searchItem',function(){
  var cat = $('#searchCategory').val();
  $(this).autocomplete({
    source: function( request, response ) {
            $.ajax({
                url: path+'/search-item',
                type: "GET",
                dataType: "json",
                data: { 
                    name: request.term,
                    cat:cat
                    },
                success: function( data ) {
                  //console.log(data);
           response( $.map( data, function( item ) {
            return {
              label: item
            }
          }));
        }
            });

      
    },

    autoFocus: true ,
        minLength: 0,             
  });
});
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11&appId=192960531222079';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

@if(Session::has('success'))
  <script type="text/javascript">
    var text="{{Session::get('success')}}";
    swal(
      'Successfully Done!',
      text,
      'success'
    )
  </script>
@endif

@if(Session::has('error'))
<script type="text/javascript">
    var text="{{Session::get('error')}}";
    swal(
      'Error!',
      text,
      'error'
    )
  </script>
@endif

