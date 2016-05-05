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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/create_order',['as'=>'create_order', function ()
{
    return view('create_order');
}]);
Route::post('/create_order','CreateOrderController@store');
//Route::get('/product','ProductController@show');
//Route::post('/product','ProductController@store');
//Route::get('/add_product',function()
//{
//    return view('add-product');
//});
Route::get('/add_product','ProductController@create');

Route::resource('products','ProductController');
//Student
Route::resource('students','StudentController');
Route::get('/about',function()
{
    $name='<span style="color:green">Hlong</span>';
    return view('about')->with('name',$name);
});



Route::get('/order','CreateOrderController@index');
Route::get('/order/{id}','CreateOrderController@show');

Route::get('/coop_division',function(){
   return view('coop_division.index');
});
Route::get('/test2',function(){
    return view('coop_division.test2');
});
Route::get('/student',function(){
   return view('coop_division.student');
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
