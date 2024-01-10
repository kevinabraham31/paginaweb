<?php
include("conexion.php");

$id = $_GET["id"];

echo "<html><head><title>Listado de personal</title>

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
            margin-bottom: 10px;
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
    
</head><body>";
echo "<br><br><br>";
echo "
<br>

<br> <br>
<form action='editar.php?id=$id' method='POST' onsubmit='return validarRFC();'>
    <center>
    <fieldset style='width: 250px; background-color: rgba(38, 13, 231, 0.8); padding: 20px; border-radius: 10px;'>
    <legend style='color: #303030; font-size: 26px; font-weight: bold;' class='titulo'>EDITAR ALUMNOS</legend>
           
            <tr>
                <td><center><strong>Nombre:</strong></center></td>
                <td><center><input class='entrada' type='text' name='nuevoNombre' placeholder='Nombre Completo' id='nombre' required='true'><br></center></td>
            </tr>
            <tr>
                <td><center><strong>Apellido:</strong></center></td>
                <td><center><input class='entrada' type='text' name='nuevoApellido' placeholder='Apellido Completo' id='apellidos' required='true'><br></center></td>
            </tr>
            <tr>
                <td><center><strong>Correo:</strong></center></td>
                <td><center><input class='entrada' type='email' name='nuevoCorreo' placeholder='Correo electrónico' id='correo' required='true'><br></center></td>
            </tr>
            <tr>
                <td><center><strong>N°_Control:</strong></center></td>
                <td><center><input class='entrada' type='number' name='nuevoNoControl' placeholder='Número de control' id='numcontrol' required='true'><br></center></td>
            </tr>
            <tr>
                <td><center><strong>carrera:</strong></center></td>
                <td><center><input class='entrada' type='text' name='nuevaCarrera' placeholder='Licenciatura' id='carrera' required='true'><br></center></td>
            </tr>
            <tr>
                <td><center><strong>RFC:</strong></center></td>
                <td><center><input class='entrada' type='text' name='nuevoRFC' placeholder='RFC' id='RFC' maxlength='13' required='true'><br></center></td>
            </tr>


            <br>

            <div class='cont__btn'>
                <button class='btn btn__capturar' name='modificar'>MODIFICAR</button>
                <a class='btn btn__registros' href='AlmacenamientoFor.php'>CANCELAR</a>
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

";

extraerRegistro($conexion);

function extraerRegistro($conexion)
{
    global $id;
    $consulta = "SELECT * FROM registro_user WHERE ncontrol = '$id'";
    $resultado = mysqli_query($conexion, $consulta);

    while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
        echo "<script>";
        echo "document.getElementById('nombre').value = '" . $fila['nombre'] . "';";
        echo "document.getElementById('apellidos').value = '" . $fila['apellidos'] . "';";
        echo "document.getElementById('correo').value = '" . $fila['correo'] . "';";
        echo "document.getElementById('numcontrol').value = '" . $fila['ncontrol'] . "';";
        echo "document.getElementById('carrera').value = '" . $fila['carrera'] . "';";
        echo "document.getElementById('RFC').value = '" . $fila['RFC'] . "';";
        echo "</script>";
    }


}

if (isset($_POST['modificar'])) {
    $nuevoNombre = $_POST['nuevoNombre'];
    $nuevoApellido = $_POST['nuevoApellido'];
    $nuevoCorreo = $_POST['nuevoCorreo'];
    $nuevoNoControl = $_POST['nuevoNoControl'];
    $nuevaCarrera = $_POST['nuevaCarrera'];
    $nuevoRFC = $_POST['nuevoRFC'];

    $consultaActualizar = "UPDATE registro_user SET
                          nombre = '$nuevoNombre',
                          apellidos = '$nuevoApellido',
                          correo = '$nuevoCorreo',
                          ncontrol = '$nuevoNoControl',
                          carrera = '$nuevaCarrera',
                          RFC = '$nuevoRFC'
                          WHERE ncontrol = '$id'";

    // Validación del RFC
    $rfcPattern = '/^[A-Z]{4}/';
    if (!preg_match($rfcPattern, $nuevoRFC)) {
        echo "<script>alert('Los primeros 4 caracteres del RFC deben ser letras en mayúsculas.'); window.location.href = 'editar.php?id=$id';</script>";
        return;
    }

    if (mysqli_query($conexion, $consultaActualizar)) {
        echo '<script>alert("Registro actualizado correctamente."); window.location.href = "AlmacenamientoFor.php";</script>';
        exit;
    } else {
        echo '<script>alert("Error al actualizar el registro: ' . mysqli_error($conexion) . '");</script>';
    }
}

echo "</table></center></body></html>";

mysqli_close($conexion);
?>