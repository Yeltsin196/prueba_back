@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-6 col-lg-6 m-auto">
    <form action="{{ url('/lista_pedidos_producto') }}" method="GET">
  
  <div class="form-group ">
    <label for="exampleFormControlSelect1">Seleccion un Producto</label>
    <select class="form-control" id="exampleFormControlSelect1" name="producto_id">
        @foreach($productos as $producto)
      
      <option value="{{$producto->producto_id}}">{{$producto->producto_id}}</option>
        @endforeach
    </select>
  </div>
  <div>
  <button type="subtmit" class="btn btn-success"> Buscar Pedido</button>
  </div>
  
</form>

    </div>
  </div>
</div>
 
@endsection