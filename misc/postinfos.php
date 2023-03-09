<?php 
        if(isset($_POST['name'])&&isset($_POST['age'])){
            $name = clearPost($_POST['name']);
            $age = clearPost($_POST['age']);
            echo "<h2>Nome: $name Idade: $age</h2>";
        }
        function clearPost($value){
            $value = trim($value);
            $value = stripcslashes($value);
            $value = htmlspecialchars($value);
            return $value;
        }
    ?>