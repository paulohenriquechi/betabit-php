<?php
    $i = 0;
    $j = 0;
    
    echo "<h2>While</h2>";
    while($i<10){
        echo "<p>$i</p>";
        $i++;
    }

    echo "<h2>Do While</h2>";
    do{
        echo "<p>Número atual: $j</p>";
        $j++;
    }while($j<10);

    echo "<h2>For</h2>";
    for ($i=0; $i < 10; $i++) { 
        echo "<p>Número atual: $i</p>";
    }

    

?>