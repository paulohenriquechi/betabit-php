<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 text-center">Multiple File Uploads</h1>
            <form action="" method="post" enctype="multipart/form-data" class="m-3">
                <div class="input-group">
                    <!-- adicionar "multiple" e [] após o "name"     -->
                    <input type="file" class="form-control" name="arquivo[]" id="arquivo"  aria-describedby="arquivo" aria-label="Upload" multiple required>
                    <button class="btn btn-primary" type="submit" name="enviar" id="enviar">Enviar</button>
                </div>
            </form>
    </div>

    <?php

        function reArrayFiles(&$file_post) {

            $file_ary = array();
            $file_count = count($file_post['name']);
            $file_keys = array_keys($file_post);
        
            for ($i=0; $i<$file_count; $i++) {
                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $file_post[$key][$i];
                }
            }
        
            return $file_ary;
        }

        //validações
        if(isset($_POST['enviar'])){
            // echo "<pre>";
            // var_dump($_FILES);
            // echo "<pre>";

            $arquivoArray = reArrayFiles($_FILES['arquivo']);
            foreach ($arquivoArray as $arquivo) {
                //tamanho do arquivo, deverá ser passado em bytes após efetuar a conversão 1MB -> 1048576B (binario)  
                $tamanhoMax = 2097152; //2mb max
            
                //tipos de arquivos permitidos, a extensão deverá ser passada em um array
                $permitido = array("jpg", "png", "jpeg", "mp4");

                //verificando a extensão do arquivo, ao enviar um arquivo, com vardump, podemos ver o caminho que é um array com 6 key/value dentro
                $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);

                $nomeArquivo = $arquivo['name'];
                if($arquivo['size']>=$tamanhoMax){
                    //se o tamanho do arquivo é maior que o tamanho máximo permitido
                    echo "<div class='alert alert-danger' role='alert'>
                            Tamanho máximo permitido de 2MB, não foi possível fazer upload do item $nomeArquivo.
                        </div>";
                }   else{
                    //se a extensão do arquivo é valida entre as extensões permitidas
                    if(in_array($extensao, $permitido)){
                        $pasta = 'imagens/';
                        if(!is_dir($pasta)){
                            //se já existe uma pasta para salvar os arquivos
                            mkdir($pasta, 0755);
                        }
                        $temp = $arquivo['tmp_name'];
                        //renomeando o arquivo com um id único
                        $novoNome = uniqid().".$extensao";
                        if(move_uploaded_file($temp, $pasta.$novoNome)){
                            echo "<div class='alert alert-success' role='alert'>
                                    Upload realizado com sucesso.
                                </div>";
                            
                            echo "<div class='card' style='width: 18rem;'>
                                    <img src='".$pasta.$novoNome."' class='card-img-top'>
                                    <div class='card-body'>
                                        <p class='card-text'>$nomeArquivo</p>
                                    </div>
                                </div>";
                        }else{
                            echo "<div class='alert alert-danger' role='alert'>
                                    Não foi possível realizar o upload do item $nomeArquivo. 
                                </div>";
                        }
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>
                                Tipo de arquivo inválido ($extensao), não foi possivel fazer upload do item $nomeArquivo.
                            </div>";
                    
                }
            }
            }
        }

    ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>