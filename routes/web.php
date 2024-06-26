<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ReservationRecordController;
use App\Http\Controllers\ReportsController;
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
    Route::middleware('check.admin')->prefix('admin')->name('admin.')->group(function () {
        Route::controller(MainController::class)->group(function () {
            Route::get('/dashboard', 'dashboard')->name('dashboard');
            Route::get('/settings', 'settings')->name('setting');
            Route::patch('/settings/{id}', 'updateSettings')->name('settings.update');
            Route::get('/settings', 'settings')->name('setting');
            Route::post('/generateExcelSalesData', 'generateExcelSalesData')->name('generate.sales.data');
            Route::post('/generateExcelBeansData', 'generateExcelBeansData')->name('generate.beans.data');
        });

        Route::controller(ProductController::class)->name('product.')->group(function () {
            Route::get('/product', 'displayProduct')->name('display');
            Route::post('/addproduct', 'addProduct')->name('add');
            Route::put('/editProduct/{productId}', 'editProduct')->name('edit');
            Route::delete('/removeProduct/{productId}', 'removeProduct')->name('remove');
        });

        Route::controller(DeliveryController::class)->name('delivery.')->group(function () {
            Route::get('/delivery', 'displayDeliver')->name('display');
            Route::put('/delivery/{id}', 'updateDelivery')->name('update');
        });

        Route::controller(RequestController::class)->group(function () {
            Route::get('/displayrequestproduct', 'displayrequestProduct')->name('request');
            Route::post('/addrequestproduct', 'addrequest')->name('request.add');
            Route::get('/displaybeans', 'displaybeans')->name('coffeebeans');
            Route::post('/createbeans', 'addcoffeebeans')->name('beans.add');
            Route::patch('/displaybeans/{id}', 'updatecoffeebeans')->name('beans.update');
        });

        Route::controller(UsersController::class)->group(function () {
            Route::get('/profile', 'profile')->name('profile');
            Route::get('/search', 'searchUsers')->name('search.users');
            Route::get('/searchapplicant', 'searchApplicant')->name('search.applicant');
            Route::get('/getApplicant', 'getApplicant')->name('getApplicant');
            Route::get('/newapplicant', 'newapplicants')->name('newapplicant');
            Route::get('/manageusers', 'manageUsers')->name('manageusers');
            Route::get('/getUsersAccount', 'getUsersAccount')->name('getUsersAccount');
            Route::post('/manageusers', 'createAccount')->name('manageusers.create');
            Route::patch('/manageusers/{id}', 'updateAccount')->name('manageusers.update');
            Route::delete('/manageusers/{id}', 'removeAccount')->name('manageusers.delete');
            Route::patch('/newapplicant/{id}', 'approveaccount')->name('newapplicant.update');
            Route::patch('/removeApplicant/{id}', 'disapprovedAccount')->name('applicant.remove');
        });

        Route::controller(ReservationRecordController::class)->group(function () {
            Route::get('/reservationrecord', 'manageReservation')->name('reservationrecord');
            Route::patch('/reservationrecord{id}', 'claimed')->name('claim.confirm');
        });
    });

    Route::middleware('check.applicant')->prefix('/applicant')->name('applicant.')->group(function () {
        Route::controller(MainController::class)->group(function () {
            Route::get('/dashboard', 'dashboard')->name('dashboard');
            Route::get('/settings', 'settings')->name('setting');
            Route::patch('/settings/{id}', 'updateSettings')->name('settings.update');
        });

        Route::controller(UsersController::class)->group(function () {
            Route::get('/profile', 'profile')->name('profile');
        });
    });

    Route::middleware('check.customer')->prefix('/customer')->name('customer.')->group(function () {
        Route::controller(MainController::class)->group(function () {
            Route::get('/dashboard', 'dashboard')->name('dashboard');
            Route::get('/settings', 'settings')->name('setting');
            Route::patch('/settings/{id}', 'updateSettings')->name('settings.update');
        });

        Route::controller(ProductController::class)->name('product.')->group(function () {
            Route::get('/product', 'displayProduct')->name('display');
        });

        Route::controller(UsersController::class)->group(function () {
            Route::get('/profile', 'profile')->name('profile');
        });

        Route::controller(ReservationRecordController::class)->name('reservation.')->group(function () {
            Route::get('/reservation', 'manageReservation')->name('record');
            Route::get('/viewProduct', 'viewProduct')->name('product');
            Route::post('/reserveProduct', 'reserveProduct')->name('reserve.product');
        });
    });

    Route::middleware('check.supplier')->prefix('/supplier')->name('supplier.')->group(function () {
        Route::controller(MainController::class)->group(function () {
            Route::get('/dashboard', 'dashboard')->name('dashboard');
            Route::get('/settings', 'settings')->name('setting');
            Route::patch('/settings/{id}', 'updateSettings')->name('settings.update');
        });
        Route::controller(ProductController::class)->name('product.')->group(function () {
            Route::get('/product', 'displayProduct')->name('display');
        });

        Route::controller(UsersController::class)->group(function () {
            Route::get('/profile', 'profile')->name('profile');
        });

        Route::controller(RequestController::class)->group(function () {
            Route::get('/requestproduct', 'displayrequestProduct')->name('request');
            Route::patch('/requestproduct{id}', 'updatestatus')->name('request.confirm');
        });

        Route::controller(DeliveryController::class)->prefix('/delivery')->name('delivery.')->group(function () {
            Route::get('/', 'displayDeliver')->name('display');
            Route::post('/addDelivery', 'addDelivery')->name('add');
        });
    });

    Route::middleware('check.manager')->prefix('manager')->name('manager.')->group(function () {
        Route::controller(MainController::class)->group(function () {
            Route::get('/dashboard', 'dashboard')->name('dashboard');
            Route::get('/settings', 'settings')->name('setting');
            Route::patch('/settings/{id}', 'updateSettings')->name('settings.update');
            Route::post('/generateExcelSalesData', 'generateExcelSalesData')->name('generate.sales.data');
            Route::post('/generateExcelBeansData', 'generateExcelBeansData')->name('generate.beans.data');
        });

        Route::controller(ProductController::class)->name('product.')->group(function () {
            Route::get('/product', 'displayProduct')->name('display');
            Route::post('/addproduct', 'addProduct')->name('add');
            Route::put('/editProduct/{productId}', 'editProduct')->name('edit');
            Route::delete('/removeProduct/{productId}', 'removeProduct')->name('remove');
        });

        Route::controller(DeliveryController::class)->group(function () {
            Route::get('/delivery', 'displayDeliver')->name('delivery');
            Route::put('/delivery/{id}', 'updateDelivery')->name('update.delivery');
        });

        Route::controller(UsersController::class)->group(function () {
            Route::get('/profile', 'profile')->name('profile');
            Route::get('/search', 'searchUsers')->name('search.users');
            Route::get('/newapplicant', 'newapplicants')->name('newapplicant');
            Route::get('/searchapplicant', 'searchApplicant')->name('search.applicant');
            Route::get('/getApplicant', 'getApplicant')->name('getApplicant');
            Route::get('/manageusers', 'manageusers')->name('manageusers');
            Route::get('/applicantrecords', 'disapproveapplicant')->name('drecord');
            Route::get('/getUsersAccount', 'getUsersAccount')->name('getUsersAccount');
            Route::post('/manageusers', 'createAccount')->name('manageusers.create');
            Route::patch('/manageusers/{id}', 'updateAccount')->name('manageusers.update');
            Route::delete('/manageusers/{id}', 'removeAccount')->name('manageusers.delete');
            Route::patch('/newapplicant/{id}', 'approveaccount')->name('newapplicant.update');
            Route::patch('/removeApplicant/{id}', 'disapprovedAccount')->name('applicant.remove');
        });

        Route::controller(ReservationRecordController::class)->group(function () {
            Route::get('/reservationrecord', 'manageReservation')->name('reservationrecord');
            Route::patch('/reservationrecord{id}', 'claimed')->name('claim.confirm');
        });

        Route::controller(SalesController::class)->group(function () {
            Route::get('/managesales', 'sales')->name('managesales');
            Route::get('/salesreports', 'salesrep')->name('sales.rep');
        });

        Route::controller(RequestController::class)->group(function () {
            Route::get('/requestproduct', 'displayrequestProduct')->name('request');
            Route::post('/addrequestproduct', 'addrequest')->name('request.add');
            Route::get('/displaybeans', 'displaybeans')->name('coffeebeans');
            Route::post('/createbeans', 'addcoffeebeans')->name('beans.add');
        });

        Route::controller(ReportsController::class)->group(function () {
            Route::get('/reports', 'displayReports')->name('report');
        });
    });
});
