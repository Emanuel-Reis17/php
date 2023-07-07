<?php
    if(isset($_POST['confirmar'])){
        include('lib/conexao.php');
        $id = intval($_GET['id']);

        $sql_cliente = "SELECT foto FROM clientes WHERE id = '$id'";
        $query_cliente = $mysqli->query($sql_cliente) or die($mysqli->error);
        $cliente = $query_cliente->fetch_assoc();

        $sql_code = "DELETE FROM clientes WHERE id = '$id'";
        $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
        if($sql_query) { 
            
            if(!empty($cliente['foto']))
                unlink($cliente['foto']);
        ?>
            <h1>Cliente deletado com sucesso</h1>
            <p><a href="clientes.php">Click aqui</a> para voltar</p>
            
        <?php
        die();
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar cliente</title>
</head>
<body>
    <h1>Tem certeza que deseja deletar esse cliente?</h1>
    <form action="" method="post">
        <a href="clientes.php" style="margin-right: 40px;">Não</a>
        <button name="confirmar" value="1" type="submit">Sim</button>
    </form>
</body>
</html>