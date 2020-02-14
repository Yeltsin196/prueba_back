@extends('layouts.app')

@section('content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio</th>
    </tr>
  </thead>
  <tbody>
      @foreach($productos as $producto)
    <tr>
        
      <th scope="row">1</th>
      <td>{{$producto->nombre}}</td>
      <td>{{$producto->precio}}</td>
     
    </tr>
    @endforeach
  </tbody>
</table>


@endsection