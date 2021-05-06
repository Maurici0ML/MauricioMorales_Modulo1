<?php
    session_start();
    if(isset($_SESSION["ingresa"]))
    {
        echo '<table border="1">
                <thead>
                    <tr>
                        <th colspan="2"><strong>Información de inicio de sesión</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nombre completo:</td>
                        <td>'.$_SESSION["nombre"].' '.$_SESSION["apellido"].'</td>
                    </tr>

                    <tr>
                        <td>Grupo:</td>
                        <td>'.$_SESSION["grupo"].'</td>
                    </tr>

                    <tr>
                        <td>Fecha de nacimiento:</td>
                        <td>'.$_SESSION["nacimiento"].'</td>
                    </tr>

                    <tr>
                        <td>Correo Electrónico:</td>
                        <td>'.$_SESSION["correo"].'</td>
                    </tr>
                </tbody>
            </table><br>'; 
        echo '<form action="./form.php" method="POST">
                <input type="submit" name="regresarForm" value="Cerrar sesión">
            </form>';
    }
    elseif(isset($_POST["ingresa"]))
    {
        $_SESSION["ingresa"] = $_POST["ingresa"];
        $_SESSION["nombre"] = $_POST["nombre"];
        $_SESSION["apellido"] = $_POST["apellido"];
        $_SESSION["grupo"] = $_POST["grupo"];
        $_SESSION["nacimiento"] = $_POST["nacimiento"];
        $_SESSION["correo"] = $_POST["correo"];

        header("location: ./index.php");
    }
    else
    {
        header("location: ./form.php");
    }
?>