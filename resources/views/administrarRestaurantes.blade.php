<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Administrador de Restaurantes</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        {{-- <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style> --}}
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Administrador de restaurantes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index">Listar Restaurantes <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#">Reservar mesa</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Listar Reservas
                  </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="restaurantes/create">Crear Restaurantes <span class="sr-only">(current)</span></a>
                  </li>
              </ul>

            </div>
          </nav>
        <br><br>
            <form action="{{ url('/restaurantes') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <br>
                <label for="nombre">{{'Nombre'}}</label>
                <input type="text" name="nombre" id="nombre" value="">
                <br>
                <label for="descripcion">{{'Descripción'}}</label>
                <input type="text" name="descripcion" id="descripcion" value="">
                <br>
                <label for="direccion">{{'Dirección'}}</label>
                <input type="text" name="direccion" id="direccion" value="">
                <br>
                <label for="ciudad">{{'Ciudad'}}</label>
                <input type="text" name="ciudad" id="ciudad" value="">
                <br>
                <label for="urlfoto">{{'Foto de Restaurante'}}</label>
                <input type="file" name="urlfoto" id="urlfoto" value="">
                <br><br>
                <input type="submit" value="Crear">
            </form>
            <br>
            <br>
            <br>

 {{--  listando restaurantes  --}}

 <table class="table table-light">
    <thead class="thead-light">
      <th>Código</th>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>Dirección</th>
      <th>Ciudad</th>
      <th>Foto</th>
    </thead>

    <tbody>
      @foreach($restaurantes as $restaurante)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$restaurante->nombre}}</td>
        <td>{{$restaurante->descripcion}}</td>
        <td>{{$restaurante->direccion}}</td>
        <td>{{$restaurante->ciudad}}</td>
        <td>
            <img src="{{asset('storage'). '/'. $restaurante->urlfoto}}" alt="" height="200">
        </td>
        <td>
            <a href="{{url('/restaurantes/'.$restaurante->id.'/edit')}}">
                Editar
            </a>
            <form action="{{url('/restaurantes/'.$restaurante->id)}}" method="POST">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" onclick="return confirm('¿Eliminar?');">Eliminar</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
        {{--  <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Administrar restaurantes
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>  --}}
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
