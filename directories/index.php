<?php
    //cria pasta
    $pasta = "nome-da-pasta";
    if(!is_dir($pasta)){
        mkdir($pasta, 0755);
        //0755 é o código de privacidade da pasta
        //caso uma pasta seja criada dentro de outra, é necessário passar um parâmetro a mais como true
    }else{
        rmdir($pasta);
        //remove a pasta apenas se ela tiver vazia
    }

    

?>