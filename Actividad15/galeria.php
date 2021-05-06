<?php
    if(isset($_FILES["archivo"])) //If que determina si venimos del formulario (mandamos un archivo) o solo queremos acceder a la galeria.
    {
        $extension= pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);

        if($extension == "png" || $extension == "jpg" || $extension == "jpeg")
        {
            $nombreArchivo=$_FILES["archivo"]["name"];
            $ruta=$_FILES["archivo"]["tmp_name"];
            $nombre= $_POST["nomObra"];
            $autor=(isset($_POST["autor"]) && $_POST["autor"] != "") ? $_POST["autor"] : "Sin autor";
            $año= (isset($_POST["fecha"]) && $_POST["fecha"] != "") ? $_POST["fecha"] : "Sin año";
            $nombreNuevo=str_ireplace(" ", "_", $nombre.'$'.$autor.'$&'.$año.'&.'.$extension);
            rename($_FILES["archivo"]["tmp_name"], './statics/'.$nombreNuevo);
            
            
            
            echo "<h2>Tu imagen se cargo correctamente en tu galeria</h2>";
            echo '<form action="./galeria.php" method="POST">
                <input type="submit" name="ver" value="Ver galeria">
            </form>';

            
            
            
        }
        else
        {
            echo '<h2>El archivo \''.$_FILES["archivo"]["name"].'\' es invalido, no tiene extension png, jpg o jpeg</h2>';
            echo '<form action="./form.html" method="POST">
                <input type="submit" name="formularioext" value="Volver">
            </form>';
        }
            
    }
    else //Condicion que nos permite acceder a la galeria
    {  
        $statics=opendir("statics");
        $obras=array();
        $hayObras=true;
        while($hayObras)
        {
            $obra=readdir($statics);
            if($obra !== false)
            {
                if($obra != ".." && $obra != ".")
                    array_push($obras, $obra);
            }
            else
            {
              $hayObras=false;  
            }    
        }
        
        if($obras) //Nos muestra los elementos de la galeria en caso de que tenga al menos una obra
        {
            echo "<h1>Imagenes en la galeria de arte</h1>";
            echo '<table border="1">';


            $i=0;
            foreach ($obras as $llave => $valor)
            { 
                $pesos= strpos($valor, "$");
                $pesos2= strrpos($valor, "$");
                $amper= strpos($valor, "&");
                $amper2= strrpos($valor, "&");
                $posNombre = substr($valor, 0, $pesos);
                $posAutor = substr($valor, $pesos+1, $pesos2-$pesos-1);
                $posAño = substr($valor, $amper+1, $amper2-$amper-1);

                if($i%2 == 0)
                {
                    echo '<tr>
                            <td>
                                <img src="./statics/'.$valor.'" height="200">
                                <br>
                                <ul>
                                    <li><strong>Nombre de la pintura: </strong>'.$posNombre.'</li>
                                    <li><strong>Nombre del pintor: </strong>'.$posAutor.'</li>
                                    <li><strong>Año en que se realizo: </strong>'.$posAño.'</li>
                                </ul>
                            </td>';
                        
                }    
                else
                    echo    '<td>
                                <img src="./statics/'.$valor.'" height="200">
                                <br>
                                <ul>
                                    <li><strong>Nombre de la pintura: </strong>'.$posNombre.'</li>
                                    <li><strong>Nombre del pintor: </strong>'.$posAutor.'</li>
                                    <li><strong>Año en que se realizo: </strong>'.$posAño.'</li>  
                                </ul>
                            </td>
                        </tr>';
                $i++;
            }
            echo '</table>';

            echo '<br><form action="./form.html" method="POST">
                    <input type="submit" name="agregar" value="Agregar obra a la galeria">
                </form>';           
        }  
        else //Nos dice que nuestra galeria está vacía y nos da la opción de regresar.
        {
            echo"<h2>Tu galeria de arte no tiene ninguna imagen.</h2>";
            echo '<form action="./form.html" method="POST">
                    <input type="submit" name="formulario" value="Regresar">
                </form>'; 
        }
        closedir($statics);      
    }
?>