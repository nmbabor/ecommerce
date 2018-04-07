sidebar start-->
<? $url= Request::path();?>
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">

                <li>
                    <a class="visit_site" target="_blank" href="{{URL::to('/')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>visit site</span>
                    </a>
                </li>
                @if(ACL::has('dashboard') || Auth::user()->email == "admin@codeplanners.com")
                <li>
                    <a class="<? echo($url=='dashboard')?'active' : '' ?>"  href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                @endif

                @if(ACL::has('administration') || Auth::user()->email == "admin@codeplanners.com")
                <li class="sub-menu">
                    <a class="" href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>Administration</span>
                    </a>
                    <ul class="sub">
                        <li class=""><a href="{{URL::to('/role')}}">Role</a></li>
                        <li class=""><a href="{{URL::to('/permission')}}">Permission</a></li>
                        <li class=""><a href="{{URL::to('/roleWisePermission ')}}">Role Wise Permission</a></li>
                        <li class=""><a href="{{URL::to('/addNewUser')}}">Add New User</a></li>
                        <li class=""><a href="{{URL::to('viewUsers')}}">View Users</a></li>
                    </ul>
                </li>
                @endif
                <li class="sub-menu">
                    <a class="" href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>Custom Order</span>
                    </a>
                    <ul class="sub">
                        <li class=""><a href="{{URL::to('/addCustomOrder')}}">Add Custom Order</a></li>
                        <li class=""><a href="{{URL::to('/viewCustomOrders')}}">View Custom Order</a></li>
                        <!-- end custom order -->
                        <li class=""><a href="{{URL::to('/customOrderType')}}">Add Custom Order Type</a></li>
                        <li class=""><a href="{{URL::to('/viewCustomOrderTypes')}}">View Custom Order Type</a></li>
                        <!-- end custom order type -->
                        <li class=""><a href="{{URL::to('/customOrderAttribute ')}}">Add Custom Order Attribute</a></li>
                        <li class=""><a href="{{URL::to('/viewCustomOrderAttributes')}}">View Custom Order Attribute</a></li>
                        <!-- end custom order attribute -->
                        
                    </ul>
                </li>
                @if(ACL::has('item') || Auth::user()->email == "admin@codeplanners.com")
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
                @endif
                @if(ACL::has('slider') || Auth::user()->email == "admin@codeplanners.com")
                <li>
                    <a class="<? echo($url=='slider')?'active' : '' ?>"  href="{{URL::to('/slider')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>Slider</span>
                    </a>
                </li>
                @endif
                <li>
                    <a class="<? echo($url=='categories')?'active' : '' ?>"  href="{{URL::to('/categories')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>Category</span>
                    </a>
                </li>
                <li>
                    <a class="<? echo($url=='subCategory')?'active' : '' ?>"  href="{{URL::to('/subCategory')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>Sub Category</span>
                    </a>
                </li>
               <li>
                    <a class="<? echo(substr($url,0,12)=='aboutCompany')?'active' : '' ?>"  href="{{URL::to('/aboutCompany')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>About Company</span>
                    </a>
                </li>
               <li>
                    <a class="<? echo(substr($url,0,5)=='order')?'active' : '' ?>"  href="{{URL::to('/order')}}">
                        <i class="fa fa-folder-o"></i>
                        <span>Order</span>
                    </a>
                </li>
               
                
            </ul>
            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
