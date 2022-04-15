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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
ROute::get('/about', 'AboutController@index')->name('about');
ROute::get('/contacts', 'ContactController@index')->name('contacts');
ROute::post('/contacts/send', 'ContactController@send')->name('contacts.send');
ROute::get('/terms_and_conditions', 'TermController@index')->name('terms.index');
Route::get('/jewelleries/fillter/{type_id?}', 'JewelleryController@index')->name('allJewelleries');
Route::get('/jewelleries/{jewellery}', 'JewelleryController@show')->name('showJewellery');

Route::get('/collages', 'CollageController@index')->name('allCollages');
Route::get('/collages/{collage}', 'CollageController@show')->name('showCollage');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::resources([
        'jewelleries' => 'JewelleryController',
        'collages' => 'CollageController',
    ]);

    Route::get('info', 'InfoController@edit')->name('info.edit');
    Route::put('info/{info}', 'InfoController@update')->name('info.update');
    
    Route::get('/jewellery_types', 'JewelleryTypeController@index')->name('jewellery_types.index');
    Route::get('/set_jewellery_type_status/{jewellery_type}', 'JewelleryTypeController@changeStatus');

    Route::delete('/galleries/{gallery}', 'GalleryController@delete');

    Route::get('term', 'TermController@edit')->name('term.edit');
    Route::put('term/{term}', 'TermController@update')->name('term.update');




    Route::get('/', function() {
        return redirect()->route('jewelleries.index');
    });
});
