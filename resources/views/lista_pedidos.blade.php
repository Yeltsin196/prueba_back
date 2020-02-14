@extends('layouts.app')

@section('content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
    </tr>
  </thead>
  <tbody>
      @foreach($pedidos as $pedido)
    <tr>
        
      <th scope="row">1</th>
      <td>{{$pedido->cantidad}}</td>
      <td>{{$pedido->valor}}</td>
     
    </tr>
    @endforeach
  </tbody>
</table>

@endsection