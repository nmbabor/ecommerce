<? $url=\Request::path();

if(\Session::has('commonData')){
        $commonData=\Session::get('commonData');
    
    }

?>
<ul class="l-sidebar">
    <li><a class="left-sidebar-title"><i class="fa fa-navicon"></i>categories </a></li>
    @foreach($commonData['category'] as $cat)
   <? 
   $cat_id=$cat->id;
   $sub_category=\DB::table('sub_category')->where('status',1)->where('fk_category_id',$cat_id)->get();
   $cat_link=str_replace(' ','-', $cat->category_name);
   $cat_link=strtolower($cat_link);
   ?>
    <li><a href='{{URL::to("category/$cat_link")}}' 
    <? echo(sizeof($sub_category)>0) ? "class='show-submenu'><i class='fa fa-plus'></i> ":">"; ?> {{$cat->category_name}}</a>
        <ul class="left-sub-navbar submenu">
        @foreach($sub_category as $sub_cat)
        <? $sub_cat_link=str_replace(' ','-', $sub_cat->sub_category_name);
        $sub_cat_link=strtolower($sub_cat_link);

         ?>
            <li><a href='{{URL::to("category/$cat_link/$sub_cat_link")}}'>{{$sub_cat->sub_category_name}}</a></li>
        @endforeach
        </ul>
    </li>
    @endforeach
</ul>
<div class="recent_item">
    <div class="right-sidebar-title">
        <h2>Recent Item</h2>
    </div>
@foreach($commonData['item'] as $items)
    <? $cat_link=str_replace(' ','-',$items->category_name);
        $item_link= str_replace(' ','-',$items->item_name);
        $cat_link=strtolower($cat_link);
        $item_link=strtolower($item_link);
    ?>
    <div class="single-p-r-sidebar">
        <div class="p-right-image">
            <a href='{{URL::to("category/$cat_link/$items->id/$item_link")}}' class="single-product">
                <img class="primary-img" src='{{asset("public/img/item/$items->photo_path")}}' alt="">
            </a>
        </div>
        <div class="p-right-text">
            <p><a href='{{URL::to("category/$cat_link/$items->id/$item_link")}}'> {{$items->item_name}}</a></p>
            @if($items->sale_price!=null)
            <p><span class="p-price"></span><span class="c-price">${{$items->sale_price}}</span></p>
            @endif
        </div>
    </div>
@endforeach
</div>
