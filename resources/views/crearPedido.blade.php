@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-8 col-md-8 text-md-center">
   <form action="{{ url('/crearPedido') }}" method="POST">
   {{ csrf_field() }}
   <div class="form-group">
    <label for="exampleFormControlSelect1">Producto</label>
    <select class="form-control" id="exampleFormControlSelect1" name="producto_id">
      @foreach( $productos as $producto)
     
      <option value="{{$producto->id}}"> {{$producto->nombre}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Cantidad</label>
    <select class="form-control" id="exampleFormControlSelect1" name="cantidad">
      @for( $i=1;$i<=10;$i++)
     
      <option value="{{$i}}"> {{$i}}</option>
      @endfor
    </select>
  </div>
  
    <button type="subtmit" class="btn btn-success">Crear Pedido</button>
</form>

    </div>
  </div>
</div>

@endsection