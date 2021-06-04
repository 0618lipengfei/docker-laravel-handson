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
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// TypeWeather
Route::get('TypeWeather', [App\Http\Controllers\TypeWeatherController::class, 'IndexPage']);
Route::get('TypeWeather/Add', [App\Http\Controllers\TypeWeatherController::class, 'AddPage']);
Route::get('TypeWeather/Edit', [App\Http\Controllers\TypeWeatherController::class, 'EditPage']);

Route::get('TypeWeather/ajax', [App\Http\Controllers\TypeWeatherController::class, 'ajax']);

// Route::get('TypeWeather', [App\Http\Controllers\TypeWeatherController::class, 'Select']);
Route::post('TypeWeather/Add', [App\Http\Controllers\TypeWeatherController::class, 'Add']);
Route::post('TypeWeather/Edit', [App\Http\Controllers\TypeWeatherController::class, 'Edit']);

// TypesTargets
Route::get('TypesTargets', [App\Http\Controllers\TypesTargetsController::class, 'IndexPage']);
Route::get('TypesTargets/Add', [App\Http\Controllers\TypesTargetsController::class, 'AddPage']);
Route::get('TypesTargets/Edit', [App\Http\Controllers\TypesTargetsController::class, 'EditPage']);

// Route::get('TypesTargets', [App\Http\Controllers\TypesTargetsController::class, 'Select']);
Route::post('TypesTargets/Add', [App\Http\Controllers\TypesTargetsController::class, 'Add']);
Route::post('TypesTargets/Edit', [App\Http\Controllers\TypesTargetsController::class, 'Edit']);
Route::post('TypesTargets/Delete', [App\Http\Controllers\TypesTargetsController::class, 'Delete'])->name('TypesTargets.Delete');

// TypesPreprocess
Route::get('TypesPreprocess', [App\Http\Controllers\TypesPreprocessController::class, 'IndexPage']);
Route::get('TypesPreprocess/Add', [App\Http\Controllers\TypesPreprocessController::class, 'AddPage']);
Route::get('TypesPreprocess/Edit', [App\Http\Controllers\TypesPreprocessController::class, 'EditPage']);

// Route::get('TypesPreprocess', [App\Http\Controllers\TypesPreprocessController::class, 'Select']);
Route::post('TypesPreprocess/Add', [App\Http\Controllers\TypesPreprocessController::class, 'Add']);
Route::post('TypesPreprocess/Edit', [App\Http\Controllers\TypesPreprocessController::class, 'Edit']);

// ForecastControl
Route::get('ForecastControl', [App\Http\Controllers\ForecastControlController::class, 'IndexPage']);
Route::get('ForecastControl/Detail', [App\Http\Controllers\ForecastControlController::class, 'DetailPage']);
Route::get('ForecastControl/Add1', [App\Http\Controllers\ForecastControlController::class, 'AddPage1']);
Route::get('ForecastControl/Add2', [App\Http\Controllers\ForecastControlController::class, 'AddPage2']);
Route::get('ForecastControl/Add3', [App\Http\Controllers\ForecastControlController::class, 'AddPage3']);
Route::get('ForecastControl/Add4', [App\Http\Controllers\ForecastControlController::class, 'AddPage4']);
Route::get('ForecastControl/Edit1', [App\Http\Controllers\ForecastControlController::class, 'EditPage1']);
Route::get('ForecastControl/Edit2', [App\Http\Controllers\ForecastControlController::class, 'EditPage2']);
Route::get('ForecastControl/Edit3', [App\Http\Controllers\ForecastControlController::class, 'EditPage3']);
Route::get('ForecastControl/Edit4', [App\Http\Controllers\ForecastControlController::class, 'EditPage4']);

// // Route::get('ForecastControl', [App\Http\Controllers\ForecastControlController::class, 'Select']);
Route::post('ForecastControl/Add4', [App\Http\Controllers\ForecastControlController::class, 'Add']);
Route::post('ForecastControl/Edit4', [App\Http\Controllers\ForecastControlController::class, 'Edit']);

// CustomersServices
Route::get('CustomersServices', [App\Http\Controllers\CustomersServicesController::class, 'IndexPage']);
Route::get('CustomersServices/Add', [App\Http\Controllers\CustomersServicesController::class, 'AddPage']);
Route::get('CustomersServices/Edit', [App\Http\Controllers\CustomersServicesController::class, 'EditPage']);

// // Route::get('CustomersServices', [App\Http\Controllers\CustomersServicesController::class, 'Select']);
Route::post('CustomersServices/Add', [App\Http\Controllers\CustomersServicesController::class, 'Add']);
Route::post('CustomersServices/Edit', [App\Http\Controllers\CustomersServicesController::class, 'Edit']);







// test
Route::get('datatable', [App\Http\Controllers\DataTableController::class, 'index']);
Route::get('datatable/ajax', [App\Http\Controllers\DataTableController::class, 'ajax']);