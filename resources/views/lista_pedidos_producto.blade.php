@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">

  <table class=" table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Valor</th>
      <th scope="col">Fecha</th>
    </tr>
  </thead>
  <tbody>
   <?php $i=1;?>
      @foreach($pedidos as $pedido)
    <tr>
     
      <th scope="row">{{$i}}</th>
      <?php $i++;?>
      <td>   {{$pedido->cantidad}}</td>
      <td>   {{$pedido->valor}}</td>
      <td>   {{$pedido->created_at}}</td>
    </tr>
    @endforeach
    
    
  </tbody>
</table>

  </div>
</div>


@endsection