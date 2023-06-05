<?php
    //Criando o array
    // $lista = [
    //     1 => "Emanuel",
    //     2 => "Emerson",
    //     3 => "Mendes",
    //     4 => "Reis"
    // ];

    

    //Formas de consultar os valores por índices
    // foreach($lista as $i){
    //     echo "<p>$i</p>";
    // }

    // for($c = 1; $c <= 4; $c++){
    //     echo "<p>$lista[$c]</p>" ;
    // }

    // Criando array dentro de array
    // $lista[] = array(1, 2, 3, 4, 5);

    //Removendo um valor do array
    // $removido = array_pop($lista);
    // echo "<p>$removido</p>";

    // //Adicionando um valor do array
    // array_push($lista, "Reis");
    // var_dump($lista);
    // $aprovados = 0;
    // $reprovados = 0;

    $alunos = [ 5, 7, 9, 8, 10, 0];
    foreach($alunos as $c){
        if ($c >= 6){
            $aprovados++;
        } else {
            $reprovados++;
        }
    }
    
    echo "Nessa classe tivemos $aprovados aprovados e $reprovados reprovados";