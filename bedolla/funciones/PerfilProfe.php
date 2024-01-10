<?php
include("conexion.php");
$id = $_GET["id"];

//echo "$id";
echo "
<html>
<head>
    <title>PERFIL</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
        body {
            background: linear-gradient(to right, #0b12d6, #f9f8fa); 
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            font-family: 'Roboto', sans-serif;
            color: rgb(12, 25, 218);
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
        
        .titulo2 {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 13px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5); 
        }

        .tablota {
            width='50%';
            margin-bottom: 30px; /* Add margin between tables */
        }
       

          

          @media screen and (max-width: 768px) {
            body {
              background-color: lightblue;
             
              .tablota {
                width: 90%; /* Cambia esto al ancho que desees */
                height: 1px;
            }
        
            .tablota td, .tablota th {
                font-size: 11px; /* Reduce el tamaño de la fuente para pantallas pequeñas */
            }
            }
        }
          
    </style>
</head>
<body>
    <br><br><br>
    <center>
        <div class='titulo'>
            DATOS PERSONALES
        </div>
        <br><br> 
        <form action='PerfilProfe.php?id=$id' method='POST'>
            <center>
            <table class='tablota' border='01' bgcolor='' >
           
            <tr>
            <td>
                <table>
                    <tr>
                        <th class='titulo2'>Nombre: </th>
                        <td>
                        <center><input type='text' name='nuevoNombre' placeholder='Nombre Completo' required='true' id='nombre'></center>
                        </td>
                    </tr>
                </table>
            </td>
    
            <td>
                <table>
                    <tr>
                        <th class='titulo2'>Apellidos: </th>
                        <td>
                        <center><input type='text' name='nuevoApellido' placeholder='Apellido Completo' required='true' id='apellidos'><br></center>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
                <td>
                    <table>
                        <tr>
                            <th class='titulo2'>Correo: </th>
                            <td>
                            <center><input type='email' name='nuevoCorreo' placeholder='Correo electronico' required='true' id='correo'><br></center>
                            </td>
                        </tr>
                    </table>
                </td>
        
                <td>
                    <table>
                        <tr>
                            <th class='titulo2'>Cotraseña: </th>
                            <td>
                            <center><input type='text' name='nuevaContraseña' placeholder='Licenciatura' required='true' id='Contraseña'><br></center>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
     <br><br>
           
        <div class='cont__btn'>
                <button class='btn btn__capturar' name='modificar'>Modificar</button>
            </div>
            </center>
        </form>
          
    </center>
</body>
</html>";


extraerRegistro($conexion);

function extraerRegistro($conexion)
{
    global $id;
    $consulta = "SELECT * FROM registro_profe WHERE id_Maestro= '$id'";
    $resultado = mysqli_query($conexion, $consulta);

    while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
        echo "<script>";
        echo "document.getElementById('nombre').value = '" . $fila['nombre'] . "';";
        echo "document.getElementById('apellidos').value = '" . $fila['apellidos'] . "';";
        echo "document.getElementById('correo').value = '" . $fila['correo'] . "';";
        echo "document.getElementById('Contraseña').value = '" . $fila['contra'] . "';";
        echo "</script>";
    }


}

if (isset($_POST['modificar'])) {

    $nuevoNombre = $_POST['nuevoNombre'];
    $nuevoApellido = $_POST['nuevoApellido'];
    $nuevoCorreo = $_POST['nuevoCorreo'];
    $nuevaContraseña = $_POST['nuevaContraseña'];

    $consultaActualizar = "UPDATE registro_profe SET
                          id_Maestro =  '$id',
                          nombre = '$nuevoNombre',
                          apellidos = '$nuevoApellido',
                          correo = '$nuevoCorreo',
                          contra = '$nuevaContraseña'
                          WHERE id_Maestro = '$id'";

    
    if (mysqli_query($conexion, $consultaActualizar)) {
        echo "<script>alert('Registro actualizado correctamente.'); window.location.href = 'PerfilProfe.php?id=$id';</script>";
        exit;
    } else {
        echo '<script>alert("Error al actualizar el registro: ' . mysqli_error($conexion) . '");</script>';
    }
}


echo "</table></center></body></html>";

mysqli_close($conexion);
?>


