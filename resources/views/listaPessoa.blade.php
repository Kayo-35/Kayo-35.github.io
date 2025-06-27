@extends('base')
@section('conteudo')
<div class="container my-3">
    <h3>Pessoas Cadastradas</h3>
    <table class="table">
        <theader">
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Data de Nascimento</th>
            <tr>
        </theader>
        <tbody>
            @foreach($saida as $p)
            <tr>
                <td>{{ $p->nm_pessoa }}</td>
                <td>{{ $p->nm_email }}</td>
                <td>{{ $p->dt_nascimento }}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
