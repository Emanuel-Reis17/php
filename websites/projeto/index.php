<?php
    if(isset($_POST['email']) && isset($_POST['senha'])){
        include('lib/conexao.php');
        $email = $mysqli->escape_string($_POST['email']);
        $senha = $_POST['senha'];

        $sql_code = "SELECT * FROM clientes WHERE email = '$email'";
        $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

        $erro = false;
        if($sql_query->num_rows == 0){
            print "O email informado está incorreto!";
        } else {
            $usuario = $sql_query->fetch_assoc();
            password_verify($senha, $usuario['senha']);
            if(!password_verify($senha, $usuario['senha'])){
                print "A senha informada está incorreta";
            } else {
                if(!$_SESSION){
                    session_start();
                }
                $_SESSION['usuario'] = $usuario['id'];
                $_SESSION['admin'] = $usuario['admin'];
                header("Location: clientes.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>entrar</title>
</head>
<body>
    <h1>Entrar</h1>
    <form action="" method="POST">
        <p>
            <label for="">Email: </label>
            <input type="text" name="email">
        </p>
        <p>
            <label for="">Senha: </label>
            <input type="text" name="senha">
        </p>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>