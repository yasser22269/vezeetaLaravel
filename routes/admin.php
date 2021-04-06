<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin', 'prefix' => 'Admin'], function () {
             Route::get('/', 'AdminController@index')->name('Admin');
             Route::get('/logout', 'LoginController@logout')->name('admin.logout');

        // ------------------------------Start Categories------------------------------------

            Route::resource('Category', 'CategoryController');

        // ------------------------------End Categories-------------------------------------


         // ------------------------------Start Tags--------------------------------------

         Route::resource('Tag', 'TagController');

         // ------------------------------End Tags--------------------------------------------


         // ------------------------------Start Settings-----------------------------------

         // ------------------------------End Settings--------------------------------------



             // ------------------------------Start Users-----------------------------------

             Route::resource('Users', 'UserController');

             // ------------------------------End Users-------------------------------------


             // ------------------------------Start Admins----------------------------------

                //  Route::resource('Admins', 'AdminController');

                Route::get('profile', 'AdminController@profile')->name('admin.profile');
                Route::put('profile/{id}', 'AdminController@updateprofile')->name('admin.update.profile');

             // ------------------------------End Admins-----------------------------------



             // ------------------------------Start Products---------------------------------

             Route::resource('Products', 'ProductController');
             Route::put('Products/Priceupdate/{id}', 'ProductController@Priceupdate')->name('Products.Priceupdate');

             Route::post('Products/imageupdate', 'ProductController@imageupdate')->name('Products.imageupdate');
             Route::post('Products/imageupdate/{id}', 'ProductController@imageupdateDB')->name('Products.imageupdate.db');
             Route::post('Products/imagedelete', 'ProductController@imagedelete')
             ->name('admin.products.images.delete');

             Route::post('Products/imagedelete/{id}', 'ProductController@imagedeleteId')
             ->name('admin.products.imagedeleteId');
             // ------------------------------End Products------------------------------------


             // ------------------------------Start Doctors---------------------------------

             Route::resource('Doctors', 'DoctorController');


             Route::post('Doctors/imageupdate', 'DoctorController@imageupdate')->name('Doctors.imageupdate');
             Route::post('Doctors/imageupdate/{id}', 'DoctorController@imageupdateDB')->name('Doctors.imageupdate.db');
             Route::post('Doctors/imagedelete', 'DoctorController@imagedelete')
             ->name('admin.Doctors.images.delete');

             Route::post('Doctors/imagedelete/{id}', 'DoctorController@imagedeleteId')
             ->name('admin.Doctors.imagedeleteId');
             // ------------------------------End Doctors------------------------------------


            // ------------------------------Start DoctorSchedule--------------------------

            Route::resource('DoctorSchedule', 'DoctorScheduleController');

            // ------------------------------End Contacts---------------------------


            // ------------------------------Start Contacts--------------------------------

                Route::resource('Contact', 'ContactUs')->only(['index','destroy','show']);

            // ------------------------------End Contacts---------------------------------


              // ------------------------------Start Contacts-----------------------------

              Route::resource('OrderAdmin', 'OrderController');

              // ------------------------------End Contacts------------------------------

            // ------------------------------Start Slider------------------------------------

            Route::resource('Slider', 'SliderImagesController');

            // ------------------------------End Slider-------------------------------------
            // ------------------------------Start Slider------------------------------------

            Route::resource('reservation', 'ReservationController');

            // ------------------------------End Slider-------------------------------------


    });


Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin', 'prefix' => 'Admin'], function () {

    Route::get('login', 'LoginController@login')->name('admin.login');
    Route::post('login', 'LoginController@postLogin')->name('admin.post.login');

});
