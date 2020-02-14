<?php

namespace App\Http\Controllers;
use App\Pedidos;
use App\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pedidosController extends Controller
{
    //
    public function __construct()
        {
            $this->middleware('auth');
        }
    public function fetchMunicipios(){
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://www.datos.gov.co/resource/xdk5-pm3f.json');
        $response = $request->getBody()->getContents();
       
       $response2= json_decode($response, true);
      /*  $arraya= array();
        foreach ($response2 as $municipio){
               $departamento=  $municipio["departamento"];
               $this->verificar($departamento);
       }  */


       return $response2;
    }
    public function verificar(){

    }


    public function crear(Request $request ){

        $producto_id=$request["producto_id"];
        $cantidad=$request["cantidad"];

        
        $producto=Productos::find($producto_id);
        
        $cantidadp=$producto->value('cantidad');
        
        $cantidadp=$cantidadp-$cantidad;

        $producto->update([
            'cantidad'=> $cantidadp
        ]);
        


        
        $precio=$producto->value('precio');
      
        $pedidos= new Pedidos();

        $pedidos->cantidad=$cantidad;
        $pedidos->valor=$cantidad*$precio;
     
        $pedidos->producto_id=$producto_id;
        $pedidos->user_id=Auth::id();
        $pedidos->save();

        

        //return view('home');
        return redirect()->action('HomeController@index');
    }


    public function lista_pedidos(){
    }

    public function busqueda(){

        $array=Pedidos::join('productos', 'pedidos.producto_id', '=', 'productos.id')
        ->where('user_id',Auth::id())
        ->select('producto_id','user_id')
        ->groupBy('producto_id','user_id')
        ->get();
        
        return view('busqueda',["productos"=>$array]);
    }

    public function lista_pedidos_producto(){
        $id=1;
        $pedidos=Pedidos::where('producto_id',$id)->get();
        return view('lista_pedidos_producto',["pedidos"=>$pedidos]);
    }





}
