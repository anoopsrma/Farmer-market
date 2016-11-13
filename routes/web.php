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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/information', function () {
    return view('information');
});


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/buy', 'ProductController@showLatest');

Route::post('/sort', [
    'uses' => 'ProductController@sortBy',
    'as' => 'sort-by'

]);



Route::get('/product/review/{id}', 'ReviewController@getReview');

Route::get('detail/{id}', [
    'uses' => 'ProductController@getDetail',
    'as' => 'product.detail'
]);

Route::get('/admin', function(){
    return view('admin');
});

Route::get('admin/report', [
    'uses' => 'ProductController@getReport',
    'as' => 'report.detail'
]);


Route::get('detail1/{id}', [
    'uses' => 'ProductController@getDetail1',
    'as' => 'profile.detail'
]);

Auth::routes();

Route::get('/register/verify/{token}', 'Auth\RegisterController@verify'); 

Route::get('/home', 'HomeController@index');

Route::get('/profile/myaccount', 'UserController@profile');
Route::post('/profile/myaccount', 'UserController@update_avatar');
Route::post('/editaccount', 'UserController@update_account');

Route::get('/profile/addproduct', function () {
    return view('profile.addproduct');
});
Route::post('/product/addproduct', 'ProductController@createProduct');

Route::get('/profile/myproduct', [
    'uses' =>'ProductController@showProduct',
    'as' => 'profile.myproduct'
]);

Route::post('/editproduct/{id}', [
    'uses' => 'ProductController@updateProduct',
    'as' => 'product.update'
]);

Route::get('/delete/{id}', [
    'uses' => 'ProductController@deleteProduct',
    'as' => 'product.delete'
]);


Route::get('/profile/myorders', 'UserController@getProfile');



Route::get('/shop/index', [
    'uses'=>'ProductController@index',
    'as' => 'shop.index'
    ]);

Route::get('/add-to-cart/{id}',[
		'uses' => 'ProductController@getAddToCart',
		'as' => 'product.addToCart'
	]);

Route::get('/report/{id}',[
        'uses' => 'ProductController@report',
        'as' => 'product.report'
    ]);

Route::get('/shopping-cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/checkout', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'

]);

Route::post('/checkout', [
    'uses' => 'ProductController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'

]);



Route::get('/addone/{id}', [
    'uses' => 'ProductController@getAddByOne',
    'as' => 'addoneitem'
]);

Route::get('/removeone/{id}', [
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'removeoneitem'
]);

Route::get('/removeall/{id}', [
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'removeitem'
]);





