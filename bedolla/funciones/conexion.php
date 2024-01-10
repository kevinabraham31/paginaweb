<?php


$server= "localhost";
$user= "id21360332_kev";
$pass= "Dedo123456789#";
$db= "id21360332_registro";
$conexion=mysqli_connect($server, $user, $pass, $db);

if (!$conexion){
    die ("ERROR DE CONEXIÓN".mysqli_error());
} //echo "CONEXIÓN EXITOSA";

// Verificar qué acción se debe realizar según el botón presionado
if(isset($_POST['enviar'])){
    insertar($conexion);
}

if(isset($_POST['enviarProfe'])){
    insertarProfe($conexion);
}


//mysqli_close($conexion);


// Función para insertar un nuevo registro en la base de datos
function insertar($conexion) {

    date_default_timezone_set('America/Mexico_City');


    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['email']; 
    $control = $_POST['no_control'];
    $carrera = $_POST['carrera'];
    $RFC = $_POST['RFC'];
    $hora_registro = date ("d-m-Y h:i:s");
    $contador = 1;
    
    //insertar dato 
    $insertar = "INSERT INTO registro_user (contador,nombre,apellidos,correo,ncontrol,carrera,RFC,hora_registro) 
    VALUES ( '$contador', '$nombre', '$apellidos', '$correo', '$control', '$carrera', '$RFC', '$hora_registro')";
    if (mysqli_query($conexion, $insertar)){
        echo "<script>alert('Inserción exitosa'); setTimeout(function(){ window.location.href = 'loginAlumno.php'; }, 100);</script>";
    }else{
    echo"ERROR INSERCIÓN";
    }
    // Redirección a la página principal
   //header("Location: AlmacenamientoFor.php");
}


// Función para insertar un nuevo registro en la base de datos
function insertarProfe($conexion) {

    $id_Profe = $_POST['Id_Profe'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['email']; 
    $contra = $_POST['contra'];
    
    //insertar dato 
    $insertar = "INSERT INTO registro_profe (id_Maestro,nombre,apellidos,correo,contra) 
    VALUES ( '$id_Profe', '$nombre', '$apellidos', '$correo', '$contra')";
    if (mysqli_query($conexion, $insertar)){
        echo "<script>alert('Inserción exitosa'); setTimeout(function(){ window.location.href = 'MaestroTabla.php'; }, 100);</script>";
    }else{
    echo"ERROR INSERCIÓN";
    }
    // Redirección a la página principal
   //header("Location: AlmacenamientoFor.php");
}

//Cargar calificaciones del profe
function cargarTablaProfe($conexion) {
    $consulta = "SELECT * FROM  registro_profe";
    $resultado = mysqli_query($conexion, $consulta);
     //color de tabla
     $columna = 0;
     $color = "#0b12d6";
     
    // Mostrar resultados en una tabla HTML
    while ($fila = mysqli_fetch_array($resultado)) {

    
        if($columna == 0){
            $columna = 1;
            $color = "#0b12d6";
        } else{
            $columna = 0;
            $color = "#f9f8fa";
        }
    
        echo "<tr bgcolor='$color'>";
        echo "<td><center>" . $fila['id_Maestro'] . "</center></td>";
        echo "<td><center>" . $fila['nombre'] . "</center></td>";
        echo "<td><center>" . $fila['apellidos'] . "</center></td>";
        echo "<td><center>" . $fila['correo'] . "</center></td>";
        echo "<td><center>" . $fila['contra'] . "</center></td>";
        echo "<td width='10%'>  <a href='eliminarProfesor.php?id=" . $fila['id_Maestro'] . "'>  <center> <img src= borrar.png height='50'> </a> <a href='editarProfe.php?id=" . $fila['id_Maestro'] . "'> <img src= edit.png height='50' > </a> </center> </td>";

        echo "</tr>";
    }


}

//Cargar calificaciones del alumnado
function cargarTablaCalificacion($conexion) {
    $consulta = "SELECT * FROM  cursado_alumnos";
    $resultado = mysqli_query($conexion, $consulta);
     //color de tabla
     $columna = 0;
     $color = "#0b12d6";
     
    // Mostrar resultados en una tabla HTML
    while ($fila = mysqli_fetch_array($resultado)) {

    
        if($columna == 0){
            $columna = 1;
            $color = "#0b12d6";
        } else{
            $columna = 0;
            $color = "#f9f8fa";
        }
    
        echo "<tr bgcolor='$color'>";
        echo "<td><center>" . $fila['Modo_Cursado'] . "</center></td>";
        echo "<td><center>" . $fila['Nivel'] . "</center></td>";
        echo "<td><center>" . $fila['Maestro'] . "</center></td>";
        echo "<td><center>" . $fila['Calificación'] . "</center></td>";
        echo "<td><center>" . $fila['ncontrol'] . "</center></td>";
        echo "<td><center>" . $fila['Carrera'] . "</center></td>";
        echo "<td width='10%'>  <a href='eliminarCalificacion.php?id=" . $fila['ncontrol'] . "'>  <center> <img src= borrar.png height='50'> </a> <a href='editarCalificacion.php?id=" . $fila['ncontrol'] . "'> <img src= edit.png height='50' > </a> </center> </td>";

        echo "</tr>";
    }


}



// Función para cargar datos desde la base de datos y mostrarlos en una tabla HTML
function cargarTabla($conexion) {
    $consulta = "SELECT * FROM  registro_user";
    $resultado = mysqli_query($conexion, $consulta);
     //color de tabla
     $columna = 0;
     $color = "#0b12d6";
     
    // Mostrar resultados en una tabla HTML
    while ($fila = mysqli_fetch_array($resultado)) {

    
        if($columna == 0){
            $columna = 1;
            $color = "#0b12d6";
        } else{
            $columna = 0;
            $color = "#f9f8fa";
        }
    
        echo "<tr bgcolor = $color>";
        echo "<td> <center>" . $fila['nombre'];
        echo "<td> <center>" . $fila['apellidos'];
        echo "<td> <center>" . $fila['correo'];
        echo "<td> <center>" . $fila['ncontrol'];
        echo "<td> <center>" . $fila['carrera'];
        echo "<td> <center>" . $fila['RFC'];
        echo "<td> <center>" . $fila['hora_registro'];
       
        echo "<td width='10%'>  <a href='eliminar.php?id=" . $fila['ncontrol'] . "'>  <center> <img src= borrar.png height='50'> </a> <a href='editar.php?id=" . $fila['ncontrol'] . "'> <img src= edit.png height='50' > </a> </center> </td>";

        echo "</tr>";
    }

    // Cierre de la conexión
    mysqli_close($conexion);
}


?>

