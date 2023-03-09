<?php
    // fopen(nome, mode) -> Abrir/Criar, se o arquivo existir ele abre, se não existir ele cria;
    // fwrite(arquivo, conteudo) -> Escrever no arquivo;
    // fclose(arquivo) -> Fechar o arquivo;
    // feof() -> Durante a leitura, avisa que chegou ao final;
    // fgets() -> pega uma linha do arquivo até no maximo 1024 bytes
    // file_put_contents() -> Cria arquivo/Sobrescreve
    // file_get_contents() -> Pega todo conteudo de um arquivo e colocar em uma string unica
    // unlink(arquivo) -> Deleta um arquivo;
    // copy(arquivo, nomecopia) -> copiar arquivo;
    // file_exists(arquivo) -> verifica se o arquivo existe
    // is_file(arquivo)
    // scandir(pasta) -> retorna todos os arquivos da pasta

    $pasta = "arquivos/";
    if(!is_dir($pasta)){
        mkdir($pasta, 0755);
    }

    $nome_arquivo = date('y-m-d-H-i-s').".txt";
    $arquivo = fopen($pasta.$nome_arquivo, 'a+');
    fwrite($arquivo, "Linha 1".PHP_EOL);
    fwrite($arquivo, "Linha 2".PHP_EOL);
    fwrite($arquivo, "Linha 3".PHP_EOL);
    fclose($arquivo);

    $pathArquivo = $pasta.$nome_arquivo;

    // if(file_exists($pathArquivo)&&is_file($pathArquivo)){
    //     // $abrirArquivo = fopen($pathArquivo, 'r');

    //     // while(!feof($abrirArquivo)){
    //     //     echo fgets($abrirArquivo);
    //     // }
    //     // fclose($abrirArquivo);
    //     echo file_get_contents($pathArquivo);
    // }

    if(is_dir($pasta)){
        foreach(scandir($pasta) as $file){
            $path = $pasta.$file;
            if(is_file($path)){
                unlink($path);
            }
        }
        rmdir($pasta);
    }
?>