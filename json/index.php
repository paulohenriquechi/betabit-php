<?php
    $texto = '
    {
        "cep": "01001-000",
        "logradouro": "Praça da Sé",
        "complemento": "lado ímpar",
        "bairro": "Sé",
        "localidade": "São Paulo",
        "uf": "SP",
        "ibge": "3550308",
        "gia": "1004",
        "ddd": "11",
        "siafi": "7107"
      }
    ';
    
    $dados = json_decode($texto, true);
    $dados['pais'] = "Brasil";
    $json = json_encode($dados, JSON_PRETTY_PRINT);
    echo $json;
?>