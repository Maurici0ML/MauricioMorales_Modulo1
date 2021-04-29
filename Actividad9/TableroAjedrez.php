<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tablero de ajedrez</title>
</head>
<body>
    <table border="1">
       <?php
            $z=8; //Variable que controla las dimensiones del tablero.
            for($y=0; $y < $z; $y++)
            {
                echo "<tr></tr>";
                for($x=0; $x < $z; $x++)
                {
                    //Condiciones que chequen que se intercalen verticalmente empezando por el blanco.
                    if($y%2 == 0)
                    {
                        //Condiciones que intercalan horizontalmente empezando por blanco.
                        if($x%2 == 0)
                            echo '<td>'.
                                '<img src="./statics/blanco.jpg" weigth="50" height="50">'.
                            '</td>';
                        else
                            echo '<td>'.
                                '<img src="./statics/oscuro.jpg" weigth="50" height="50">'.
                            '</td>';
                    }
                    //Else que hace que se cambie el orden de intercalado vertical para que empieze con el negro
                    else
                    {
                        if($x%2 == 0)
                        //Condiciones que checan que se intercalen horizontalmente empezando por el negro
                            echo '<td>'.
                                '<img src="./statics/oscuro.jpg" weigth="50" height="50">'.
                            '</td>';
                        else  
                            echo '<td>'.
                                '<img src="./statics/blanco.jpg" weigth="50" height="50">'.
                            '</td>'; 
                    }
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
