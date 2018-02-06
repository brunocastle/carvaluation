<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                    @endauth
        </div>
    @endif

    <div class="content">
        <div class="m-b-md">
            <a href="/" class="title">Hello, World</a>
            <p class="subtitle">Cadastro de Carros e tabela FIPE</p>
        </div>

        <div class="links">
            <a href="/car/create">Cadastrar</a>
            <a href="/car">Índice</a>
        </div>

        <div>
            <p class="subtitle">Carros Registrados ({{$total}})</p>
            <div>
                @foreach($car as $car)
                    <fieldset id="listing">
                        <legend>
                            | {{$car->brand}} - {{$car->model}} - {{$car->year}} |
                        </legend>
                        <br/>
                        Valor Médio - R$ {{number_format($car->valuation, 2,',','.')}}
                        <br/><br/>
                        {{$car->description,20,"\n",false}}
                        <br/>
                        <br/>

                        <button>
                        <a class="content" href="{{route('car.edit', $car->id)}}"
                           data-toggle="tooltip"
                           data-placement="top"
                           title="Alterar">Editar</a>
                        </button>
                        <br/><br/>
                        <form method="POST"
                              action="{{route('car.destroy', $car->id)}}"
                              data-toggle="tooltip"
                              data-placement="top"
                              title="Excluir"
                              onsubmit="return confirm('Confirma exclusão?')">
                            {{method_field('DELETE')}}{{ csrf_field() }}

                            <button type="submit">
                                <a>Excluir</a>
                            </button>
                        </form>

                    </fieldset>
                    <br/>
                @endforeach
            </div>
        </div>
    </div>
</div>
</body>
</html>