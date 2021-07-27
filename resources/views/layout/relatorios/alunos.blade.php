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
    <h1>Alunos @isset($id)
        Turma {{$id}}
    @endisset</h1>
    <table class="content" border="1">
        <tr>
            <th>Matricula</th>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Nascimento</th>
            <th>Cidade</th>
            <th>Bairro</th>
            <th>Rua</th>
            <th>Número</th>
            <th>Complemento</th>
            <th>Turma</th>
        </tr>

        @foreach ($alunos as $aluno)
            <tr class="row">
                <td>{{ $aluno->id }}</td>
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->sexo }}</td>
                <td>{{ date('d-m-Y', strtotime($aluno->nascimento)) }}</td>
                <td>{{ $aluno->cidade }}</td>
                <td>{{ $aluno->bairro }}</td>
                <td>{{ $aluno->rua }}</td>
                <td>{{ $aluno->numero }}</td>
                <td>{{ $aluno->complemento }}</td>
                <td>{{ $aluno->id_turma }}</td>
            </tr>
        @endforeach

</body>

</html>
