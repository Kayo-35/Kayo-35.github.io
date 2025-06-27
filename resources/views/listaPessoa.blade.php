@extends('base')
@section('conteudo')
    <table class="table">
        <theader class="table-primary">
            <th>Nome</th>
            <th>E-mail</th>
        </theader>
        <tbody>
            @foreach($saida as $p)
                <td>$p->nm_pessoa</td>
                <td>$p->nm_email</td>
            @endforeach
        </tbody>
    </table>
@stop
