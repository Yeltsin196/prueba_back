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
  <?php $i = 1; ?>
    @foreach($productos as $producto)
    <tr>
      

      <th scope="row"> {{$i}}</th>
      <?php $i++; ?>
      <td>{{$producto->nombre}}</td>
      <td>{{$producto->precio}}</td>

    </tr>
    @endforeach
  </tbody>
</table>


@endsection