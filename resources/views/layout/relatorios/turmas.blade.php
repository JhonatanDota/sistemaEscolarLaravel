<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        h1{
            text-align: center
        }
        table.content {
            border: #000000;
            width: 100%;
            border-collapse: collapse;
            padding: 0px;
            margin: 0px;
            font-size: 14px;
        }

        .content th {
            padding: 10px;
            background-color: #37413d;
            color: white;
            border: solid 1px #000000;
        }

        td{
            padding: 5px;
            height: 80px;
        }

        .content .row {
            text-align: center;
            border-top: solid 1px #000000;
        }

    </style>
    <title>Document</title>
</head>

<body>
    <h1>Turmas</h1>
    <table class="content" border="1">
        <tr>
            <th>Id</th>
            <th>Professor</th>
            <th>Quantidade de Vagas</th>
            <th>Descrição</th>
        </tr>

        @foreach ($turmas as $turma)
            <tr class="row">
                <td>{{ $turma->id }}</td>
                <td>{{ $turma->professor }}</td>
                <td>{{ $turma->quantidade_vagas}}</td>
                <td>{{ $turma->descricao }}</td>
            </tr>
        @endforeach

</body>

</html>
