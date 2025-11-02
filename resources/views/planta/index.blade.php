<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Lidta de Plantas</h1>
    <a href="{{ route('planta.create') }}">Cadastrar Planta</a>
    <table style="border: 1px solid black;">
        <thead>
            <th>NOME</th>
            <th>TIPO</th>
            <th>DESCRIÇÃO</th>
            <th>AÇÕES</th>
        </thead>
        <tbody>
            @foreach ($plantas as $planta)
                <tr>
                    <td>{{ $planta->nome }}</td>
                    <td>{{ $planta->tipo }}</td>
                    <td>{{ $planta->descricao }}</td>
                    <td>
                        <a href="{{route('planta.show', $planta->id)}}">Mais Info</a>
                        <a href="{{route('planta.edit', $planta->id)}}">Alterar</a>
                        <form action="{{route('planta.destroy', $planta->id)}}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Remover" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>