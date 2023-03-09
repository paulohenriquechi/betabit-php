<?php
    $erroEmail = "";
    $erroName = "";
    $erroPassword = "";
    $erroRepeatPassword = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //NAME
        //verifica se nome está vazio
        if(empty($_POST['name'])){
            $erroName = "Enter your name";
        }else{
            //se não estiver vazio, o nome é limpado
            $name = clearPost($_POST['name']);
            //verifica se tem apenas letras
            if(!preg_match("/^[a-zA-Z-' ]*$/", $name))
            $erroName = "We only accept letters and blank spaces";
        }

        //EMAIL
        //verifica se email está vazio
        if(empty($_POST['email'])){
            $erroEmail = "Enter your e-mail";
        }else{
            $email = clearPost($_POST['email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $erroEmail = "Invalid E-mail";
            }
        
        }

        //PASSWORD
        //verifica se senha está vazia
        if(empty($_POST['password'])){
            $erroPassword = "Enter your password";
        }else{
            $password = clearPost($_POST['password']);
            if(strlen($password)<6){
                $erroPassword = "The password needs to have at least 6 characters";
            }
        
        }
        //PASSWORD CONFIRMATION
        //verifica se senha está vazia
        if(empty($_POST['repeat_password'])){
            $erroRepeatPassword = "Enter your password confirmation";
        }else{
            $repeatPassword = clearPost($_POST['repeat_password']);
            if($repeatPassword!==$password){
                $erroRepeatPassword = "The password confirmation and the password doesn't match";
            }
        }
        if (($erroName=='')&&($erroEmail=='')&&($erroPassword=='')&&($erroRepeatPassword=='')) {
            header('Location: /getforms.php');
        }
    }

    function clearPost($value){
        $value = trim($value);
        $value = stripcslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Form Validation</h1>


    <form action="" method="post">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Type your name" 
                <?php if(!empty($erroName)){echo "class='invalid'";}?>
                <?php if(isset($_POST['name'])){echo "value='".$_POST['name']."'";} ?>>
            <span class="erro"><?php echo $erroName ?></span>
        </div>
        <div>
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="email@email.com" 
                <?php if(!empty($erroEmail)){echo "class='invalid'";} ?>
                <?php if(isset($_POST['email'])){echo "value='".$_POST['email']."'";} ?>>
            <span class="erro"><?php echo $erroEmail ?></span>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Type your password" <?php if(!empty($erroPassword)){echo "class='invalid'";} ?>>
            <span class="erro"><?php echo $erroPassword ?></span>
        </div>
        <div>
            <label for="repeat_password">Password Confirmation</label>
            <input type="password" name="repeat_password" placeholder="Repeat your password" <?php if(!empty($erroRepeatPassword)){echo "class='invalid'";} ?>>
            <span class="erro"><?php echo $erroRepeatPassword ?></span>
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>
</html>