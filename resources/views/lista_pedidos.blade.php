@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
      <div class="col-6 col-lg-6 m-auto">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
      @foreach($pedidos as $pedido)
    <tr>
    
  
      <th scope="row">  {{$i}}</th>
      <?php $i++; ?>
      <td>{{$pedido->cantidad}}</td>
      <td>{{$pedido->valor}}</td>
     
    </tr>
    @endforeach
  </tbody>
</table>
      </div>
  </div>
</div>


@endsection