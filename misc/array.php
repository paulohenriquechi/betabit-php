<?php 

    $numberList = array(1, 2, 3, 4, 5, 6);

    echo "<h2>Iteração ForEach: </h2>";
    foreach($numberList as $number){
        echo "<p>$number</p>";
    }

    echo "<br/><h2>Iteração For: </h2>";
    for($i = 0; $i<count($numberList); $i++){
        echo "<p>$numberList[$i]</p>";
    }

    $bandsList = ["Depeche Mode", "Silverstein", "Buck-Tick","Radiohead"];

    echo "<h2>Contagem de items do array</h2>".count($bandsList);

    echo "<h2>Arrays com chave/valor</h2>";
    $ageList = array("Henrique"=>20, "Paulo"=>50, "Elizabeth"=>55, "Livia"=>15);
    
    echo "<p>$ageList[Henrique]</p>";
    $ageList["Henrique"] = 25;
    echo "<p>Substituindo o valor da chave Henrique: $ageList[Henrique]</p>";

    echo "<h2>Iterando sobre Arrays com chave/valor</h2>";
    foreach($ageList as $name => $age){
        echo "<p>Nome: $name | Idade: $age</p>";
    }

    echo "<h2>Reorganizando em ordem alfabética/ascendente</h2>";
    sort($bandsList);
    foreach($bandsList as $band){
        echo "<p>$band</p>";
    }
    sort($numberList);
    foreach($numberList as $number){
        echo "<p>$number</p>";
    }
    
    echo "<h2>Reorganizando ao contrário</h2>";

    rsort($bandsList);
    foreach($bandsList as $band){
        echo "<p>$band</p>";
    }
    rsort($numberList);
    foreach($numberList as $number){
        echo "<p>$number</p>";
    }

    echo "<h2>Reorganizando Arrays com chave/valor com base no Value (asort())</h2>";
    asort($ageList);
    foreach($ageList as $name => $age){
        echo "<p>Nome: $name | Idade: $age</p>";
    }
    
    echo "<h2>Reorganizando Arrays com chave/valor com base na Key (ksort())</h2>";
    ksort($ageList);
    foreach($ageList as $name => $age){
        echo "<p>Nome: $name | Idade: $age</p>";
    }
?>