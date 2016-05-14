<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/





//Document
Route::group(['prefix'=>'coop_division'],function(){

    /*Personnel*/
    Route::get('personnel/add_personnel','CoopDivision\PersonnelController@addPersonnel')->name('coop_division.personnel.add_new_personnel');
    Route::get('personnel/{id}','CoopDivision\PersonnelController@home')->name('coop_division.personnel.home');
    Route::resource('personnel','CoopDivision\PersonnelController');

    Route::get('documents/{division}','CoopDivision\DocumentController@home')->name('coop_division.documents.home');
    Route::get('documnets/add_newfile/{division}','CoopDivision\DocumentController@addNewFile')->name('coop_division.documents.add_new_file');
    Route::resource('documents','CoopDivision\DocumentController');

});










/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
