<?php

use App\Http\Controllers\Auth\Login\DestroyController;
use App\Http\Controllers\Auth\PasswordConfirmation\CreateController;
use App\Http\Controllers\Auth\PasswordConfirmation\StoreController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/dddd', function () {
        return view('welcome');
    })->name('welcome');



    Route::group(['namespace' => 'Auth'] ,function (){
        Route::group(['namespace' => 'Register', 'middleware' => 'guest'], function () {
            Route::get('/register', 'CreateController')->name('register');
            Route::post('/register', 'StoreController')->name('register.store');
        });
        Route::get('/dashboard', 'IndexController')->middleware('verified')->name('dashboard');
        Route::group(['namespace' => 'Login', 'middleware' => 'guest'], function () {
            Route::get('/login', 'CreateController')->name('login');
            Route::post('/login', 'StoreController')->name('login.store');
        });

        Route::post('/logout', DestroyController::class)->name('logout')->middleware('auth');

        Route::group(['middleware' => 'auth', 'namespace' => 'EmailVerification'], function () {
            Route::get('/email/verify', 'EmailVerificationPromptController')->name('verification.notice');
            Route::get('/email/verify/{id}/{hash}', 'VerifyEmailController')->name('verification.verify')->middleware('signed');
            Route::post('/email/verification-notification', 'EmailVerificationNotificationController')->name('verification.send');
        });

        Route::group(['namespace' => 'ForgotPassword', 'middleware' => 'guest'], function () {
            Route::get('/forgot-password', 'CreateController')->name('password.request');
            Route::post('/forgot-password', 'StoreController')->name('password.email');
        });

        Route::group(['namespace' => 'ResetPassword', 'middleware' => 'guest'], function () {
            Route::get('/reset-password', 'CreateController')->name('password.reset');
            Route::post('/reset-password', 'StoreController')->name('password.update');
        });

        Route::get('/profile', 'ProfileController')->middleware(['verified', 'password.confirm'])->name('profile');

        Route::get('/confirm-password', CreateController::class)->middleware('auth')->name('password.confirm');
        Route::post('/confirm-password', StoreController::class)->middleware('auth');

    });
    Route::get('/', 'NewsController@index')->name('news.index');
    Route::get('/create', 'NewsController@create')->name('news.create');
    Route::post('/', 'NewsController@store')->name('news.store');
    Route::get('/{news}', 'NewsController@show')->name('news.show');
    Route::get('/{news}/edit', 'NewsController@edit')->name('news.edit');
    Route::patch('/{news}', 'NewsController@update')->name('news.update');
    Route::delete('/{news}', 'NewsController@destroy')->name('news.destroy');

    Route::group(['prefix' => '{news}/likes'], function () {
        Route::post('/', 'LikeStoreController')->name('like.store');
    });

    Route::group(['namespace' => 'comments', 'prefix' => '{news}/comments'], function (){
        Route::post('/', 'StoreController')->name('news.comment.store');
    });
