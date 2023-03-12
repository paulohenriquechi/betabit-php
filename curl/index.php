<?php
    // //GET - recebendo informações 

    // //pegando os dados da url através em formato de string

    // //inicializando
    // $ch = curl_init();

    // //configurando o cURL
    
    // //defininindo a url que queremos puxar informações
    // curl_setopt($ch, CURLOPT_URL, "https://viacep.com.br/ws/85802000/json/");
    
    // //defininindo que o retorno será em forma de string
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // //executando o curl
    // $retorno = curl_exec($ch);

    // //fechando o curl
    // curl_close($ch);
    
    // //conversão de string para objeto php
    // $dados = json_decode($retorno);
    // echo $dados->localidade;

    //POST - enviando informações e recebendo resposta
    
    //inicializando
    $ch = curl_init();

    //defininindo a url que queremos enviar as informações
    curl_setopt($ch, CURLOPT_URL, "http://localhost/aula-php/curl/teste.php");

    //configurando para que o metodo seja POST (default: GET)
    curl_setopt($ch, CURLOPT_POST, 1);

    //informações que desejamos enviar, http_build_query com um array dentro contendo chave/valor das informações
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(
        array("valor1" => "Henrique",
              "valor2" => "Chi")
    ));

    //defininindo que o retorno será em forma de string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    //executando o curl
    $resultado = curl_exec($ch);

    //fechando o curl
    curl_close($ch);

    //mostrando o retorno
    echo $resultado;
?>

