<?php
    if(isset($_GET['name'])){
        $name = $_GET['name'];
    }else{
        $name = "Home";
    }

    if(isset($_GET['color'])){
        $color = $_GET['color'];
    }else{
        $color = 'white';
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: <?php echo $color?>;
        }
    </style>
</head>
<body>
    <h1><?php echo $name;?> Page</h1>
    <a href="index.php?name=Home&color=blue">Go to Home</a>
    <a href="index.php?name=About&color=red">Go to About</a>
    <a href="index.php?name=Contact&color=green">Go to Contact</a>

    
</body>
</html>