<?php
    //Data
    echo "Data: ".date('d/m/Y')."<br>";

    //Hora
    echo "Hora: ".date('H/i')."<br>";

    //Calculo de dias, utilizamos o padrão americano ano/mes/dia
    $hoje = date('Y/m/d');
    $vencimento = '2023-10-01';
    //fazemos a conversão de string para tempo
    $diferenca = strtotime($vencimento)-strtotime($hoje);
    $dias = floor($diferenca / (60*60*24));

    //convertendo para o padrão brasileiro
    $data_hoje = explode('/', $hoje);
    $hoje_formatado = $data_hoje[2]."/".$data_hoje[1]."/".$data_hoje[0];
    echo $hoje_formatado;
?>