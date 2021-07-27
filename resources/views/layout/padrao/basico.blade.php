<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="{{ asset('js/validacaoExcluir.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/basico.css') }} ">
    <title>@yield('titulo')</title>
</head>
<body>
    <img class="img_background" src="{{ asset('imgs/background.png') }}" alt="">
    <div style="height: @yield('altura');width: @yield('largura')" class="box_principal">
    <h1>@yield('h1')</h1>
    @yield('conteudo')
    </div>
</body>
</html>