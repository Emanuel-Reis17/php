<?php
    function enviar_arquivo($error, $size, $name, $tmp_name){
        include("conexao.php");

        if($error){
            die("Falha ao enviar arquivo");
        }

        if($size > 2097152){
            die("Arquivo muito grande! Max: 2MB");
        }

        $pasta = "arquivos/ ";
        $nomeDoArquivo = $name;
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        if($extensao != "jpg" && $extensao != "png" && $extensao != "webp"){
            die("Tipo de arquivo não suportado!");
        }

        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
        $connected = move_uploaded_file($tmp_name, $path);
        if($connected){
            return $path;
        } else {
            return false;
        }
    }
?>