<?php
    require("db/conexao.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <style>
        table{
            border: 1px solid black;
            width: 90vw;
            text-align: center;
        }
        tr, th, td{
            border: 1px solid black;
        }
        .oculto{
            display: none;
        }

    </style>
</head>
<body>
    <form id="form_salva" action="" method="POST">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" required>
        <label for="email">Email: </label>
        <input type="email" name="email" required>
        <button type="submit" name="enviar">Enviar</button>
    </form>

    <form class="oculto" id="form_atualiza" action="" method="POST">
        <input type="hidden" name="id_editado" id="id_editado" required>
        <label placeholder="Editar Nome">Nome: </label>
        <input type="text" name="nome_editado" id="nome_editado" required>
        <label placeholder="Editar Email">Email: </label>
        <input type="email" name="email_editado" id="email_editado" required>
        <button type="submit" name="atualizar">Atualizar</button>
        <button type="button" name="cancelar" id="cancelar">Cancelar</button>
    </form>

    <form class="oculto" id="form_deleta" action="" method="POST">
        <input type="hidden" name="nome_deleta" id="nome_deleta">
        <input type="hidden" name="email_deleta" id="email_deleta">
        <input type="hidden" name="id_deleta" id="id_deleta" required>
        <b>Tem certeza que quer deletar o cliente <span id="cliente"></span>?</b>
        <button type="submit" name="deletar">Confirmar</button>
        <button type="button" name="cancelar_delete" id="cancelar_delete">Cancelar</button>
    </form>
    <?php
    //UPDATE 
    if(isset($_POST['atualizar'])&&isset($_POST['id_editado'])&&isset($_POST['nome_editado'])&&isset($_POST['email_editado'])){
        $id = limparPost($_POST['id_editado']);
        $nome = limparPost($_POST['nome_editado']);
        $email = limparPost($_POST['email_editado']);

        //validação de campo vazio ou inválido
        if($nome==""||$nome==null){
            echo "Nome não pode estar vazio";
            exit();
        }
        if($email==""||$email==null){
            echo "Email não pode estar vazio";
            exit();
        }
        if (!preg_match("/^[a-zA-Z-' ]*$/",$nome)) {
            echo "Somente permitido letras e espaços em branco";
            exit();
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Formato de email inválido";
            exit();
        }

        $sql = $pdo->prepare("UPDATE clientes SET nome=?, email=? WHERE id = ?");
        $sql->execute(array($nome, $email, $id));

        echo "Atualizado ".$sql->rowCount()." registros.";
    }
?>

<?php
    //DELETE
    if(isset($_POST['deletar'])&&isset($_POST['id_deleta'])&&isset($_POST['nome_deleta'])&&isset($_POST['email_deleta'])){
        $id = limparPost($_POST['id_deleta']);
        $nome = limparPost($_POST['nome_deleta']);
        $email = limparPost($_POST['email_deleta']);

        $sql = $pdo->prepare("DELETE FROM clientes WHERE id=? AND nome=? AND email=?");
        $sql->execute(array($id, $nome, $email));

        echo "Deletado com sucesso.";
    }
?>

    <br>
    <?php
        //CREATE
        //inserindo dados no banco (Modo Simples)
        // $sql = $pdo->prepare("INSERT INTO clientes VALUES (null, 'Henrique', 'rick@gmail.com', '01-01-2023')");
        // $sql->execute();

        //SQL INJECTION (Modo seguro)
        if(isset($_POST["enviar"])&&$_POST["nome"]&&$_POST["email"]){
            $nome = limparPost($_POST["nome"]);
            $email = limparPost($_POST["email"]);
            $data = date("d-m-Y");

            //validação de campo vazio ou inválido
            if($nome==""||$nome==null){
                echo "Nome não pode estar vazio";
                exit();
            }
            if($email==""||$email==null){
                echo "Email não pode estar vazio";
                exit();
            }
            if (!preg_match("/^[a-zA-Z-' ]*$/",$nome)) {
                echo "Somente permitido letras e espaços em branco";
                exit();
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Formato de email inválido";
                exit();
            }

            $sql = $pdo->prepare("INSERT INTO clientes VALUES (null, ?, ?, ?)");
            $sql->execute(array($nome, $email, $data));

            echo "Cadastro efetuado com sucesso";
        }
    ?>

    <?php
        //SELECT
        //selecionando todos dados da tabela
        $sql = $pdo->prepare("SELECT *  FROM clientes ORDER BY nome DESC");
        $sql->execute();
        $dados = $sql->fetchAll();

        //selecionando dados filtrados da tabela
        // $sql = $pdo->prepare("SELECT *  FROM clientes WHERE email = ?");
        // $email = "paulo.henrique.chi@outlook.com";
        // $sql->execute(array($email));
        // $dados = $sql->fetchAll();
    ?>

    <?php
        if(count($dados)>0){
            echo "
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data de Cadastro</th>
                    <th>Ações</th>
                </tr>";
            foreach($dados as $chave => $valor){
                $id = $valor["ID"];
                $nome = $valor["nome"];
                $email = $valor["email"];
                $data = $valor["data_cadastro"];
                
                echo "
                    <tr>
                        <td>".$id."</td>
                        <td>".$nome."</td>
                        <td>".$email."</td>
                        <td>".$data."</td>
                        <td>
                            <a class='btn-atualizar' href='#' data-id='$id' data-nome='$nome' data-email='$email'>Atualizar | </a>
                            <a class='btn-deletar' href='#' data-id='$id' data-nome='$nome' data-email='$email'>Deletar</td>
                    </tr>";
            }

            echo "</table>";
        }else{
            echo "<p>Nenhum cliente cadastrado</p>";
        }
    ?>
        
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        //atualizar dados
        $(".btn-atualizar").click(function(){
            var id = $(this).attr('data-id');
            var nome = $(this).attr('data-nome');
            var email = $(this).attr('data-email');

            $('#form_salva').addClass('oculto');
            $('#form_atualiza').removeClass('oculto');

            $("#id_editado").val(id);
            $("#nome_editado").val(nome);
            $("#email_editado").val(email);
            // alert(`${id} ${nome} ${email}`);

            $('#cancelar').click(function(){
                $('#form_atualiza').addClass('oculto');
                $('#form_salva').removeClass('oculto');
            })
        });

        //deletar dados
        $(".btn-deletar").click(function(){
            var id = $(this).attr('data-id');
            var nome = $(this).attr('data-nome');
            var email = $(this).attr('data-email');
            
            $("#id_deleta").val(id);
            $("#nome_deleta").val(nome);
            $("#email_deleta").val(email);
            $("#cliente").html(nome);

            $('#form_atualiza').addClass('oculto');
            $('#form_salva').addClass('oculto');
            $('#form_deleta').removeClass('oculto');


            // alert(`${id} ${nome} ${email}`);

            $('#cancelar_delete').click(function(){
                $('#form_deleta').addClass('oculto');
                $('#form_atualiza').addClass('oculto');
                $('#form_salva').removeClass('oculto');
            })

        });
        </script>
        


</body>
</html>
