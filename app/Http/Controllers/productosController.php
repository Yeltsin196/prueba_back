<?php

namespace App\Http\Controllers;
use App\Pedidos;
use App\Productos;
use Illuminate\Http\Request;

class productosController extends Controller
{
    //

    public function lista_productos(){

        //productos disponibles
        $productos=Productos::select('nombre','precio')->where('cantidad','>',0)->get();


       return view('lista_producto',["productos"=>$productos]);  
    }

    


}
