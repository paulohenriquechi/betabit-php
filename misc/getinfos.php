<?php
    if(isset($_GET['name'])&&isset($_GET['age'])){
        $name = $_GET['name'];
        $age = $_GET['age'];
        echo "<h2>
        Formulário enviado com Sucesso!
        <br>
        Nome: $name
        <br>
        Idade: $age
        </h2>";
    }else{
        echo "<h2>Não foi possível enviar o formulário</h2>";
    }

?>