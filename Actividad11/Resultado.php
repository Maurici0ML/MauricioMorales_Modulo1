<?php
    $a=0;
    $b=0;
    $c=0;
    $d=0;

    $PREGUNTAS=["pregunta1"=>$_POST["p1"],
                "pregunta2"=>$_POST["p2"],
                "pregunta3"=>$_POST["p3"],
                "pregunta4"=>$_POST["p4"],
                "pregunta5"=>$_POST["p5"],
                "pregunta6"=>$_POST["p6"],
                "pregunta7"=>$_POST["p7"],
                "pregunta8"=>$_POST["p8"],
                "pregunta9"=>$_POST["p9"],
                "pregunta10"=>$_POST["p10"]];

    echo "<h1>Eres un taco ";

    //for que recorre el arrelo y va sumando El numero de veces que aparecen los incisos.
    foreach($PREGUNTAS as $preg => $inciso)
    {
        if($inciso == "A")
            $a++;
        elseif ($inciso == "B") 
            $b++;
        elseif ($inciso == "C")
            $c++;
        elseif ($inciso == "D")
            $d++;
    }
    
    // PRUEBA PARA COMPROBAR LAS VARIABLES 
    //echo "<br>A=".$a."<br>B=".$b."<br>C=".$c."<br>D=".$d."<br>";

    //CONDICIONES QUE DETERMINAN QUE TIPO DE TACO ERES
    //Condiciones de cuando a, b, c, d son mayores.
    if($a>$b && $a>$c && $a>$d)
        echo "al pastor</h1>";
    elseif($b>$a && $b>$c && $b>$d)
        echo "de suadero</h1>";
    elseif($c>$a && $c>$b && $c>$d)
        echo "de barbacoa</h1>";
    elseif($d>$a && $d>$b && $d>$c)
        echo "Lagunero</h1>";

    //Condiciones de cuando hay empates.
    elseif ($a==$b && $a+$b>($c+$d) && ($a+$b)/2!=$c && ($a+$b)/2!=$d)
        echo "campechano</h1>";
    elseif ($a==$c && $a+$c>($b+$d) && ($a+$c)/2!=$b && ($a+$c)/2!=$d)
        echo "placero</h1>";
    elseif ($a==$d && $a+$d>($b+$c) && ($a+$d)/2!=$b && ($a+$d)/2!=$c)
        echo "light</h1>";
    elseif ($b==$c && $b+$c>($a+$d) && ($b+$c)/2!=$a && ($b+$c)/2!=$d)
        echo "carnitas</h1>";
    elseif ($b==$d && $b+$d>($a+$c) && ($b+$d)/2!=$a && ($b+$d)/2!=$c)
        echo "mixiote</h1>";
    elseif($c==$d && $c+$d>($a+$b) && ($c+$d)/2!=$a && ($c+$d)/2!=$b) 
        echo "bell</h1>";

    //Condicion por default de taco de sal.
    else
        echo "de sal</h1>";
?>