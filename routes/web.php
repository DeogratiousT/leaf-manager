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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::post('farmer-import', 'ImportExportController@farmerImport')->name('farmer-import');
    Route::post('grade-import', 'ImportExportController@gradeImport')->name('grade-import');

    Route::resource('users','UserController');
    Route::resource('farmers','FarmerController');
    Route::resource('products','ProductController');
    Route::resource('grades','GradeController');
    Route::resource('tobaccotypes','TobaccotypeController');
    Route::resource('customers','CustomerController');
    Route::resource('units','UnitController');
    Route::resource('counties','CountyController');
    Route::resource('counties.regions','RegionController');
    Route::resource('orders','OrderController');
    Route::resource('products.grades','ProductgradeController');
    Route::resource('cropyears','CropyearController');
    Route::resource('cropyears.recruitments','RecruitmentController');
    Route::resource('stations','StationController');
    Route::resource('stores','StoreController');
    Route::resource('lorries','LorryController');
    Route::resource('balereceptions','BalereceptionController');
    Route::resource('balereceptions.bales','BaleController');

    Route::get('allbales','AllBalesController@index')->name('allbales');

    Route::resource('farminputs','FarminputController');
    Route::resource('farmerinputs','FarmerinputController');
    Route::resource('loadings','LoadingController');
    Route::resource('offloadings','OffLoadingController');
    Route::resource('production-line-components','PLComponentController');
    Route::resource('orders.order-plcomponents','OrderPLComponentController');
    Route::resource('orders.packaging','PackagingController');

    Route::post('farmers/{id}/add-farmer-to-crop-year','FarmersInCropYearController@addFarmerToCropYear')->name('add-farmer-to-crop-year');
    Route::post('farmers/{id}/remove-farmer-from-crop-year','FarmersInCropYearController@removeFarmerFromCropYear')->name('remove-farmer-from-crop-year');

    Route::get('all-farmers/pdf','ReportGeneratorController@allfarmerspdf')->name('all-farmers-pdf');
    Route::get('all-farmers/excel','ReportGeneratorController@allfarmersexcel')->name('all-farmers-excel');
    
    Route::get('all-bales/pdf','ReportGeneratorController@allbalespdf')->name('all-bales-pdf');

    Route::get('farmer/{farmer}/activity','ReportGeneratorController@farmeractivitypdf')->name('farmer-activity');

    Route::get('cropyear/{croyear}/farmers/pdf','ReportGeneratorController@cropyearfarmerspdf')->name('cropyear-farmers-pdf');
    Route::get('cropyear/{croyear}/farmers/excel','ReportGeneratorController@cropyearfarmersexcel')->name('cropyear-farmers-excel');

    Route::get('farm-input-allocations/pdf','ReportGeneratorController@farminputallocationspdf')->name('farm-input-allocations-pdf');
    Route::get('farm-input-allocations/excel','ReportGeneratorController@farminputallocationsexcel')->name('farm-input-allocations-excel');

});