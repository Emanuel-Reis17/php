<?php 
    include("conexao.php");

    $sql_clientes = "SELECT * FROM clientes";
    $query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);
    $num_clientes = $query_clientes->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de clientes</title>
</head>
<body>
    <h1>Lista de clientes</h1>
    <p>Estes são os clientes cadastrados no seu sistema: </p>
    <table style="border: 1px solid black;">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Nascimento</th>
            <th>Data</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php if($num_clientes == 0) { ?>
                <tr>
                    <td colspan="7">Nenhum cliente foi cadastrado</td>
                </tr>
            <?php 
            } else { 
                while($cliente = $query_clientes->fetch_assoc()){

                    //Convertendo o telefone para o padrão normal
                    $telefone = "";
                    if(!empty($cliente['telefone'])){
                        $ddd = substr ($cliente['telefone'], 0, 2);
                        $parte1 = substr ($cliente['telefone'], 2, 5);
                        $parte2 = substr ($cliente['telefone'], 7);
                        $telefone = "($ddd) $parte1-$parte2";
                    }

                    //Convertendo a data o padrão brasileiro
                    $nascimento = "";
                    if(!empty($cliente['nascimento'])){
                        $nascimento = implode('/', array_reverse(explode('-', $cliente['nascimento'])));
                    }

                    //Convertendo a data para o padrão brasileiro
                    $data_cadastro = date("d/m/Y H:i", strtotime($cliente['data']));
                ?>
                <tr>
                    <td><?php print $cliente['id']; ?></td>
                    <td><?php print $cliente['nome']; ?></td>
                    <td><?php print $cliente['email']; ?></td>
                    <td><?php print $telefone ?></td>
                    <td><?php print $nascimento ?></td>
                    <td><?php print $data_cadastro; ?></td>
                    <td><a href="editar_cliente.php?<?php print $cliente["id"]?>">Editar</a></td>
                    <td><a href="deletar_cliente.php?<?php print $cliente["id"]?>">Deletar</a></td>
                </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>