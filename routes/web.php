<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Through url().............................................................!!
Route::get('/Ram', function(){
    echo"Hell Ram how are you Through URL";
});

Route::get('/Shyam', function(){
    echo"Hell shyam Through  URL";
});

Route::get('/Hari', function(){
    echo"Hell Hari Through  URL";
});
// 
Route::get('/Jp', function(){
    echo"Hell jp Through  URL";
});

Route::get('/Krishna', function(){
    echo"Hell krishna  how are you Through  URL";
});


//Through route()................................................................!!
Route::get('/man',function(){
    echo"Hello paras how are you through Route1_!";
     })->name('route1');


Route::get('/krishna',function(){
    echo"Hello suman how are you through Route2_!";
     })->name('route2');





    // call to table.....................................................................!!
    Route::get('/jp','JpController@index')->name('table5');
    Route::get('/table','tablecontroller@table1')->name('table');

    //To fetch data from table .......................................................!!
    Route::get('/final','UsersController@index')->name('users.index');

    //itself To try fetch data from table .............................................!!
    Route::get('/fi','ProjectController@index')->name('project.index');



    // To insert form data into table and then fetch this data in the table...........!!
    // How to delete and update(CRUD Operation) data from table...............................................!!
  Route::get('/users/create','UsersController@create')->name('users.create');
  Route::get('/users','UsersController@index')->name('users.index');
  Route::POST('/users/store','UsersController@store')->name('users.store');
  Route::get('/users/delete/{id}','UsersController@delete')->name('users.delete');
  Route::get('/users/edit/{id}','UsersController@edit')->name('users.edit');
  Route::post('/users/update/{id}','UsersController@update')->name('users.update');



// for Products I absent in this class this class day......................................!!
Route::get('/products','ProductController@index')->name('products.index'); //->middleware('auth');
Route::get('/products/create','ProductController@create')->name('products.create');
Route::post('/products/store','ProductController@store')->name('products.store');
Route::get('/products/delete/{id}','ProductController@delete')->name('products.delete');
Route::get('/products/edit/{id}','ProductController@edit')->name('products.edit');
Route::post('/products/update/{id}','ProductController@update')->name('products.update');


// for login form..........................................!!

Route::view('/login','customeauth.login')->name('login');
Route::view('/test','backend.dashboard')->name('test'); //...for   backend
Route::view('/front','fronted.front_master')->name('front'); //...for   fronted
Route::post('/login/check', 'AuthController@login')->name('login.check');

//for Register..........................................!!
Route::view('/register','customeauth.register')->name('register');
Route::post('/register/store','AuthController@store')->name('register.store');


// Sitesettings routes
Route::view('/sitesetting','backend.sitesetting')->name('sitesetting')->middleware('auth');
Route::post('/sitesetting/store','SiteSettingController@store')->name('sitesetting.store')->middleware('auth');


// for order......................................!!
Route::get('/orders','OrderController@index')->name('orders.index')->middleware('auth');
Route::get('/orders/delete/{id}','OrderController@delete')->name('orders.delete')->middleware('auth');
Route::get('/orders/edit/{id}','OrderController@edit')->name('orders.edit')->middleware('auth');
Route::post('/orders/update/{id}','OrderController@update')->name('orders.update')->middleware('auth');



// for Payments......................................!!
Route::get('/payments','PaymentController@index')->name('payments.index')->middleware('auth');
Route::get('/payments/delete/{id}','PaymentController@delete')->name('payments.delete')->middleware('auth');
Route::get('/payments/edit/{id}','PaymentController@edit')->name('payments.edit')->middleware('auth');
Route::post('/payments/update/{id}','PaymentController@update')->name('payments.update')->middleware('auth');




// for Details......................................!!
Route::get('/details','DetailsController@index')->name('details.index')->middleware('auth');
Route::get('/details/delete/{id}','DetailsController@delete')->name('details.delete')->middleware('auth');
Route::get('/details/edit/{id}','DetailsController@edit')->name('details.edit')->middleware('auth');
Route::post('/details/update/{id}','DetailsController@update')->name('details.update')->middleware('auth');



// for wishlists......................................!!
Route::get('/wishlists','WishlistsController@index')->name('wishlists.index')->middleware('auth');
Route::get('/wishlists/delete/{id}','WishlistsController@delete')->name('wishlists.delete')->middleware('auth');
Route::get('/wishlists/edit/{id}','WishlistsController@edit')->name('wishlists.edit')->middleware('auth');
Route::post('/wishlists/update/{id}','WishlistsController@update')->name('wishlists.update')->middleware('auth');

