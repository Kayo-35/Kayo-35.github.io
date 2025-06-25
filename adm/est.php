<?php
//Trecho destinado a exibição de estatísticas
include "conexao.php";
$sqlEst =
    "
select
    sec_to_time(count(f.cd_matricula)*8*3600) as 'Horas Contratuais',
    sec_to_time(sum(time_to_sec(timediff(saida.hr_ponto, entrada.hr_ponto)))) as 'horas trabalhadas',
    TIMEDIFF(SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(saida.hr_ponto, entrada.hr_ponto)))),sec_to_time(count(f.cd_matricula)*8*3600)) as 'balanço'

    from funcionario as f
    inner join ponto as entrada on entrada.cd_funcionario = f.cd_matricula and entrada.cd_tipo = 1
    inner join ponto as saida on saida.cd_funcionario = f.cd_matricula and saida.cd_tipo = 2

    where f.cd_matricula = " .
    $_SESSION["matricula"] .
    " and saida.dt_ponto = entrada.dt_ponto;";
$resEst = $con->query($sqlEst);

if ($resEst->num_rows > 0) {
    echo "
    <table class='table text-center'>
        <thead class='table-primary'>
            <th scope='col'>Horas contratadas</th>
            <th scope='col'>Horas trabalhadas</th>
            <th scope='col'>Balanço</th>
        </thead>
        <tbody>
    ";

    while ($tupla = $resEst->fetch_object()) {
        echo "
            <tr>
                <td scope='col'>" .
            $tupla->{'Horas Contratuais'} .
            "</td>
                <td scope='col'>" .
            $tupla->{'horas trabalhadas'} .
            "</td>
        ";
        $temp = strtotime($tupla->{'balanço'});
        if ($temp < 0) {
            echo "<td scope='col' class='text-danger'>" .
                $tupla->{'balanço'} .
                "</td></tr>";
        } else {
            echo "<td scope='col' class='text-success'>" .
                $tupla->{'balanço'} .
                "</td></tr>";
        }
    }
    echo "</tbody></table>";
}
?>
