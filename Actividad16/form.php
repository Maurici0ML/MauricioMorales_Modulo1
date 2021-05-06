<?php
  session_start();
  if(isset($_POST["regresarForm"]))
  {
    session_unset();
    session_destroy();
  }
  if (isset($_SESSION["ingresa"]))
  {
    header("location: ./index.php");
  }
  else
  {
    echo '<!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title></title>
      </head>
      <body>
        <form action="./index.php" method="POST">
          <fieldset style="width:fit-content">
            <legend>Inicio de sesión</legend>
            <label>Nombre:
              <input type="text" name="nombre" required>
            </label>
            <br><br>
            <label>Apellido:
              <input type="text" name="apellido" required>
            </label>
            <br><br>
            <label>Grupo:
              <input type="number" name="grupo" required>
            </label>
            <br><br>
            <label>Fecha de nacimiento:
              <input type="date" name="nacimiento" required>
            </label>
            <br><br>
            <label>Correo electrónico:
              <input type="email" name="correo" required>
            </label>
            <br><br>
            <label>Contraseña:
              <input type="password" name="contraseña" required>
            </label>
            <br><br>
            <input type="submit" name="ingresa" value="Ingresar">
          </fieldset>
        </form>
      </body>
    </html>';
  }

?>
