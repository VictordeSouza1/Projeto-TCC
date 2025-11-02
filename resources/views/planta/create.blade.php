<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Nova Planta</h1>
    <form action="{{route('planta.store')}}" method="POST" >
        @csrf
        <label>Nome:</label>
        <input type="text" name="nome" />
        <br>
        <label>Tipo:</label>
        <input type="text" name="tipo" />
        <br>
        <label>Descrição:</label>
        <input type="text" name="descricao" />
        <br>
        <input type="submit" value="Salvar" />
        <a href="{{route('planta.index')}}">Voltar</a>
    </form>
</body>
</html>