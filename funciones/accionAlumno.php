
<?php

include("conexion.php");



$id = $_GET["id"];

function cargarTablaAlumno($conexion) {
    $consulta = "SELECT * FROM Cursado_Alumnos WHERE ncontrol = $id";
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
        echo "</tr>";
    }

    // Cierre de la conexión
    mysqli_close($conexion);
}


?>