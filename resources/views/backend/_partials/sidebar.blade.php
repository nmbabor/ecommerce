<!--sidebar start-->
<? $url= Request::path();?>
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start -->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">

                <li>
                    <a class="visit_site" target="_blank" href="{{URL::to('/')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>visit site</span>
                    </a>
                </li>
                <li>
                    <a class="<? echo($url=='dashboard')?'active' : '' ?>"  href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
            @if(Auth::user()->type!=3)
                
                <li class="sub-menu">
                    <a class="<? echo(substr($url,0,6)=='report' | $url=='inventory')?'active' : '' ?>" href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>Report</span>
                    </a>
                    <ul class="sub">
                        <li class="<? echo(substr($url,0,6)=='report')?'active' : '' ?>"><a href="{{URL::to('report')}}">Report</a></li>
                        <li class="<? echo($url=='inventory') ? 'active' : '' ?>"><a href="{{URL::to('inventory')}}">Inventory</a></li>
                        
                    </ul>
                </li>
                <li class="sub-menu">
                    <a class="<? echo(substr($url,0,3)=='sms') ? 'active' : '' ?>" href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>SMS</span>
                    </a>
                    <ul class="sub">
                        <li class="<? echo($url=='sms/create') ? 'active' : '' ?>"><a href="{{URL::to('sms/create')}}">New sms</a></li>
                        <li class="<? echo($url=='sms') ? 'active' : '' ?>"><a href="{{URL::to('sms')}}">Send Item</a></li>
                        <li class="<? echo($url=='sms/order/edit') ? 'active' : '' ?>"><a href="{{URL::to('sms/order/edit')}}">Config</a></li>
                    </ul>
                </li>
            @endif
                <li>
                    <a class="<? echo(substr($url,0,5)=='order')?'active' : '' ?>"  href="{{URL::to('/order')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>New Order</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a class="<? echo($url=='all-order' | $url=='received' | $url=='delivered' | $url=='cancel-order' )?'active' : '' ?>" href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>Order</span>
                    </a>
                    <ul class="sub">
                        <li class="<? echo(substr($url,0,9)=='all-order') ? 'active' : '' ?>"><a href="{{URL::to('all-order')}}">All Order</a></li>

                        <li class="<? echo(substr($url,0,8)=='received')?'active' : '' ?>"><a href="{{URL::to('received')}}">Received</a></li>

                        
                        <li class="<? echo(substr($url,0,9)=='delivered') ? 'active' : '' ?>"><a href="{{URL::to('delivered')}}">Delivered</a></li>
                        
                        <li class="<? echo(substr($url,0,12)=='cancel-order') ? 'active' : '' ?>"><a href="{{URL::to('cancel-order')}}">Cancel</a></li>


                        
                    </ul>
                </li>
                <li class="sub-menu">
                    <a class="" href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>Items</span>
                    </a>
                    <ul class="sub">
                        <li class=""><a href="{{URL::to('/item')}}">Add Item</a></li>
                        <li class=""><a href="{{URL::to('/viewItems')}}">View Items</a></li>
                    </ul>
                </li>
                <li>
                    <a class="<? echo(substr($url,0,5)=='offer')?'active' : '' ?>"  href="{{URL::to('/offer')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>Offer</span>
                    </a>
                </li>
                <li>
                    <a class="<? echo(substr($url,0,10)=='banner-manager')?'active' : '' ?>"  href="{{URL::to('/banner-manager')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>Ad Manager</span>
                    </a>
                </li>
            @if(Auth::user()->type!=3)
                <li>
                    <a class="<? echo(substr($url,0,5)=='pages')?'active' : '' ?>"  href="{{URL::to('/pages')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>Pages</span>
                    </a>
                </li>
                <li>
                    <a class="<? echo(substr($url,0,5)=='post')?'active' : '' ?>"  href="{{URL::to('/post')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>Blog</span>
                    </a>
                </li>
                <li>
                    <a class="<? echo(substr($url,0,5)=='all-news')?'active' : '' ?>"  href="{{URL::to('/all-news')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>News</span>
                    </a>
                </li>
                <li>
                    <a class="<? echo(substr($url,0,9)=='subscribe')?'active' : '' ?>"  href="{{URL::to('/subscribe')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>Subscribe</span>
                    </a>
                </li>
                <!--<li>
                    <a class="<? echo(substr($url,0,4) =='menu')?'active' : '' ?>"  href="{{URL::to('/menu')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>Menu Configuration</span>
                    </a>
                </li>-->
                <li>
                    <a class="<? echo($url=='slider')?'active' : '' ?>"  href="{{URL::to('/slider')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>Slider</span>
                    </a>
                </li>
                <li>
                    <a class="<? echo($url=='categories')?'active' : '' ?>"  href="{{URL::to('/categories')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>Category</span>
                    </a>
                </li>
                <li>
                    <a class="<? echo(substr($url,0,9)=='all-brand')?'active' : '' ?>"  href="{{URL::to('/all-brand')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>Brand</span>
                    </a>
                </li>
                <li>
                    <a class="<? echo(substr($url,0,7)=='reviews')?'active' : '' ?>"  href="{{URL::to('/reviews')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>Reviews</span>
                    </a>
                </li>
               <li class="sub-menu">
                    <a class="<? echo(substr($url,0,5)=='other' | $url=='social-links' | $url=='sales-support') ? 'active' : '' ?>" href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>Site Configuration</span>
                    </a>
                    <ul class="sub">
                        <li class="<? echo($url=='others-info/primary/edit') ? 'active' : '' ?>"><a href="{{URL::to('others-info/primary/edit')}}">Primary Info</a></li>
                        <li class="<? echo($url=='other/about') ? 'active' : '' ?>"><a href="{{URL::to('other/about')}}">About</a></li>
                        <li class="<? echo($url=='social-links') ? 'active' : '' ?>"><a href="{{URL::to('social-links')}}">Social Links</a></li>
                        <li class="<? echo($url=='sales-support') ? 'active' : '' ?>"><a href="{{URL::to('sales-support')}}">Sales Support</a></li>
                    </ul>
                </li>
               
               <li>
                    <a class="<? echo(substr($url,0,5)=='users')?'active' : '' ?>"  href="{{URL::to('/users')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>Admin</span>
                    </a>
                </li>
                <li>
                    <a class="<? echo(substr($url,0,10)=='view-users')?'active' : '' ?>"  href="{{URL::to('/view-users')}}">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
            @endif
                
            </ul>
            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
