<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CountryController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TypeentryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\StateController;



//RUTAS PROTEGIDAS POR TOKEN
//===================================================================
Route::group(['middleware' => 'auth:api'], function () {

    //Country
    //=====================================
    Route::get('/country/all', [CountryController::class, 'show']);
    Route::get('/country/id/{idCountry}', [CountryController::class, 'showIdCountry']);
    Route::get('/country/name/{name}', [CountryController::class, 'showName']);
    Route::get('/country/currency/{currency}', [CountryController::class, 'showCurrency']);
    Route::post('/country', [CountryController::class, 'create']);
    Route::delete('/country/{idCountry}', [CountryController::class, 'destroy']);
    Route::put('/country', [CountryController::class, 'update']);

    //User
    //=====================================
    Route::get('/user/all', [UserController::class, 'show']);
    Route::get('/user/id/{idUser}', [UserController::class, 'showIdUser']);
    Route::get('/user/email/{email}', [UserController::class, 'showEmail']);
    Route::delete('/user/{idUser}', [UserController::class, 'destroy']);
    Route::put('/user', [UserController::class, 'update']);

    //Region
    //=====================================
    Route::get('/region/all', [RegionController::class, 'show']);
    Route::get('/region/id/{idRegion}', [RegionController::class, 'showIdRegion']);
    Route::get('/region/name/{name}', [RegionController::class, 'showName']);
    Route::get('/region/country/{idCountry}', [RegionController::class, 'showCountry']);
    Route::post('/region', [RegionController::class, 'create']);
    Route::delete('/region/{idRegion}', [RegionController::class, 'destroy']);
    Route::put('/region', [RegionController::class, 'update']);

    //Office
    //=====================================
    Route::get('/office/all', [OfficeController::class, 'show']);
    Route::get('/office/id/{idOffice}', [OfficeController::class, 'showIdOffice']);
    Route::get('/office/name/{name}', [OfficeController::class, 'showName']);
    Route::get('/office/region/{idRegion}', [OfficeController::class, 'showRegion']);
    Route::post('/office', [OfficeController::class, 'create']);
    Route::delete('/office/{idOffice}', [OfficeController::class, 'destroyXIdOffice']);
    Route::put('/office', [OfficeController::class, 'update']);
});



//RUTAS DE APLICACION NO PROTEGIDAS PARA ACCESO A OPERAR
//===================================================================
Route::get('/language/all', [LanguageController::class, 'show']);
Route::post('/user', [UserController::class, 'create']);
Route::post('/user/login', [UserController::class, 'login']); //Validar la clave este correcta






//PENDIENTE REVISION
//Type_entry
//=====================================
Route::get('/typeentry/all', [TypeentryController::class, 'all']);
Route::get('/typeentry/country/{idCountry}', [TypeentryController::class, 'getDataXidCountry']);
Route::post('/typeentry', [TypeentryController::class, 'create']);
Route::delete('/typeentry/{idTypeEntry}', [TypeentryController::class, 'destroyXIdTypeEntry']);

//Expense
//=====================================
Route::post('/expense/upload', [ExpenseController::class, 'uploadFile']);
Route::post('/expense', [ExpenseController::class, 'create']);
Route::put('/expense/state', [ExpenseController::class, 'updateState']);
Route::post('/expense/idUserDate', [ExpenseController::class, 'showIdUserDate']);
Route::post('/expense/countTotal', [ExpenseController::class, 'showIdUserDateCountTotal']);
Route::post('/expense/counttotalmonth', [ExpenseController::class, 'showIdUserMontDateCountTotal']);

//State
//=====================================
Route::post('/state/tableIdCountry', [StateController::class, 'showStateTableIdCountry']);



Route::post('/expense/excel', [ExpenseController::class, 'downloadExcel']);
