<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Formulário</h1>
    <p class="error">*Obrigatório</p>
    <form action="" method="post">
        Nome: <input type="text" name="nome"><span class="error"> *</span><br><br>
        Email: <input type="email" name="email"><span class="error"> *</span><br><br>
        Website: <input type="url" name="website"><br><br>
        Comentário: <textarea name="comentario" cols="30" rows="10"></textarea><br><br>
        Gênero: <input type="radio" value="masculino" name="genero"> Masculino 
                <input type="radio" value="feminino" name="genero"> Feminino 
                <input type="radio" value="Outros" name="genero"> Outro <br><br>
        <button name="enviado" type="submit">Enviar</button><br><br>
        <h1>Dados enviados: </h1>
        <?php
            if(isset($_POST['enviado'])){
                if(empty($_POST['nome']) || strlen($_POST['nome']) < 3 || strlen($_POST['nome']) > 100){
                    echo '<p class="error">Preenha o campo nome</p>';
                    die();
                }

                if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    echo '<p class="error">Preenha o campo email</p>';
                    die();
                }

                if(!empty($_POST['website']) && !filter_var($_POST['website'], FILTER_VALIDATE_URL)){
                    echo '<p class="error">Preenha o campo website corretamente</p>';
                    die();
                }

                $genero = "Não selecionado";
                if(isset($_POST['genero'])){
                    $genero = $_POST['genero'];
                    if($genero != "masculino" && $genero != 'feminino' && $genero != 'outros'){
                        echo '<p class="error">Preenha o campo gênero corretamente</p>';
                        die();
                    }
                }

                echo "<p><strong>Nome: </strong>" . $_POST['nome'] . "</p>";
                echo "<p><strong>Email: </strong>" . $_POST['email'] . "</p>";
                echo "<p><strong>Website: </strong>" . $_POST['website'] . "</p>";
                echo "<p><strong>Gênero: </strong>" . $genero . "</p>";
                echo "<p><strong>Comentário: </strong>" . $_POST['comentario'] . "</p>";
            }
        ?>
        </form>
</body>
</html>