<?php
    //Pegando o id do usuário
    include('lib/conexao.php');
    include('lib/upload.php');
    include('lib/mail.php');
    $id = intval($_GET["id"]);

    function limpar_texto($str){
        return preg_replace("/[^0-9]/", "", $str);
    }

    if(count($_POST) > 0){
        $erro = false;

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $nascimento = $_POST["nascimento"];
        $senha = $_POST["senha"];
        $admin = $_POST["admin"];

        $sql_code_extra = "";

        if(empty($nome)){
            $erro = "Preencha o nome";
        }

        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erro = "Preencha o email";
        }

        $alterar_senha = false;
        if(!empty($senha)){
            if(strlen($_POST['senha']) < 8 && strlen($_POST['senha']) > 16){
                $erro = "A senha deve conter entre 8 a 16 caracteres!";
            } else {
                $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
                $sql_code_extra = "senha = '$senha_criptografada', ";
            }
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

        if(isset($_FILES['foto'])){
            $arq = $_FILES['foto'];
            $path = enviar_arquivo($arq['error'], $arq['size'], $arq['name'], $arq['tmp_name']);
            if($path == false){
                die("Falha ao enviar arquivo!");
            } else {
                $sql_code_extra .= "foto = '$path', ";
            }

            if(isset($_POST['foto_antiga']))
                unlink($_POST['foto_antiga']);
        }

        if($erro){
            print "<p><strong>[ERRO]: $erro</strong></p>";
        } else {
            //Atualizando os as informações do clientes
            $sql_code = "UPDATE clientes SET nome = '$nome', 
            email = '$email', 
            $sql_code_extra 
            telefone = '$telefone', 
            nascimento ='$nascimento', 
            admin = '$admin'
            WHERE id = '$id'";

            // $sql_code = "INSERT INTO clientes (nome, email, telefone, nascimento, data) VALUES ('$nome', '$email', '$telefone', '$nascimento', NOW())";

            $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
            if($deu_certo){
                print "<p><strong>Cliente Atualizado com sucesso!!!</strong></p>";
                enviar_email($email, "Sua conta foi alterada com sucesso", "
                    <h1>Parabéns!</h1>
                    <p>Sua conta foi alterada</p>
                    <p>
                        <strong>Loign:</strong> $email<br>
                        <strong>Senha:</strong> $senha_no_encrypted
                    </p>
                    <p>Para fazer login, acesse <a href=\"https://siteimaginario.com/login.php\">este link</a></p>
                ");
                unset($_POST);
            }
        }
    }

    //Verificando a id do usuário
    $sql_clientes = "SELECT * FROM clientes WHERE id = '$id'";
    $query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);
    $cliente = $query_clientes->fetch_assoc();

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
            <input type="text" name="nome">
        </p>
        <p>
            <label for="">Email: </label>
            <input type="text" name="email">
        </p>
        <p>
            <label for="">Senha: </label>
            <input type="text" name="senha" >
        </p>
        <p>
            <label for="">Telefone: </label>
            <input type="text" name="telefone" placeholder="(11) 98888-8888">
        </p>
        <p>
            <label for="">Data de nascimento: </label>
            <input type="text" name="nascimento">
        </p>
        <input type="hidden" name="foto_antiga" value="<?php print $cliente['foto'];?>">
        <?php if(isset($cliente['foto'])) { ?>
        <p>
            <label>Foto atual: </label>
            <img src="<?php print $cliente['foto'];?>" alt="" height="30">
        </p>
        <?php } ?>
        </p>
        <p>
            <label for="">Nova foto: </label>
            <input type="file" name="foto" <?php if(isset($_POST["foto"])) print $_POST["foto"];?>>
        </p>
        <p>
            <label>Tipo</label>
            <input type="radio" value="1" name="admin"> ADMIN
            <input type="radio" value="0" name="admin" checked> CLIENTE
        </p>
        <p>
            <button type="submit" value>Salvar</button>
        </p>
    </form>
</body>
</html>