<?php

    $a = 10;
    $b = 20;

    function soma(){
        global $a, $b, $c;
        $c = $a+$b;
    }

    // soma();
    // echo $c."<br>";

    echo $_SERVER['PHP_SELF']."<br>";
    echo $_SERVER['SERVER_NAME']."<br>";
    echo $_SERVER['HTTP_HOST']."<br>";
    echo $_SERVER['REMOTE_ADDR']."<br>";
    echo $_SERVER['HTTP_USER_AGENT']."<br>";
?>