<?php

use Illuminate\Support\Facades\Route;

//Controller
use App\Http\Controllers\CountryController;

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


//Mostrar Funcionalidad de API
Route::get('/api', function () {

    $texto = '<h1>Detalle de desarrollo de la API<h1>';
    $texto = $texto . '<h2>Consumo de datos<h2>';
    $texto = $texto . '<h3>Country<h3>';
    $texto = $texto . '<h3>============================================================================<h3>';
    $texto = $texto . "      get('/country/all', [CountryController::class, 'all']);";
    $texto = $texto . "</br> get('/country/id/{idCountry}', [CountryController::class, 'getDataXIdCountry']);";
    $texto = $texto . "</br> get('/country/name/{name}', [CountryController::class, 'getDataXName']);";
    $texto = $texto . "</br> get('/country/currency/{currency}', [CountryController::class, 'getDataXCurrency']);";
    $texto = $texto . "</br> post('/country', [CountryController::class, 'create']);";
    $texto = $texto . "</br> delete('/country/{idCountry}', [CountryController::class, 'destroyXIdCountry']);";
    $texto = $texto . '<h3>============================================================================<h3>';

    $texto = $texto . '<h3>Region<h3>';
    $texto = $texto . '<h3>============================================================================<h3>';
    $texto = $texto . "      get('/region/all', [RegionController::class, 'all']);";
    $texto = $texto . "</br> get('/region/id/{idRegion}', [RegionController::class, 'getDataXIdRegion']);";
    $texto = $texto . "</br> get('/region/name/{name}', [RegionController::class, 'getDataXName']);";
    $texto = $texto . "</br> get('/region/country/{idCountry}', [RegionController::class, 'getDataXCountry']);";
    $texto = $texto . "</br> post('/region', [RegionController::class, 'create']);";
    $texto = $texto . "</br> delete('/region/{idRegion}', [RegionController::class, 'destroyXIdRegion']);";
    $texto = $texto . '<h3>============================================================================<h3>';
    return $texto;
});
