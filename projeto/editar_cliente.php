<?php
    //Pegando o id do usuário
    $id = intval($_GET['id']);
    include('conexao.php');

    function limpar_texto($str){
        return preg_replace("/[^0-9]/", "", $str);
    }

    if(count($_POST) > 0){
        $erro = false;

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $nascimento = $_POST["nascimento"];

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

        if($erro){
            print "<p><strong>[ERRO]: $erro</strong></p>";
        } else {
            //Atualizando os as informações do clientes
            $sql_code = "UPDATE clientes SET nome = '$nome', 
            email = '$email', 
            telefone = '$telefone', 
            nascimento ='$nascimento'
            WHERE id = '$id'";

            // $sql_code = "INSERT INTO clientes (nome, email, telefone, nascimento, data) VALUES ('$nome', '$email', '$telefone', '$nascimento', NOW())";

            $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
            if($deu_certo){
                print "<p><strong>Cliente Atualizado com sucesso!!!</strong></p>";
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
    <form action="" method="POST">
        <p>
            <label for="">Nome: </label>
            <input type="text" name="nome" value="<?php print $cliente['nome']?>">
        </p>
        <p>
            <label for="">Email: </label>
            <input type="text" name="email" value="<?php print $cliente['email']?>">
        </p>
        <p>
            <label for="">Telefone: </label>
            <input type="text" name="telefone" placeholder="(11) 98888-8888" value="<?php if(!empty($cliente['telefone'])) print formatar_telefone($cliente['telefone'])?>">
        </p>
        <p>
            <label for="">Data de nascimento: </label>
            <input type="text" name="nascimento" value="<?php if(!empty($cliente['nascimento'])) print formatar_data($cliente['nascimento']);?>">
        </p>
        <p>
            <button type="submit" value>Salvar</button>
        </p>
    </form>
</body>
</html>