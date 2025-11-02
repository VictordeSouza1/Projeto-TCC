<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Informações da Planta</h1>
    <h3>{{$planta->id}}</h3>
    <h3>{{$planta->nome}}</h3>
    <h3>{{$planta->tipo}}</h3>
    <h3>{{$planta->descricao}}</h3>
    <a href="{{route('planta.index')}}">Voltar</a>
</body>
</html>