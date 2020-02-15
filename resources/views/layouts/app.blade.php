<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li>

                            <a href="/crearPedido">Crear Pedido</a>
                        </li>
                        <li>
                            <a href="/home">Home</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>


    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        var el = document.getElementById('departamentos');
        if (el) {


            document.getElementById('departamentos').addEventListener('change', function() {
                var vale=this.value;
                vale= vale.trim();
               


                <?php if (!isset($Municipios) && !isset($Departamentos)) {
                    $Municipios = array();
                    $Departamentos = array();
                }
                ?>
                var array_js = <?php echo json_encode($Departamentos) ?>;
               
                var array_js1 = <?php echo json_encode($Municipios) ?>

                var municipios = [];
                var codigo = [];


                array_js1.forEach(function(valor, indice, array) {

                   
                    if (valor['departamento'] == vale) {
                        
                        municipios.push(valor['municipio']);
                      
                        codigo.push(valor['c_digo_dane_del_municipio']);


                    }
                });
              
                 cargar(municipios,codigo);
               


            });

            function cargar(municipios, codigo) {
                  //  var provincias = ["Cantabria", "Asturias", "Galicia", "Andalucia", "Extremadura"]; //Tu array de provincias
                   var select = document.getElementById('municipios'); //Seleccionamos el select
                   for (let i = select.options.length; i >= 0; i--) {
                         select.remove(i);
                    }
                   for (var i = 0; i < municipios.length; i++) {
                       var option = document.createElement("option"); //Creamos la opcion
                       option.innerHTML = municipios[i]; //Metemos el texto en la opción
                       option.value = codigo[i];
                     
                       select.appendChild(option); //Metemos la opción en el select
                   } 
            }
        }
    </script>
</body>

</html>