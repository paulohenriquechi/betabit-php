<?php
    //criação de cookies - key, value, expiration - time(): retorna o horário atual, 86400: 24h
    setcookie('nome', 'Henrique', time()+(86400*30)); //30 dias
    // setcookie('nome', '', time()-3600);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>
    <?php
        // if(isset($_COOKIE['nome'])){
        //     echo $_COOKIE['nome'];
        // }else{
        //     echo "Não há cookies";
        // }

        if(count($_COOKIE)>0){
            echo "Tem cookies";
        }else{
            echo "Não tem cookies";
        }

    ?>
</body>
</html>