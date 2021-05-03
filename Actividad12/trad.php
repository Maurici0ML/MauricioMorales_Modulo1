<?php
    $abcdario=[" "=>"/",
            "."=>".-.-.-",
            "A" => ".-",
            "B"=>"-...",
            "C"=>"-.-.",
            "D"=>"-..",
            "E"=>".",
            "F"=>"..-.",
            "G"=>"--.",
            "H"=>"....",
            "I"=>"..",
            "J"=>".---",
            "K"=>"-.-",
            "L"=>".-..",
            "M"=>"--",
            "N"=>"-.",
            "O"=>"---",
            "P"=>".--.",
            "Q"=>"--.-",
            "R"=>".-.",
            "S"=>"...",
            "T"=>"-",
            "U"=>"..-",
            "V"=>"...-",
            "W"=>".--",
            "X"=>"-..-",
            "Y"=>"-.--",
            "Z"=>"--..",
            "1"=>".----",
            "2"=>"..---",
            "3"=>"...--",
            "4"=>"....-",
            "5"=>".....",
            "6"=>"-....",
            "7"=>"--...",
            "8"=>"---..",
            "9"=>"----.",
            "0"=>"-----", 
            "!"=>"--..--", 
            ","=>"-.-.--",
            "?"=>"..--..",
            "\""=>".-..-."];
            
    $texto= $_POST["mensaje"];
    $entrada= $_POST["idiomaEntrada"];
    $traduccion=$texto;

    //Switch que comprueba cual es el idioma de entrada.
    switch($entrada)
    {
        case "español":
            //Condicion que nos permite validar que se haya introducido un texto en español y no en morse.
            if(stripos($texto, "a") || stripos($texto, "e") || stripos($texto, "i") || stripos($texto, "o") || stripos($texto, "u") || stripos($texto, "y") || stripos($texto, "1") || stripos($texto, "2") || stripos($texto, "3") || stripos($texto, "4") || stripos($texto, "5") || stripos($texto, "6") || stripos($texto, "7") || stripos($texto, "8") || stripos($texto, "9") || stripos($texto, "0"))
            {
                echo "<h2>Su texto a traducir es:</h2>";
                echo strtoupper($texto).'<br>';
                foreach($abcdario as $letra => $morse)
                {
                    $traduccion = str_ireplace($letra, $morse." ", $traduccion);
                    //echo $letra ." => ". $morse. "<br>";
                }
                $traduccion=str_ireplace("/", "&nbsp", $traduccion);
                echo "<h2>Su traducción es:</h2>". $traduccion;
            }

            //Condicion que nos mande a una pantalla de error en caso de que se haya introducido un texto en morse.
            elseif(stripos($texto, "..") || stripos($texto, "--") || stripos($texto, ".-") || stripos($texto, "-."))
                echo "Ha escrito de forma incorrecta su texto en español o incluido un caracter Morse";
            break;

        case "morse":
            //Condicion que nos permite verificar que se haya introducido un texto en expañol.
            if(stripos($texto, "..") || stripos($texto, "--") || stripos($texto, ".-") || stripos($texto, "-."))
            {
                echo "<h2>Su texto a traducir es:</h2>";
                echo $texto."<br>";
                //Remplaza los 3 espacios por una diagonal.
                $traduccion=str_replace("   ", " / ", $traduccion);
                $arreglo=explode(" ", $traduccion);
                //Un foreach que recorre las letras del abcdario y otro que recorre las letras del letras del arreglo del mensaje.
                foreach($abcdario as $letra => $morse)
                {
                    for($i=0; $i<count($arreglo); $i++)
                    {
                        if($arreglo[$i]==$morse)
                            $arreglo[$i]=$letra;
                    }
                }
                echo "<h2>Su traducción es:</h2>". implode($arreglo);
            }

            //Condicion que nos indica que debemos introducir un mensaje con caracteres morse.
            elseif(stripos($texto, "a") || stripos($texto, "e") || stripos($texto, "i") || stripos($texto, "o") || stripos($texto, "u") || stripos($texto, "y"))
                echo "Ha escrito de forma incorrecta su texto en español o incluido un caracter no correspondiente a este ('.','-'). Por favor corrija su texto.";
            break;
    }    
?>