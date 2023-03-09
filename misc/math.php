<?php 
    echo "<h1>Math Functions</h1>";

    $list = [1, 9, -2, 8, -3, 7, 4, -6, 5, 0];
    $number = 25.5;

    //min value
    $listMin = min($list);

    //max value
    $listMax = max($list);

    //absolute value - converte o número para positivo
    $numberAbsolute = abs($number);

    //square root
    $numberSqrt = sqrt($number);

    //round - .50 arredonda pra cima, .49 arredonda pra baixo
    $numberRounded = round($number);

    //random - nos parametros, podemos passar o range
    $numberRandom = rand(1, 10);

    echo "<h3>Menor número da lista: $listMin</h3>";

    echo "<h3>Maior número da lista: $listMax</h3>";
    echo "<h3>Valor original: $number Valor absoluto: $numberAbsolute</h3>";
    echo "<h3>Raiz quadrada: $numberSqrt</h3>";
    echo "<h3>Valor arredondado: $numberRounded</h3>";
    echo "<h3>Número aleatório: $numberRandom</h3>";


?>
