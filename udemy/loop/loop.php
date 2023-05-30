<?php
    //Estruturas de repetição
    //for(){}
    $number = 2;
    for($c = 1; $c < 10; $c++){
        echo $number . "x" . $c . "=" . $number*$c . "<br>";
    }
    echo "<hr>";

    //do{}while()
    $k = 1;
    do{
        echo $number . "x" . $k . "=" . $number*$k . "<br>";
        $k++;
    } while($k < 10);
    echo "<hr>";

    //while(){}
    $l = 1;
    while($l < 10){
        echo $number . "x" . $l . "=" . $number*$l . "<br>";
        $l++;
    }
    echo "<hr>";

    //Foreach(){}
    $nomes = array(
        "a" => "a", 
        "b" => "b", 
        "c" => "c", 
        "d" => "d"
    );

    foreach($nomes as $i => $n){
        echo $i . ") e o nome é " . $n . "<br>";
    }
