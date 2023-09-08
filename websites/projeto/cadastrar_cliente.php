<?php
    function limpar_texto($str){
        return preg_replace("/[^0-9]/", "", $str);
    }

    if(count($_POST) > 0){
        $erro = false;

        include('lib/conexao.php');
        include('lib/upload.php');
        include('lib/mail.php');

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $nascimento = $_POST["nascimento"];
        $senha_no_encrypted = $_POST['senha'];
        $admin = $_POST['admin'];

        if(strlen($_POST['senha']) < 8 && strlen($_POST['senha']) > 16){
            $erro = "A senha deve conter entre 8 a 16 caracteres!";
        }

        if(empty($nome)){
            $erro = "Preencha o nome";
        }

        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erro = "Preencha o email";
        }

        if(!empty($nascimento)){
            $pedacos = explode('/', $nascimento);
            if(count($pedacos) == 3){
                $nascimento = implode('-', array_reverse($pedacos));
            } else {
                $erro = "A data de nascimento deve seguir o padrão dia/mês/ano";
            }
        }

        if(!empty($telefone)){
            $telefone = limpar_texto($telefone);
            if(strlen($telefone) != 11){
                $erro = "O telefone deve ser preenchido no padrão (11) 98888-8888";
            }
        }

        $path = "";
        if(isset($_FILES['foto'])){
            $arq = $_FILES['foto'];
            $path = enviar_arquivo($arq['error'], $arq['size'], $arq['name'], $arq['tmp_name']);
            if($path == false){
                die("Falha ao enviar arquivo!");
            }
        }

        if($erro){
            print "<p><strong>[ERRO]: $erro</strong></p>";
        } else {
            $senha = password_hash($senha_no_encrypted, PASSWORD_DEFAULT);
            $sql_code = "INSERT INTO clientes (nome, email, senha, telefone, nascimento, foto, data, admin) VALUES ('$nome', '$email', '$senha', '$telefone', '$nascimento', '$path', NOW(), '$admin')";
            $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
            if($deu_certo){
                enviar_email($email, "Sua conta foi criada com sucesso", "
                    <h1>Parabéns!</h1>
                    <p>Sua conta foi criada!</p>
                    <p>
                        <strong>Loign:</strong> $email<br>
                        <strong>Senha:</strong> $senha_no_encrypted
                    </p>
                    <p>Para fazer login, acesse <a href=\"https://siteimaginario.com/login.php\">este link</a></p>
                ");
                print "<p><strong>Cliente cadastrado com sucesso!!!</strong></p>";
                unset($_POST);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
</head>
<body>
    <a href="clientes.php">Voltar para a lista</a>
    <form action="" method="POST" enctype="multipart/form-data">
        <p>
            <label for="">Nome: </label>
            <input type="text" name="nome" <?php if(isset($_POST["nome"])) print $_POST["nome"];?>>
        </p>
        <p>
            <label for="">Email: </label>
            <input type="text" name="email" <?php if(isset($_POST["email"])) print $_POST["email"];?>>
        </p>
        <p>
            <label for="">Telefone: </label>
            <input type="text" name="telefone" placeholder="(11) 98888-8888" <?php if(isset($_POST["telefone"])) print $_POST["telefone"];?>>
        </p>
        <p>
            <label for="">Data de nascimento: </label>
            <input type="text" name="nascimento" <?php if(isset($_POST["nascimento"])) print $_POST["nascimento"];?>>
        </p>
        <p>
            <label for="">Senha: </label>
            <input type="text" name="senha" <?php if(isset($_POST["senha"])) print $_POST["senha"];?>>
        </p>
        <p>
            <label for="">Foto: </label>
            <input type="file" name="foto" <?php if(isset($_POST["foto"])) print $_POST["foto"];?>>
        </p>
        <p>
            <label>Tipo</label>
            <input type="radio" value="1" name="admin"> ADMIN
            <input type="radio" value="0" name="admin" checked> CLIENTE
        </p>
        <p>
            <button type="submit">Salvar cliente</button>
        </p>
    </form>
</body>
</html>