<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return redirect('/')->with('success','Successfully Clear Cache facade value.');
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return redirect('/')->with('success','Successfully Reoptimized.');
});

//Clear Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return redirect('/')->with('success','Successfully Clear Route cache.');
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return redirect('/')->with('success','Successfully Clear View cache.');
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return redirect('/')->with('success','Successfully Clear Config cache.');
});
Route::group(['middleware'=>['dbConnect']],function(){

    Route::get('/', 'HomeController@index');
    Route::get('/item-photo', 'HomeController@itemPhoto');
    Route::get('/search-item', 'HomeController@searchItem');
    Route::get('/loadMenu/{id}', 'HomeController@menuLoad');
    Route::get('/search', 'HomeController@search');
    Route::get('item-page', 'ProductController@index');
    Route::get('single-item', 'ProductController@singleItem');
    Route::get('quick-view/{link}','ProductController@quickView');
    Route::get('brand/{name}', 'ProductController@brand');


    Route::get('category/{link}','CategoryProductController@category_product');
    Route::get('category/{cat_link}/{sub_link}','CategoryProductController@sub_category_product');
    Route::get('category/{cat_link}/{sub_link}/{lastLink}','CategoryProductController@subSubCategoryProduct');
    Route::get('todays-offer','CategoryProductController@todaysOffer');

    Route::get('/itemPackagePrice/{value}', 'ProductController@packagePriceType');
    Route::get('about','PrimaryInfoController@index');
    Auth::routes();

    Route::get('/cart', 'ShoppingController@cart');
    Route::post('/cart', 'ShoppingController@cart');


    Route::get('/search/{query}', 'ShoppingController@search');
    Route::get('login', 'HomeController@userLogin');


    Route::get('contact','PrimaryInfoController@contact');
    Route::post('contact','PrimaryInfoController@message');
    Route::get('page/{link}','PageController@pageSingle');
    Route::get('emailCheck','Auth\ResetPasswordController@checkEmail');
    Route::get('team','OurTeamController@index');
    Route::get('blog','WorksController@index');
    Route::get('blog/{link}','WorksController@single');
    Route::get('news','WorksController@news');
    Route::get('news/{link}','WorksController@single');
    Route::post('subscribe-store','SubscribeController@store');


    Route::get('/admin',function(){
        return redirect('/dashboard');
    });

});
Route::group(['middleware'=>['dbConnect','auth']],function(){
    Route::get('/myProfile','UserProfileController@index');
    Route::post('/userProfileUpdate','UserProfileController@changeUserProfile');
    Route::get('/changeUserPassword','UserProfileController@viewPassword');
    Route::post('/userPasswordUpdate','UserProfileController@updatePassword');

    Route::get('/myOrderList','UserProfileController@orderList');
    Route::get('/userSingleOrder','UserProfileController@singleOrder');
    Route::resource('review', 'ReviewController');
    Route::get('/cart-remove-item', 'ShoppingController@cart_remove_item');
    Route::get('/clear-cart', 'ShoppingController@clear_cart');
    Route::get('/checkout','ShoppingController@checkout');
    Route::post('/checkout','ShoppingController@postCheckout');
    Route::get('/checkout-success','ShoppingController@successCheckout');

   Route::get('shippingAddress/{val}','ShoppingController@shippingInfo');
   Route::get('/user-info','OurUserController@userInfo');
   Route::get('wishlist','WishlistController@index');
   Route::get('wishlist-store','WishlistController@store');
   Route::get('wishlist-delete/{id}','WishlistController@delete');
Route::group(['middleware'=>['admin']],function(){
    /*administration section*/
    Route::resource('role','RoleController');
    Route::resource('reviews','TestimonialController');
    Route::resource('subscribe','SubscribeController');
    Route::post('send-email','SubscribeController@send');
    Route::resource('permission','PermissionController');
    Route::resource('roleWisePermission','RoleWisePermissionController');
    Route::get('loadPermission/{value}', 'RoleWisePermissionController@showPermissionData');
    /*user section*/
    Route::resource('addNewUser','UsersController');
    Route::get('viewUsers','UsersController@viewUser');
    Route::get('userUpdate/{id}', 'UsersController@show');
    Route::get('/changeUserPassword/{id}', 'UsersController@viewPassword');
    Route::post('/userPasswordUpdate/{id}', 'UsersController@changeUserPassword');
    /*end*/
    Route::resource('post','WorkController');
    Route::resource('all-news','WorkController');
    Route::resource('our-team','TeamController');
    
    Route::resource('view-users','ViewUsersController');
    Route::post('change-password',['as'=>'password','uses'=>'UsersController@password']);
    Route::resource('categories','CategoryController');
    Route::resource('subCategory','SubCategoryController');
    Route::resource('subSubCategory','SubSubCategoryController');
    Route::resource('attribute','AttributesController');
    Route::resource('sub-attribute','SubAttributesController');
    Route::resource('sub-sub-attribute','SubSubAttributesController');
    Route::resource('attribute-option','AttributeOptionController');
    Route::resource('slider','SliderController');
    Route::resource('others-info','OthersInfoController');
    Route::get('other/about','OthersInfoController@about');
  
    Route::resource('social-links','SocialController');
    Route::resource('sales-support','SalesSupportController');
    
    Route::resource('all-brand','BrandController');
  
    Route::resource('menu','MenuController');
    Route::get('page-menu','MenuController@page');
    Route::resource('sub-menu','SubMenuController');
    Route::get('category-menu','MenuController@categoryMenu');
    Route::post('category-menu','MenuController@postCategoryMenu');
    Route::get('sub-category-menu','MenuController@subCategoryMenu');
    Route::get('smsSend','SmsController@index');
    Route::resource('sms','SmsApiController');
    Route::post('sendToUser','SmsApiController@sendToUser');
    Route::post('postConfig','SmsApiController@config');
    Route::resource('pages','PagesController');
    /*Report*/
    Route::get('report','ReportController@index');
    Route::get('reports','ReportController@result');
    Route::get('inventory','ReportController@inventory');

});
Route::group(['middleware'=>['provider']],function(){
    Route::get('dashboard','DashboardController@index');
    /*item section*/
    Route::resource('item','ItemsController');
    Route::get('loadSubCat/{value}', 'ItemsController@loadSubCategory');
    Route::get('singleItem/{id}','ItemsController@show');
    Route::get('itemUpdate/{id}','ItemsController@edit');
    Route::get('item-show/{id}','ItemsController@categoryWise');

    Route::get('addPackage/{id}','ItemsController@addPackage');
    Route::get('loadSubSubCategory/{id}','ItemsController@loadSubSub');
    Route::post('addPackageCreate/{id}','ItemsController@packageCreate');
    Route::post('packageUpdate/{id}','ItemsController@packageUpdate');
    Route::post('packageDestroy/{id}','ItemsController@packageDelete');
    Route::get('viewItems','ItemsController@view');

    Route::resource('order','OrdersController');
    Route::get('delivered','OrdersController@delivered');
    Route::get('cancel-order','OrdersController@cancelOrder');
    Route::get('all-order','OrdersController@allOrder');
    Route::get('received','OrdersController@received');
    Route::resource('offer','OfferController');
    Route::get('loadSubCategory/{id}','OfferController@subCategory');
    Route::get('loadItem','OfferController@loadItem');
    Route::resource('banner-manager','AdManagerController');
    Route::resource('users','UsersController');

});

});
//Route::get('{item}', 'ProductController@singleProduct');
Route::get('{link}','ProductDetailsController@index')->middleware('dbConnect');


