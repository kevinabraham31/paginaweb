
<?php

session_start();
// Acceder a los datos enviados
$id = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];
 
$_SESSION["Id"] = $id;


echo "
<html>
    <head>
        <title>

        </title>
    </head>
        <frameset rows='15%, 85%' noresize frameborder='0' framespacing='0' style='border: none;'>
            <frameset cols='100%' >
                <frame src='menuAdmin.php?id=$id'>
            </frameset>
            <frameset>
                <frame src='InicioAdmin2.php?id=$id' name='info'>
            </frameset>
        </frameset>
</html>";

?>