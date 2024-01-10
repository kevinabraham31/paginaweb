
<?php



session_start();


$id =  $_SESSION['usuario'];



echo "
<html>
    <head>
        <title>

        </title>
        
    </head>
        <frameset rows='15%, 85%' noresize frameborder='0' framespacing='0' style='border: none;'>
            <frameset cols='100%' >
                <frame src='menuProfe.php?id=$id'>
            </frameset>
            <frameset>
                <frame src='InicioProfe2.php?id=$id' name='info'>
            </frameset>
        </frameset>

        

</html>";

?>