@extends('frontend.app')
@section('content')
<style type="text/css">
    .form-group {
    margin-bottom: 15px;
    width: 100%;
    overflow: hidden;
}
.product-details-area .filter-by {padding-top: 0; }
.p-d-cart{padding: 0;}
</style>
<section class="content">
    <div class="container"> 
        
        <div class="col-md-9 no-padding pull-right">
            <!--Product Details Area Start-->
        <section class="product-details-area">
        <div class="p-carousel-title">
            <? $data = $allData['data']; ?>
            <? $sub_name = $data['sub_category_name']; ?>
            <h2>{{$name}}<? echo isset($sub_name)? " <i class='ion-chevron-right' ></i> <small> $sub_name</small>" : '' ?></h2>
        </div>
            
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <div class="product-s-l">
                            <div class="product-large">
                                <img alt="" src='{{asset("public/img/item/$data->photo_path")}}'>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7">
                    {!! Form::open(array('url' => 'cart','method'=>'POST')) !!}
                    <input type="hidden" value="{{$data->id}}" name="id">
                        <div class="product-right-details">
                            <h2>{{$data->item_name}}</h2>
                            @if($data->sale_price!=null)
                            <p class="p-d-price"><? echo($data->sale_price!=null)? '$'."$data->sale_price" : '' ?></p>
                            @endif

                           <!--  <p class="p-r-price"><span><? //echo($data->regular_price!=null)? '$'."$data->regular_price" : '' ?></span></p> -->
                        </div>
                        <!-- item package -->
                        <div class="artt">
                        @if(count($itemPackage)>0)
                            <div class="form-group col-sm-12 select-option">
                                <label class="col-sm-4">Select Option : </label>
                                <div class="col-sm-8">
                                <select name="package_id" class="form-control" onchange="packagePrice(this.value)" required >
                                    <option value=""> - select - </option>
                                    @foreach($itemPackage as $itemPackageData)
                                    <option value="{{$itemPackageData->id}}" >{{$itemPackageData->package_title}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        @endif
                        </div>
                        <div class="artt col-sm-12">
                            @if(isset($itemAttr))
                            <? $i=0;
                             ?>
                            @foreach($itemAttr['attribute'] as $attribute)
                           <? $option=\DB::table('attribute_option')
                    ->select('id','name')
                    ->where('fk_attribute_id',$attribute->id)->get();?>
                                @if($attribute->attribute_type==1)

                                    <div class="form-group select-option">
                                        <label class="col-sm-4">{{$attribute->name}} </label>
                                        
                                        <div class="col-sm-8">
                                        <select class="form-control" name="attribute_select[]">
                                            <option value="">--select--</option>
                                            @foreach($option as $opt)
                                            <option value="{{$opt->id}}">{{$opt->name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>

                                @else
                                <div class="form-group checkbox">
                                    <h5>{{$attribute->name}}</h5>
                                    
                                    @foreach($option as $opt)
                                    <label><input type="checkbox" name="attribute_checkbox[]" value="{{$opt->id}}"> {{$opt->name}}</label>
                                    @endforeach
                                </div>
                                @endif

                            @endforeach

                            @endif
                        </div>
                        
                        <div class="form-group col-sm-12">
                            
                            <div class="col-sm-12 instructionp">
                            <textarea class="form-control" name="instruction" rows="2" style="width: 100%;" placeholder="Instruction"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="col-sm-12">
                                <div id="packagePrice"> <input id="package_price" type="hidden" name="price" value="{{$data->sale_price}}" > </div>
                            </div>
                        </div>
                        
                        <div class="p-d-info col-sm-12">
                            <div class="filter-by">
                                <h4 class="col-sm-3">Quantity</h4>
                                <div class="select-filter number col-sm-3">
                                    <input type="number" name="quantity" value="1" class="form-control">                         
                                </div>
                                <div class="p-d-cart col-sm-5">
                                    <button type="submit" class="p-d-btn">ADD TO CART</button>
                                </div>
                            
                            </div>
                        
                        
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="row item_description">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="p-details-tab">
                             <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
                                @if($data->additional_info)
                                <li role="presentation"><a href="#additional_info" aria-controls="additional_info" role="tab" data-toggle="tab">Additional Information</a></li>
                                @endif
                              </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="description">
                                    <? echo $data->short_description; ?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="additional_info">
                                    <?php echo $data->additional_info; ?>
                                </div>
                                <!-- <div role="tabpanel" class="tab-pane" id="reviews">
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                     <p>Duis aute irure dolor in reprehenderit. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                </div> -->
                                <!-- -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End of product-details Area-->
        <!--Shop Main Area Start-->
        <section class="shop-main-area details">
            <div class="not_container">
            @if(isset($relatedItem) || isset($relatedItemSubCategory))
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2>RELATED PRODUCTS</h2>
                    </div>
                </div>
                @if(count($relatedItemSubCategory)>0)
                <div class="row">
                @foreach($relatedItemSubCategory as $subItemData)
                    
                    <? $cat_link=$allData['cat_link'];
                        $item_link= str_replace(' ','-',$subItemData->item_name);
                    ?>
                    <div class="col-md-4 col-sm-4 no-padding">
                        <div class="single-product-items">
                            <div class="single-items">
                                <a href='{{URL::to("category/$cat_link/$subItemData->id/$item_link")}}' class="single-product">
                                    <img class="primary-img" src='{{asset("public/img/item/$subItemData->photo_path")}}' alt="">
                                </a>
                            </div>
                            <div class="product-info">
                                <h4><a href='{{URL::to("category/$cat_link/$subItemData->id/$item_link")}}'> {{$subItemData->item_name}} </a></h4>
                                <h4><span class="line"></span><span>${{$subItemData->sale_price}}</span></h4>
                                
                            </div>
                              
                        </div>
                    </div>
                    
                @endforeach
                </div>
                    @else
                <div class="row">
                @foreach($relatedItem as $itemData)
                    
                    <? $cat_link=$allData['cat_link'];
                        $item_link= str_replace(' ','-',$itemData->item_name);
                    ?>
                    <div class="col-md-4 col-sm-4 no-padding">
                        <div class="single-product-items">
                            <div class="single-items">
                                <a href='{{URL::to("category/$cat_link/$itemData->id/$item_link")}}' class="single-product">
                                    <img class="primary-img" src='{{asset("public/img/item/$itemData->photo_path")}}' alt="">
                                </a>
                            </div>
                            <div class="product-info">
                                <h4><a href='{{URL::to("category/$cat_link/$itemData->id/$item_link")}}'> {{$itemData->item_name}} </a></h4>
                                <h4><span class="line"></span><span>${{$itemData->sale_price}}</span></h4>
                                
                            </div>
                              
                        </div>
                    </div>
                    
                @endforeach
                </div>
                @endif
            @endif
            </div>
        </section>
        <!--End of Shop Main Area-->
        </div>
        <div class="col-md-3 left-sidebar">
            @include('frontend._partials.sidebar')
        </div><!-- End side bar -->
    </div>
</section>

<script src="{{ asset('public/backend/js/jquery.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    
    /*category wise tag select*/
        function packagePrice(value){
          $("#packagePrice").load('{{ URL::to("/itemPackagePrice")}}'+'/'+value);
        }
    /*end category*/
    
  </script>
@endsection