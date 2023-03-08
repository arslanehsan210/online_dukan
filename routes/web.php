<?php

use Illuminate\Support\Facades\Route;


        Auth::routes();
        Route::group(['middleware'=>['customAuth']],function(){

            
        Route::get('cart' , 'CartController@cart')->name('cart');
        Route::get('checkout' , 'CartController@checkout')->name('checkout')->middleware('checkoutAuth');
        Route::post('added' , 'CartController@added')->name('added');
        Route::get('addtocart/{id}', 'CartController@addtocart')->name('addtocart');
        // Route::get('adddtocart/{id}', 'CartController@adddtocart')->name('adddtocart');
        Route::get('increase/{id}', 'CartController@increase')->name('increase');
        Route::get('decrease/{id}', 'CartController@decrease')->name('decrease');
        Route::get('delcart/{id}', 'CartController@delcart')->name('delcart');
        Route::get('myaccount', 'CartController@myaccount')->name('myaccount');
        Route::get('orderdetails/{id}', 'CartController@orderdetails')->name('orderdetails');
        Route::get('wishlist', 'WishlistController@wishlist')->name('wishlist');
        Route::get('addtowishlist/{id}', 'WishlistController@addtowishlist')->name('addtowishlist');
        Route::get('adddtowishlist/{id}', 'WishlistController@addtowishlist')->name('adddtowishlist');
        Route::get('delwishlist/{id}', 'WishlistController@delwishlist')->name('delwishlist');
        Route::get('sendtocart/{id}', 'WishlistController@sendtocart')->name('sendtocart');
        Route::get('profile','ProfileController@show')->name('profile');
        Route::post('updated','ProfileController@update')->name('updated');
        Route::post('reviewform' , 'ReviewController@reviewForm')->name('reviewform');
        Route::post('paid','CartController@afterpayment')->name('paid');
        // Route::get('thankyou', 'thankyou');
    });
    Route::get('adddtocart/{id}', 'CartController@adddtocart')->name('adddtocart');
        
        Route::get('shopps' ,'ProductsController@searchshop')->name('shopps');
        Route::get('/', 'ProductsController@homeshow')->name('home');
        Route::post('/submitted', 'ProductsController@store');
        Route::get('contact' , 'ProductsController@contact')->name('cont');
        Route::get('/contactform' , 'ProductsController@contactForm');
        Route::get('shop' , 'ProductsController@show')->name('shopp');    
        Route::get('filter/{id}','FilterationController@filtercategory')->name('filt');
        Route::get('subcat/{id}','FilterationController@filtersubcategory')->name('sb');
        Route::get('details/{id}','ProductsController@productdetails')->name('detail');
        Route::get('/subscribe', 'ProductsController@newsletterform')->name('subscribe');
        Route::get('/filtbyprice', 'FilterationController@filterByPrice')->name('filtbyprice');
        Route::get('/filtbysize', 'FilterationController@filterBySize')->name('filtbysize');
        Route::get('/sortbyprice', 'FilterationController@sortByPrice')->name('sortbyprice');
        Route::get('/sortbydate', 'FilterationController@sortByDate')->name('sortbydate');

        



 /////////// Admin Side ////////////////


        Route::group(['middleware' => ['adminAuth']],function(){
        Route::get('admin' , 'AdminOrders@total_sale')->name('admin');
        Route::get('add', 'ProductsController@create')->name('addd');

/////////// productCrud ////////////////

        Route::get('listing' , 'ProductCrud@showList')->name('listing');
        Route::get('deleteProduct/{id}','ProductCrud@delProduct')->name('deleteproduct');
        Route::get('editproduct/{id}','ProductCrud@editProduct')->name('editproduct');
        Route::post('updateproduct/{id}','ProductCrud@updateProduct')->name('updateproduct');


        ///////////////////////////  categoryCrud   ///////////////////////

        Route::get('catlisting' , 'CategoriesCrud@categoryList')->name('catlisting');
        Route::get('catform' , 'CategoriesCrud@cateogryForm')->name('catform');
        Route::post('addcat' ,'CategoriesCrud@addcategory')->name('addcat');
        Route::get('deletecategory/{id}','CategoriesCrud@delCategory')->name('deletecategory');


        ///////////////////////////  subcategoryCrud   ///////////////////////

        Route::get('subcatlisting' , 'CategoriesCrud@subcategoryList')->name('subcatlisting');
        Route::get('subcatform' , 'CategoriesCrud@subcateogryForm')->name('subcatform');
        Route::post('addsubcat' ,'CategoriesCrud@addsubcategory')->name('addsubcat');
        Route::get('deletesubcategory/{id}','CategoriesCrud@delsubCategory')->name('deletesubcategory');


        ///////////////////////////  ordersListing   ///////////////////////

        Route::get('orderslisting', 'AdminOrders@ordersListing')->name('orderslisting');
        Route::get('adminorderdetail/{id}', 'AdminOrders@orderDetails')->name('adminorderdetail');
        Route::get('orderpaid/{id}', 'AdminOrders@orderPaid')->name('orderpaid');
        Route::get('orderpending/{id}', 'AdminOrders@orderPending')->name('orderpending');

                ///////////////////////////  customer message Listing   ///////////////////////

        Route::get('messagelisting', 'AdminOrders@cus_msg_list')->name('messagelisting');
        Route::get('deletecusmsg/{id}','AdminOrders@del_cus_msg')->name('deletecusmsg');

                                ///////////////////////////  customers Listing   ///////////////////////

         Route::get('customerlisting', 'AdminOrders@users_listing')->name('customerlisting'); 
         Route::get('cutomerapprove/{id}' , 'AdminOrders@approve')->name('cutomerapprove');             
         Route::get('cutomerunapprove/{id}' , 'AdminOrders@unapprove')->name('cutomerunapprove');             

         Route::get('totalsale', 'AdminOrders@total_sale')->name('totalsale');
         Route::get('newsletter', 'AdminOrders@subscription')->name('newsletter');


});







