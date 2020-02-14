@extends('layouts.app')

@section('content')


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Valor</th>
      <th scope="col">Fecha</th>
    </tr>
  </thead>
  <tbody>
      @foreach($pedidos as $pedido)
    <tr>
     
      <th scope="row">1</th>
      <td>   {{$pedido->cantidad}}</td>
      <td>   {{$pedido->valor}}</td>
      <td>   {{$pedido->created_at}}</td>
    </tr>
    @endforeach
    
    
  </tbody>
</table>

<a href="/home" class="btn btn-success">Home</a>

@endsection