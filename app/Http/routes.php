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

Route::group(['prefix'=>'coop_division'],function(){
    /*Content*/
    /*Personnel*/
    Route::get('personnel/add_personnel','CoopDivision\PersonnelController@addPersonnel')->name('coop_division.personnel.add_new_personnel');
    Route::get('personnel/{id}','CoopDivision\PersonnelController@home')->name('coop_division.personnel.home');


    /*Document*/
    Route::get('documents/{division}','CoopDivision\DocumentController@home')->name('coop_division.documents.home');
    Route::resource('documents','CoopDivision\DocumentController');
});



/*Admin*/
// Route::group(['middleware'=>'guest'],function(){
//    Route::get('admin/tt','Admin\PersonnelController@dashBoard');
//});


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

//Route::group(['middleware' => ['web']], function () {

//});


Route::group(['middleware'=>'web'],function(){

    Route::auth();

    Route::group(['prefix'=>'admin'],function(){

        /*Personnel*/
        Route::get('personnel_delete_division','Admin\PersonnelController@deleteDivision');
        Route::post('personnel_delete','Admin\PersonnelController@deletePersonnel');
        Route::get('divisions','Admin\PersonnelController@getDivisions');
        Route::resource('personnel','Admin\PersonnelController');

        /*Document*/
        Route::get('delete_document','Admin\DocumentController@deleteDocument');
        Route::resource('documents','Admin\DocumentController');

        /*Content Categories*/
        Route::resource('categories','Admin\CategoryController');

        /*Contents*/
        Route::resource('contents','Admin\ContentController');



    });

    Route::get('/home', 'HomeController@index');
    Route::get('admin','Admin\PersonnelController@dashBoard');

    /*Coop_Division*/
    Route::get('coop_division',function(){
        return view('coop_division.index');
    });
    Route::resource('coop_division/personnel','CoopDivision\PersonnelController');


    Route::get('js/kcfinder/',function(){
       return view('login');
    });

});
