<?php
    echo'<table border="1">
            <thead>
                <tr>
                    <th colspan="4"><h1>Solucitud de ingreso a la universidad</h1></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td align="center">'.$_POST["apellidoP"].'</td>
                    <td align="center">'.$_POST["apellidoM"].'</td>
                    <td colspan="2" align="center">'.$_POST["nombre"].'</td>
                </tr>
                <tr>
                    <td align="center"><strong><u>Apellido paterno</u></strong></td>
                    <td align="center"><strong><u>Apellido materno</u></strong></td>
                    <td colspan="2" align="center"><strong><u>Nombre(s)</u></strong></td>
                </tr>
                <tr>
                    <td align="center"><strong><u>Sexo:</u></strong></td>
                    <td align="center">'.$_POST["sexo"].'</td>
                    <td align="center"><strong><u>Edad:</u></strong></td>
                    <td align="center">'.$_POST["edad"].'</td>
                </tr>
                <tr>
                    <td colspan="2" align="center">'.$_POST["correo"].'</td>
                    <td align="center">'.$_POST["tel"].'</td>
                    <td align="center">'.$_POST["cel"].'</td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><strong><u>Correo electrónico</u></strong></td>
                    <td align="center"><strong><u>Telefono</u></strong></td>
                    <td align="center"><strong><u>Celular</u></strong></td>
                </tr>
                <tr>
                    <td align="center"><strong><u>Escuela de procedencia:</u></strong></td>
                    <td align="center">'.$_POST["escuela"].'</td>
                    <td align="center"><strong><u>Promedio:</u></strong></td>
                    <td align="center">'.$_POST["promedio"].'</td>
                </tr>
                <tr>
                </tr>
                    <td colspan="3" align="center"><strong><u>Primera opción</u></strong></td>
                    <td align="center">'.$_POST["primeraOp"].'</td>
                <tr>
                    <td colspan="3" align="center"><strong><u>Segunda opción</u></strong></td>
                    <td align="center">'.$_POST["segundaOp"].'</td>
                </tr>
            </tbody>
        </table>';
?>