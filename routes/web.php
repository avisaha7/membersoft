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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function(){

        Route::get('dashboard','DashboardController@index')->name('dashboard');
        Route::resource('category','CategoryController');
        Route::resource('expense','ExpenseController');
        Route::resource('policy','PolicyController');
        Route::resource('payment','PaymentController');
        Route::resource('member','MemberController');
    Route::resource('notice','NoticeController');
    Route::resource('invest','InvestController');
    Route::resource('management','ManagementController');
    Route::resource('desig','DesignationController');
    Route::resource('purchase','PurchaseController');
    Route::resource('product_category','PcategoryController');
    Route::resource('product','ProductController');
    Route::resource('sale','SaleController');
    Route::resource('stock','InventoryController');
    Route::resource('total_receive','PaymentrcvController');
    Route::resource('account','AccountController');

    Route::get('/pending/payment','PaymentController@pending')->name('payment.pending');
    Route::get('/approved/payment','PaymentController@approved')->name('payment.approved');
    Route::put('/payment/{id}/approve','PaymentController@approval')->name('payment.approve');
    Route::put('/member/{id}/approve','MemberController@approval')->name('member.approve');
    
});

Route::group(['as'=>'member.','prefix'=>'member','namespace'=>'Member','middleware'=>['auth','member']], function(){


        Route::get('dashboard','DashboardController@index')->name('dashboard');
	Route::resource('payment','PaymentController');
        Route::resource('notice','NoticeController');
        Route::resource('policy','PolicyController');
        Route::resource('invest','InvestController');
        Route::resource('management','ManagementController');

});
Route::get('member/dashboard/profile', function () {

    return view('profile');

}


);






