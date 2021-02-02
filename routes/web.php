<?php

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

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

    Route::resource('department', \App\Http\Controllers\DepartmentController::class);
    Route::resource('branch', \App\Http\Controllers\BranchController::class);
    Route::resource('category', \App\Http\Controllers\CategoryController::class);
    Route::get('items/category/{id}', '\App\Http\Controllers\ItemController@category_items')->name('items.category');
    Route::resource('items', \App\Http\Controllers\ItemController::class);
    Route::get('employee/department/{id}', '\App\Http\Controllers\EmployeeController@department_employees')->name('employee.department');
    Route::resource('employee', \App\Http\Controllers\EmployeeController::class);
    Route::resource('asset-assignment', \App\Http\Controllers\AssetAssignmentController::class);
    Route::get('asset-transfer/history', '\App\Http\Controllers\TransferController@history')->name('asset-transfer.history');
    Route::get('asset-transfer/transfer-history/{id}', '\App\Http\Controllers\TransferController@transfer_history')
        ->name('asset-transfer.transfer-history');
    Route::resource('asset-transfer', \App\Http\Controllers\TransferController::class);
    Route::post('/get-department-employee', '\App\Http\Controllers\AssetAssignmentController@get_department_employee');
    Route::post('/get-category-item', '\App\Http\Controllers\AssetAssignmentController@get_category_item');
    Route::post('/get-assigned-employee', '\App\Http\Controllers\AssetAssignmentController@get_department_employee');
    Route::post('/get-assigned-item', '\App\Http\Controllers\AssetAssignmentController@get_category_item');

    Route::get('item-image/{image}', function($image) {
        $file = storage_path('app/item-image/'.$image);
        return response()->file($file);
    })->name('item-image');

    Route::get('purchase-document/{document}', function($document) {
        $file = storage_path('app/purchase-document/'.$document);
        return response()->file($file);
    })->name('purchase-document');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

