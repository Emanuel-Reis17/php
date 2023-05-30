<?php
    //Criando funções
    function somarNumero($v1=0, $v2=0){
        if($v1 == "" && $v2 == ""){
            echo "Impossível de calcular";
        } else {
            $resultado = $v1 + $v2;
        }
        return $resultado;
    }
    
    $retorno = somarNumero(1700, 300);
    var_dump($retorno);