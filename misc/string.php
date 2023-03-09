<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <?php 
        $name = "Paulo Henrique";
        
        // string length
        $nameLength = strlen($name);
        
        // string word count
        $nameWordCount = str_word_count($name);
        
        // string reverse
        $nameReverse = strrev($name);

        // string position - casesensitive
        $nameHPosition = strpos($name, "H");
        $nameHenriquePosition = strpos($name, "Henrique");

        // string replace 
        $namePauloReplace = str_replace("Paulo", "Rick", $name);

        echo "<h1>Variavel utilizada: $name</h1>";
        echo "<h3>Tamanho da string: $nameLength</h3>";
        echo "<h3>Número de palavras: $nameWordCount</h3>";
        echo "<h3>String ao contrário: $nameReverse</h3>";
        echo "<h3>Posição do char H: $nameHPosition</h3>";
        echo "<h3>Index em que começa a palavra Henrique: $nameHenriquePosition</h3>";
        echo "<h3>Substituindo a palavra Paulo por Rick: $namePauloReplace</h3>";
    ?>
</body>
</html>