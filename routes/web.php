<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function () {

    //City routes
    Route::group(['prefix' => 'city'], function () {
        Route::get('list', ['as' => 'city.list', 'uses' => 'App\Http\Controllers\CityController@index']);
        Route::get('create', ['as' => 'city.create', 'uses' => 'App\Http\Controllers\CityController@create']);
        Route::post('save', ['as' => 'city.save', 'uses' => 'App\Http\Controllers\CityController@store']);
        Route::get('edit/{id}', ['as' => 'city.edit', 'uses' => 'App\Http\Controllers\CityController@edit']);
        Route::post('update', ['as' => 'city.update', 'uses' => 'App\Http\Controllers\CityController@update']);
        Route::delete('delete/{id}', ['as' => 'city.delete', 'uses' => 'App\Http\Controllers\CityController@destroy']);
        Route::post('show/{id}', ['as' => 'city.show', 'uses' => 'App\Http\Controllers\CityController@show']);
         Route::get('search', ['as' => 'city.search', 'uses' => 'App\Http\Controllers\CityController@search']);

    });

    //PaymentMetode Routes
    Route::group(['prefix' => 'paymentMethode'], function () {
        Route::get('list', ['as' => 'paymentMethode.list', 'uses' => 'App\Http\Controllers\PaymentMethodeController@index']);
        Route::get('create', ['as' => 'paymentMethode.create', 'uses' => 'App\Http\Controllers\PaymentMethodeController@create']);
        Route::post('save', ['as' => 'paymentMethode.save', 'uses' => 'App\Http\Controllers\PaymentMethodeController@store']);
        Route::get('edit/{id}', ['as' => 'paymentMethode.edit', 'uses' => 'App\Http\Controllers\PaymentMethodeController@edit']);
        Route::post('update', ['as' => 'paymentMethode.update', 'uses' => 'App\Http\Controllers\PaymentMethodeController@update']);
        Route::delete('delete/{id}', ['as' => 'paymentMethode.delete', 'uses' => 'App\Http\Controllers\PaymentMethodeController@destroy']);
        Route::post('show/{id}', ['as' => 'paymentMethode.show', 'uses' => 'App\Http\Controllers\PaymentMethodeController@show']);
         Route::get('search', ['as' => 'paymentMethode.search', 'uses' => 'App\Http\Controllers\PaymentMethodeController@search']);

    });

    //Seller routes
    Route::group(['prefix' => 'seller'], function () {
        Route::get('list', ['as' => 'seller.list', 'uses' => 'App\Http\Controllers\SellerController@index']);
        Route::get('create', ['as' => 'seller.create', 'uses' => 'App\Http\Controllers\SellerController@create']);
        Route::post('save', ['as' => 'seller.save', 'uses' => 'App\Http\Controllers\SellerController@store']);
        Route::get('edit/{id}', ['as' => 'seller.edit', 'uses' => 'App\Http\Controllers\SellerController@edit']);
        Route::post('update', ['as' => 'seller.update', 'uses' => 'App\Http\Controllers\SellerController@update']);
        Route::delete('delete/{id}', ['as' => 'seller.delete', 'uses' => 'App\Http\Controllers\SellerController@destroy']);
        Route::post('show/{id}', ['as' => 'seller.show', 'uses' => 'App\Http\Controllers\SellerController@show']);
         Route::get('search', ['as' => 'seller.search', 'uses' => 'App\Http\Controllers\SellerController@search']);

    });


    //Buyer routes
    Route::group(['prefix' => 'buyer'], function () {
        Route::get('list', ['as' => 'buyer.list', 'uses' => 'App\Http\Controllers\BuyerController@index']);
        Route::get('create', ['as' => 'buyer.create', 'uses' => 'App\Http\Controllers\BuyerController@create']);
        Route::post('save', ['as' => 'buyer.save', 'uses' => 'App\Http\Controllers\BuyerController@store']);
        Route::get('edit/{id}', ['as' => 'buyer.edit', 'uses' => 'App\Http\Controllers\BuyerController@edit']);
        Route::post('update', ['as' => 'buyer.update', 'uses' => 'App\Http\Controllers\BuyerController@update']);
        Route::delete('delete/{id}', ['as' => 'buyer.delete', 'uses' => 'App\Http\Controllers\BuyerController@destroy']);
        Route::post('show/{id}', ['as' => 'buyer.show', 'uses' => 'App\Http\Controllers\BuyerController@show']);
         Route::get('search', ['as' => 'buyer.search', 'uses' => 'App\Http\Controllers\BuyerController@search']);
    });

        //Employee routes
        Route::group(['prefix' => 'employee'], function () {
            Route::get('list', ['as' => 'employee.list', 'uses' => 'App\Http\Controllers\EmployeeController@index']);
            Route::get('create', ['as' => 'employee.create', 'uses' => 'App\Http\Controllers\EmployeeController@create']);
            Route::post('save', ['as' => 'employee.save', 'uses' => 'App\Http\Controllers\EmployeeController@store']);
            Route::get('edit/{id}', ['as' => 'employee.edit', 'uses' => 'App\Http\Controllers\EmployeeController@edit']);
            Route::post('update', ['as' => 'employee.update', 'uses' => 'App\Http\Controllers\EmployeeController@update']);
            Route::delete('delete/{id}', ['as' => 'employee.delete', 'uses' => 'App\Http\Controllers\EmployeeController@destroy']);
            Route::post('show/{id}', ['as' => 'employee.show', 'uses' => 'App\Http\Controllers\EmployeeController@show']);
             Route::get('search', ['as' => 'employee.search', 'uses' => 'App\Http\Controllers\EmployeeController@search']);
        });

        Route::group(['prefix' => 'contracts'], function () {
            Route::get('list', ['as' => 'contracts.list', 'uses' => 'App\Http\Controllers\ContractController@index']);
            Route::get('create', ['as' => 'contracts.create', 'uses' => 'App\Http\Controllers\ContractController@create']);
            Route::post('save', ['as' => 'contracts.save', 'uses' => 'App\Http\Controllers\ContractController@store']);
            Route::get('edit/{id}', ['as' => 'contracts.edit', 'uses' => 'App\Http\Controllers\ContractController@edit']);
            Route::post('update', ['as' => 'contracts.update', 'uses' => 'App\Http\Controllers\ContractController@update']);
            Route::delete('delete/{id}', ['as' => 'contracts.delete', 'uses' => 'App\Http\Controllers\ContractController@destroy']);
            Route::post('show/{id}', ['as' => 'contracts.show', 'uses' => 'App\Http\Controllers\ContractController@show']);
            Route::get('search', ['as' => 'contracts.search', 'uses' => 'App\Http\Controllers\ContractController@search']);
            Route::get('print/{id}', ['as' => 'contracts.print', 'uses' => 'App\Http\Controllers\ContractController@print']);
            Route::get('get-seller-detail/{name}', ['as' => 'seller-detail', 'uses' => 'App\Http\Controllers\ContractController@getSellerDetail']);
        });

    Route::group(['prefix' => 'dispatch'], function () {
        Route::get('list', ['as' => 'dispatch.list', 'uses' => 'App\Http\Controllers\DispatchController@index']);
        Route::get('create', ['as' => 'dispatch.create', 'uses' => 'App\Http\Controllers\DispatchController@create']);
        Route::post('save', ['as' => 'dispatch.save', 'uses' => 'App\Http\Controllers\DispatchController@store']);
        Route::get('dispatch-entry/{id}', ['as' => 'dispatch.dispatch-entry', 'uses' => 'App\Http\Controllers\DispatchController@dispatch']);
        Route::post('update', ['as' => 'dispatch.update', 'uses' => 'App\Http\Controllers\DispatchController@update']);
        Route::delete('delete/{id}', ['as' => 'dispatch.delete', 'uses' => 'App\Http\Controllers\DispatchController@destroy']);
        Route::post('show/{id}', ['as' => 'dispatch.show', 'uses' => 'App\Http\Controllers\DispatchController@show']);
        Route::get('search', ['as' => 'dispatch.search', 'uses' => 'App\Http\Controllers\DispatchController@search']);
    });

    Route::group(['prefix' => 'mill-weight'], function () {
        Route::get('list', ['as' => 'mill-weight.list', 'uses' => 'App\Http\Controllers\MillWeightController@index']);
        Route::get('create/{id}', ['as' => 'mill-weight.create', 'uses' => 'App\Http\Controllers\MillWeightController@addMillWeight']);
        Route::post('save', ['as' => 'mill-weight.save', 'uses' => 'App\Http\Controllers\MillWeightController@store']);
        Route::get('dispatch-entry/{id}', ['as' => 'mill-weight.mill-weight-entry', 'uses' => 'App\Http\Controllers\MillWeightController@dispatch']);
        Route::post('update', ['as' => 'mill-weight.update', 'uses' => 'App\Http\Controllers\MillWeightController@update']);
        Route::delete('delete/{id}', ['as' => 'mill-weight.delete', 'uses' => 'App\Http\Controllers\MillWeightController@destroy']);
        Route::post('show/{id}', ['as' => 'mill-weight.show', 'uses' => 'App\Http\Controllers\MillWeightController@show']);
        Route::get('search', ['as' => 'mill-weight.search', 'uses' => 'App\Http\Controllers\MillWeightController@search']);
    });
});
