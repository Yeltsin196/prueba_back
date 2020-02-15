@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                       
                    @endif

                    You are logged in!
                   
                    <div class="container">
                        <div class="row">
                            <a href="/lista_productos" class="btn btn-warning ml-2">Lista de productos disponibles</a>
                            <a href="/lista_pedidos" class="btn btn-primary">Lista de pedidos</a>
                            <a href="/busqueda" class="btn btn-info">Lista de pedidos por producto</a>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
