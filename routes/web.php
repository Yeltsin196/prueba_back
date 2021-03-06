<?php
use App\Pedidos;
use App\Productos;
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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/getapi','pedidosController@fetchMunicipios');

Route::group(['middleware' => ['auth']], function () {
    //
    Route::get('/crearPedido',function(){
        $productos= Productos::all();
         return view('crearPedido',['productos'=>$productos]);
     });

     Route::get('lista_productos','productosController@lista_productos');
     Route::get('lista_pedidos_producto/{producto_id?}','pedidosController@lista_pedidos_producto');
     Route::get('lista_pedidos','pedidosController@lista_pedidos');


     Route::get('busqueda','pedidosController@busqueda');

     
     Route::post('/crearPedido', 'pedidosController@crear');




});





