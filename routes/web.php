<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetTypeController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\EnsureTokenIsValid;
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

Auth::routes();

Route::middleware([EnsureTokenIsValid::class])->group(function(){
    Route::get('check',function(){
        return "Access granted";
    });
Route::get('/home', [HomeController::class, 'home'])->name('dashboard');
Route::get('/home/addAssetType', [AssetTypeController::class, 'addAssetType']);
Route::post('/home/postaddAssetType', [AssetTypeController::class, 'postaddAssetType']);
Route::get('/home/showAssetType', [AssetTypeController::class, 'showAssetType']);
Route::get('/home/AssetType', [AssetTypeController::class, 'AssetType']);
Route::get('/home/deleteAssetType/{id}', [AssetTypeController::class, 'deleteAssetType']);
Route::get('/home/editAssetType/{id}', [AssetTypeController::class, 'editAssetType']);
Route::post('/home/updateAssetType', [AssetTypeController::class, 'updateAssetType']);
Route::get('/home/listAssetType', [AssetTypeController::class, 'listAssetType']);
Route::get('/home/downloadcsv', [HomeController::class, 'downloadcsv']);

Route::get('/show',[AssetController::class,'show']);
Route::get('/home/addAsset', [AssetController::class, 'addAsset']);
Route::post('/home/postaddAsset', [AssetController::class, 'postaddAsset']);
Route::get('/home/showAsset', [AssetController::class, 'showAsset']);
Route::get('/home/deleteAsset/{id}', [AssetController::class, 'deleteAsset']);
Route::get('/home/editAsset/{id}', [AssetController::class, 'editAsset']);
Route::post('/home/updateAsset', [AssetController::class, 'updateAsset']);
Route::get('/home/listAsset', [AssetController::class, 'listAsset']);
Route::get('/home/displayAssetImages/{id}', [AssetController::class, 'displayAssetImages']);

Route::get('/home/pie', [HomeController::class, 'pie']);



});

