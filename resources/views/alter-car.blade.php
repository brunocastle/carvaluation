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
            <br>
            <div>
                <form method="POST"
                      action="{{route('car.update', $car->id)}}"
                      enctype="multipart/form-data">
                    {!! method_field('put') !!}
                    {{ csrf_field() }}

                    <fieldset>
                        <legend>| ALTERAR CADASTRO |</legend>

                        <label for="brand">Marca</label>
                        <input type="text" name="brand"
                               class="form-control"
                               value="{{$car->brand}}"
                               required>

                        <label for="model">Modelo</label>
                        <input type="text" name="model"
                               class="form-control"
                               value="{{$car->model}}"
                               required>
                        <br/>
                        <label for="year">Ano</label>
                        <input type="text" name="year"
                               class="form-control"
                               value="{{$car->year}}"
                               required>

                        <label for="valuation"> Valor FIPE </label>
                        <input type="number" name="valuation"
                               class="form-control"
                               value="{{$car->valuation}}"
                               required>
                        <br/>
                        <label for="description">Descrição</label>
                        <input type="text" name="description"
                               class="form-control"
                               value="{{$car->description}}">


                    </fieldset>

                    <button type="reset">
                        Redefinir
                    </button>
                    <button type="submit">
                        Cadastrar
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
</body>
</html>