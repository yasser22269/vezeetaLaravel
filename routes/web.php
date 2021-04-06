<?php

use App\Events\NewOrder;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group([
    'middleware' => ['globaldata']
], function () {


        Auth::routes();

        // Route::get('/', 'Site\HomeController@index');
        // Route::get('/home', 'HomeController@index')->name('home');

        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/about_me', 'HomeController@about_me')->name('about_me');
        Route::get('/categoriesHome', 'HomeController@categoriesHome')->name('categoriesHome');



        Route::get('/logoutWeb', 'Auth\LoginController@logoutWeb')->name('logoutWeb');

        Route::group(['namespace' => 'Site' ],function () {

          // ------------------------------Start Contacts--------------------------------------
              Route::get('Contacts', 'HomeController@Contacts')->name('Contacts');
              Route::post('Contacts', 'HomeController@UpdateContacts')->name('UpdatepContacts');
          // ------------------------------End Contacts------------------------------



           // ------------------------------Start ProductController--------------------------

           Route::get('products/{slug}', 'ProductController@index')->name('products.index');
           Route::get('product/{slug}', 'ProductController@show')->name('product.show');
           Route::post('product/Search', 'ProductController@search')->name('product.search');

       // ------------------------------End products--------------------------------

   // ------------------------------Start DoctorController----------------------------
   Route::get('searchdoctors/{id?}', 'DoctorController@index')->name('search.doctors');

   Route::get('Doctor/{slug}', 'DoctorController@show')->name('site.doctor.show');
   Route::get('appoinment', 'DoctorController@appoinment')->name('appoinment');
   Route::get('appoinment/show/{id}', 'DoctorController@appoinmentshow')->name('appoinmentshow');
   Route::post('appoinment/show/{id}', 'DoctorController@appoinmentupdate')->name('appoinmentupdate');

   // ------------------------------End DoctorController--------------------
   

        // ------------------------------Start CommentController-----------------------

        Route::post('Feedback', 'CommentController@Feedback')->name('Feedback');
        // ------------------------------End CommentController--------------------



            });

        Route::group(['namespace' => 'Site','middleware' =>['auth:web'] ],function () {


            // ------------------------------Start profile-------------------------------

               Route::get('profile', 'HomeController@profile')->name('profile');
               Route::post('profile', 'HomeController@Updateprofile')->name('Updateprofile');

            // ------------------------------Start profile-------------------------------



             // ------------------------------Start Options---------------------------------

             Route::resource('Order', 'OrderController');
             Route::post('coupon', 'OrderController@coupon')->name('couponorder');

             Route::get('/payment', ['as' => 'payment', 'uses' => 'PaymentController@payWithpaypal']);
             Route::get('/payment/status',['as' => 'payment.status', 'uses' => 'PaymentController@getPaymentStatus']);

             // ------------------------------End Options--------------------------------------------


         });



});//





