<?php
    //Variable que define que aplicacion se va a llevar a cabo
    $aplicacion=$_POST["app"];
    
    //Condicion que nos permite desplegar la aplicacion en la que hicicmos el submit.
    if($aplicacion=="reloj")
    {
        //variables
        $hora=$_POST["hora"];
        $hora=explode(":", $hora); //explode para dividir la hora introducida en hora y minutos

        //Arreglo asociativo que tiene las ciudades. Si se selecciono el checkbox, se le asina "on", y en caso contario "off".
        $ciudades=["Nueva York" => (isset($_POST["nuevaY"]))? "on":"off",
                    "Sao paulo" => (isset($_POST["saoP"]))? "on":"off",
                    "Madrid" => (isset($_POST["madrid"]))? "on":"off",
                    "Paris" => (isset($_POST["paris"]))? "on":"off",
                    "Roma" => (isset($_POST["roma"]))? "on":"off",
                    "Atenas" => (isset($_POST["atenas"]))? "on":"off",
                    "Beijin" => (isset($_POST["beijin"]))? "on":"off",
                    "Tokio" => (isset($_POST["tokio"]))? "on":"off"];

        //Arreglo de zonas horarias que se relaciona con el arreglo de las ciudades.
        $zonasH=["America/New_York", "America/Sao_Paulo", "Europe/Madrid", "Europe/Paris",  "Europe/Rome",  "Europe/Athens", "Asia/Shanghai", "Asia/Tokyo"];
        
        //Función que permite calcular la diferencia horaria y devuelve la hora de la zona horaria dada.
        function ciudades($horas, $zonahoraria)
        {
            date_default_timezone_set($zonahoraria);
            $horaExtranjera=date("H");
            $diaExtranjero=date("j");
            date_default_timezone_set("America/Mexico_City");
            $horaLocal=date("H");
            $diaLocal=date("j");
            //Permite diferenciar si la diferencia esta dentro del mismo dia o en el siguiente.
            if($diaLocal == $diaExtranjero)
            {
                $diferencia=$horaExtranjera-$horaLocal;
            }
            else
            {
                $diferencia=24-$horaLocal+$horaExtranjera;
            }

            //Permite convertir la hora a un formato de 24 hrs.
            $mktime= mktime($horas+$diferencia);
            $horaCiudades=localtime($mktime, true);
            return $horaCiudades["tm_hour"];
        }
        
        //Echo que nos imprime la hora dada de la Ciudad de México
        echo '<table border="1">
                <thead>
                    <th colspan="2">Reloj Mundial</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Ciudad de México</td>
                        <td>'.$hora[0].'hrs '.$hora[1].'mins</td>
                    </tr>';
        
        //Ciclo que nos recorre la matriz asociativa y comprueba que ciudades tienen "on".
        $i=0;
        foreach($ciudades as $zona => $onoff)
        { 
            //Si la ciudad tiene on, le crea una fila en la que pone la ciudad *"zona"* y luego la hora que es en su zona horaria, con la funcion "ciudades"
            if($onoff == "on")
            {
                echo '<tr>
                            <td>'.$zona.'</td>
                            <td>'.ciudades($hora[0], $zonasH[$i]).'hrs '.$hora[1].'mins</td> 
                        </tr>';
            }
            $i++;
        }   
        echo '</tbody></table>';
    }

    else
    {
        $fechaCump=$_POST["fecha"]; 
        $fechaCump=explode("-", $fechaCump);

        //Arreglo asociativo con las difernetes opciones. Si el checkbox está marcado, contiene un "on", de lo contrario, el "of".
        $opciones = ["Días" => (isset($_POST["dias"])) ?"on":"off",
                    "Horas" => (isset($_POST["horas"])) ?"on":"off",
                    "Minutos" => (isset($_POST["minutos"])) ?"on":"off",
                    "¿Es fin de semana?" => (isset($_POST["finde"])) ?"on":"off"];

        //Creacion la fecha de nuestro cumpleaños a la 00_00.
        $mktime=mktime(0, 0, 0, $fechaCump[1], $fechaCump[2], date("Y"));
        $proximo=getdate($mktime);
        $hoy=getdate(); //Creacion de la fecha actual.

        //Condicion que determina si tu cumpleaños es en el año actual, o ya paso y es en el que sigue.
        if($proximo["yday"] > $hoy["yday"])
        {
            $dias = $proximo["yday"] - $hoy["yday"]; //Hace el calculo de días que faltan de la fecha actual, hasta tu cumpleaños.

            if($proximo["weekday"] == "Saturday" || $proximo["weekday"] == "Sunday") //Condicion que comprueba si el dia de nuestro compleaños EN EL AÑO ACTUAL cae en fin de semana.
                $esFin="Si lo es";
            else
                $esFin="No lo es";
        }
        else
        {
            if(date("Y")%4==0) //Condicion que nos permite comprobar si el próximo año es biciesto 
                $dias=366-$hoy["yday"]+$proximo["yday"];    
            else                                               //Calculo de cuantos dias fatan para tu cumpleaños.
                $dias=365-$hoy["yday"]+$proximo["yday"];

            $mktime=mktime(0, 0, 0, $fechaCump[1], $fechaCump[2], date("Y")+1); //Mk time con la fecha de nuestro cumpleaños en el año actual.
            $sigAño=getdate($mktime);
            if($sigAño["weekday"] == "Saturday" || $sigAño["weekday"] == "Sunday") //Condicion que comprueba si el dia de nuestro cumpleaños en EL AÑO SIGUIENTE cae en fin de semana.
                $esFin="Si lo es";
            else
                $esFin="No lo es";
        }
        $horas=(($dias-1)*24)+(24-$hoy["hours"]);      //Línea para calcular las horas que faltan para nuestro cumpleaños en funcion de los dias.
        $minutos=(($horas-1)*60)+(60-$hoy["minutes"]); //Línea que nos permite calculas los minutos que faltan en base a las horas.
    
        //Arreglo que almacena los datos de las diferentes opciones que se piden.
        $tiempoDiferencia=[$dias, $horas, $minutos, $esFin];

        //Echo que nos despliega el encabezado de la tabla.
        echo '<table border="1">
                <thead>
                    <tr>
                        <th>Cumpleaños</th>
                        <th>'.$fechaCump[0].'-'.$fechaCump[1].'-'.$fechaCump[0].'</th>
                    </tr>
                </thead>';
        
        //Ciclo que nos recorre la matriz asociativa y comprueba/despliega las diferentes opciones.
        $j=0;
        foreach($opciones as $tipofecha => $on_off)
        { 
            if($on_off == "on")
            {
                echo '<tbody>
                        <tr>
                            <td>'.$tipofecha.'</td>
                            <td>'.$tiempoDiferencia[$j].'</td> 
                        </tr>';
            }
            $j++;
        }   
    }
?>