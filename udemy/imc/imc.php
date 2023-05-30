<?php
    $peso = 100;
    $altura = 1.75;
    $imc = $peso/ ($altura * $altura);
    
    if($imc < 18.4){
        echo "Magreza";
    } else if($imc >= 18.4 && $imc < 24.9){
        echo "Normal";
    } else if($imc >= 25){
        echo "<strong>Obeso</strong>";
    }
?>