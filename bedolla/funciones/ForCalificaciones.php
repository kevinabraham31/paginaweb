
<?php
include("conexion.php");

 $id = $_GET["id"];

echo"
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'> 
    <title>Formulario</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    body {
        background: linear-gradient(to right, #0b12d6, #f9f8fa); 
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
        font-family: 'Roboto', sans-serif;
        color: white;
        height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    @keyframes gradient {
        0% {background-position: 0% 50%;}
        50% {background-position: 100% 50%;}
        100% {background-position: 0% 50%;}
    }
   
    .entrada {
        width: 200px;
        padding: 10px;
        border: none;
        border-radius: 5px;
        margin-bottom: 5px;
        background-color: rgba(255, 255, 255, 0.954);
        transition: background-color 0.5s ease;
    }
    .entrada:hover {
        background-color: rgba(255, 255, 255, 1);
    }
    .btn {
        background: linear-gradient(to right, #0d14e9, #f9f8fa); 
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 2px 2px 10px rgb(243, 243, 243);
        transition: background-color 0.5s ease, box-shadow 0.5s ease;
    }
    .btn:hover {
        transform: scale(1.1); 
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); 
        background: linear-gradient(to left , #fff12a, #f84141);
    }
    .titulo {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 35px;
        background-color: rgba(255, 255, 255, 0.8);
      
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5); 
    }  

    
</style>

</head>
<body>

    <br>

    <br> <br>
    <form action='ForCalificaciones.php?id=$id' method='POST' >
        <center>
        <fieldset style='width: 250px; background-color: rgba(38, 13, 231, 0.8); padding: 20px; border-radius: 10px;'>
    <legend style='color: #303030; font-size: 17px; font-weight: bold;' class='titulo'>AGREGAR CALIFICACIONES</legend>
            
               
                    <tr>    
                        <td> <center> <input class='entrada' type='text' name='Modo' placeholder='Modalidad' id='nom' required='true'><br> </td>
                    </tr>
                    <tr>
                        <td> <center> <input class='entrada' type='text' name='Nivel' placeholder='Nivel' required='true'><br> </td>
                    </tr>
                    <tr>
                        <td> <center> <input class='entrada' type='text' name='Maestro' placeholder='Maestro' required='true'><br> </td>
                    </tr>
                    <tr>
                        <td> <center> <input class='entrada' type='text' name='id_Maestro' placeholder='id_Maestro'  maxlength='13' required='true'> <br> </td>
                    </tr>
                    <tr>
                        <td> <center> <input class='entrada' type='text' name='Calificacion' placeholder='Calificación'   maxlength='13' required='true'> <br> </td>
                    </tr>
                    <tr>
                        <td> <center> <input class='entrada' type='number' name='no_control' placeholder='Número de control' required='true'><br> </td>
                    </tr>
                    <tr>
                        <td> <center> <input class='entrada' type='text' name='carrera' placeholder='Licenciatura' required='true'><br> </td>
                    </tr>
                    <br><br>
         
            <br>
                <div class='cont__btn'>
                    <button class='btn' name='enviarCalificaciones'  href='CalificaciónAlumnadoProfesor.php?id=$id'>CAPTURAR</button>
                    <a class='btn' href='CalificaciónAlumnadoProfesor.php?id=$id'>REGRESAR</a>
                </div>
            </fieldset>
        </center>
    </form>

    
    <script>
        // Obtén el cuerpo y el elemento con id 'mensaje'
        var body = document.body;
        var mensaje = document.getElementById('mensaje');

        // Aplica los estilos al cuerpo
        body.style.backgroundColor = '#FBE6B1'; /* Color beige */
        body.style.fontFamily = 'Arial, sans-serif';
        body.style.textAlign = 'center';

        // Aplica los estilos al elemento con id 'mensaje'
        mensaje.style.fontSize = '50px';
        mensaje.style.color = '#ff0000'; /* Color rojo */
    </script>

</body>
</html>
";


if(isset($_POST['enviarCalificaciones'])){
    insertarCalificacion($conexion, $id);
}

// Función para insertar un nuevo registro en la tabla Calificacion
function insertarCalificacion($conexion, $id) {

    $Modo = $_POST['Modo'];
    $Nivel = $_POST['Nivel'];
    $Maestro = $_POST['Maestro'];
    $id_Profe = $_POST['id_Maestro'];
    $Calificacion = $_POST['Calificacion']; 
    $ncontrol = $_POST['no_control'];
    $carrera = $_POST['carrera'];
    
    //insertar dato 
    $insertar = "INSERT INTO cursado_Alumnos (Modo_Cursado,Nivel,Maestro,id_Maestro,Calificación,ncontrol,Carrera) 
    VALUES ( '$Modo', '$Nivel', '$Maestro', '$id_Profe', '$Calificacion', '$ncontrol', '$carrera')";
    if (mysqli_query($conexion, $insertar)){
        echo "<script>alert('Inserción exitosa'); setTimeout(function(){ window.location.href = 'CalificaciónAlumnadoProfesor.php?id=$id'; }, 100);</script>";
    }else{
    echo"ERROR INSERCIÓN";
    }
    // Redirección a la página principal
   //header("Location: AlmacenamientoFor.php");
}

?>