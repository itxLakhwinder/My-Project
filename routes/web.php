<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Driver\DriverController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Auth::routes(['verify' => true]);

Route::get('/', function () {
    // echo message('lakhhhh');
    return view('welcome');
});
Route::get('/test', function () {
    return view('index');
});



Route::get('signup-customer', function () {
    $title = 'signup-customer';
    return view('auth.register-customer', compact('title'));
})->name('signup-customer');

Route::get('signup-driver', function () {
    $title = 'signup-driver';
    return view('auth.register-driver', compact('title'));
})->name('signup-driver');

// Route::middleware(['auth', 'verified'])->group(function () {
// Route::controller(CustomerController::class)->group(function () {
//                 Route::get('/delivery', 'dashboard')->name('customer.dashboard');
// });

Route::middleware(['auth', 'verified'])->group(function () {

    // Customer
    Route::group(['middleware' => ['role:customer']], function () {
        Route::prefix('customer')->group(function () {
            Route::controller(CustomerController::class)->group(function () {
                Route::get('/delivery', 'dashboard')->name('customer.dashboard');
                // Route::get('/deliveries', 'deliveryList')->name('customer.delivery_list');

                // review..
                // Route::get('/review', 'review')->name('customer.review');
            });
        });
    });


  // Driver
    Route::group(['middleware' => ['role:driver']], function () {
        Route::prefix('driver')->group(function () {
            Route::controller(DriverController::class)->group(function () {
                Route::get('/delivery-board', 'dashboard')->name('driver.dashboard');
                Route::get('/view-delivery/{id}', 'viewDelivery')->name('driver.view_delivery');
                Route::get('/approved-deliveries', 'approvedDelivery')->name('driver.approved_delivery');
                Route::get('/delivery-summary/{id}', 'deliverySummary')->name('driver.delivery-summary');

            });
        });
    });


    // Admin
    // Route::group(['middleware' => ['role:admin']], function () {
    //     Route::prefix('admin')->group(function () {
    //         Route::controller(AdminController::class)->group(function () {
    //             Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
    //         });
    //      Route::controller(StoreController::class)->group(function () {
    //             Route::get('/stores', 'index')->name('admin.index');
    //             Route::get('/store/create', 'create')->name('admin.store.create');
    //             Route::post('/store/add', 'store')->name('admin.store.add');
    //             Route::get('/store/edit/{id}', 'edit')->name('admin.store.edit');
    //             Route::post('/update/{id}', 'update')->name('admin.store.update');
    //             Route::get('/destroy/{id}', 'destroy')->name('admin.store.destroy');
    //         });
    //     });
    // });


});
