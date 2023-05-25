<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Tipos</title>
</head>
<body>
    <h1>Relatório de Tipos</h1>
    <hr>
        <table border="1" cellpadding="0" cellspacing="0" style="width: 100%">
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Icone</th>
            </tr>
        @forelse ($tipos as $tipo)
            <tr>
                <td>{{ $tipo->id }}</td>
                <td>{{ $tipo->titulo }}</td>
                <td>{{ $tipo->icone }}</td>
                <td>
                    <img src="{{ $logo }}">
                    <img src="{{ public_path('uploads/tipos/semfoto.jpg') }}">
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Nenhum tipo cadastrado</td>
            </tr>
        @endforelse
    </table>
</body>
</html>