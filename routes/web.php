<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReservationRecordController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthenticationController::class)->group(function () {
    Route::view('/', 'homepage')->name('home');
    Route::view('/applicant/register-applicant', 'authentication.applicant.registerApplicant')->name('register.applicant');
    Route::view('/customer/register-customer', 'authentication.customer.registerCustomer')->name('register.customer');
    Route::view('/customer/login-customer', 'authentication.customer.loginCustomer')->name('login.customer');
    Route::view('/member/login-member', 'authentication.member.loginMember')->name('login.member');


    Route::post('/', 'loginUser')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/registerUser', 'registerUser')->name('registerUser');
});

Route::middleware('auth')->group(function () {
    Route::middleware('check.admin')->name('admin.')->group(function () {
        Route::controller(MainController::class)->group(function () {
            Route::get('/admin/dashboard', 'dashboard')->name('dashboard');
            Route::get('/admin/settings', 'settings')->name('setting');
        });

        Route::controller(ProductController::class)->group(function () {
            Route::get('/admin/product', 'product')->name('product');
            Route::post('/admin/addproduct', 'addProduct')->name('add.product');
            Route::put('/admin/editProduct/{productId}', 'editProduct')->name('edit.product');
            Route::delete('/admin/removeProduct/{productId}', 'removeProduct')->name('remove.product');
        });

        Route::controller(DeliveryController::class)->group(function () {
            Route::get('/admin/delivery', 'Deliver')->name('delivery');
        });

        Route::controller(UsersController::class)->group(function () {
            Route::get('/admin/profile', 'profile')->name('profile');
            Route::get('/admin/newapplicant', 'newapplicants')->name('newapplicant');
            Route::get('/admin/manageusers', 'manageusers')->name('manageusers');
            Route::post('/admin/manageusers', 'createAccount')->name('manageusers.create');
            Route::patch('/admin/manageusers/{id}', 'updateAccount')->name('manageusers.update');
            Route::delete('/admin/manageusers/{id}', 'removeAccount')->name('manageusers.delete');
        });
    });

    Route::middleware('check.applicant')->name('applicant.')->group(function () {
        Route::controller(MainController::class)->group(function () {
            Route::get('/applicant/dashboard', 'dashboard')->name('dashboard');
            Route::get('/applicant/settings', 'settings')->name('setting');
        });

        Route::controller(UsersController::class)->group(function () {
            Route::get('/applicant/profile', 'profile')->name('profile');
        });
    });

    Route::middleware('check.customer')->name('customer.')->group(function () {
        Route::controller(MainController::class)->group(function () {
            Route::get('/customer/dashboard', 'dashboard')->name('dashboard');
            Route::get('/customer/settings', 'settings')->name('setting');
        });

        Route::controller(ReservationRecordController::class)->group(function () {
            Route::get('/customer/reservationrecord', 'reservationrecord')->name('reservationrecord');
        });

        Route::controller(ProductController::class)->group(function () {
            Route::get('/customer/product', 'product')->name('product');
        });

        Route::controller(UsersController::class)->group(function () {
            Route::get('/customer/profile', 'profile')->name('profile');
        });
    });

    Route::middleware('check.member')->name('member.')->group(function () {
        Route::controller(MainController::class)->group(function () {
            Route::get('/member/dashboard', 'dashboard')->name('dashboard');
            Route::get('/member/settings', 'settings')->name('setting');
        });

        Route::controller(MediaController::class)->group(function () {
            Route::get('/member/media', 'media')->name('media');
        });

        Route::controller(ProductController::class)->group(function () {
            Route::get('/member/product', 'product')->name('product');
        });

        Route::controller(UsersController::class)->group(function () {
            Route::get('/member/profile', 'profile')->name('profile');
        });
    });
});
