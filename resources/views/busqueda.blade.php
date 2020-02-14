@extends('layouts.app')

@section('content')

 <form action="{{ url('/lista_pedidos_producto') }}" method="GET">>
  
  <div class="form-group col-lg-4">
    <label for="exampleFormControlSelect1">Seleccion un Producto</label>
    <select class="form-control" id="exampleFormControlSelect1">
        @foreach($productos as $producto)
      
      <option>{{$producto->producto_id}}</option>
        @endforeach
    </select>
  </div>
  <button type="subtmit" class="btn btn-success"> Buscar Pedido</button>
</form>

@endsection