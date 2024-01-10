<?php
include("conexion.php");

// Elimina datos
function eliminarRegistro($conexion, $id)
{
    $elimina = "DELETE FROM registro_user WHERE (ncontrol = $id);";
    
    if (mysqli_query($conexion, $elimina)) {
        echo '<script>alert("Datos eliminados con éxito"); window.location.href = "AlmacenamientoFor.php";</script>';
        exit;
    } else {
        echo '<script>alert("Error de eliminación/inserción: ' . mysqli_error($conexion) . '"); window.location.href = "AlmacenamientoFor.php";</script>';
    }

    mysqli_close($conexion);
    exit; // Agrega esta línea para asegurarte de que el script se detenga después de redirigir
}

// Verifica si se proporcionó el parámetro "id" en la URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    eliminarRegistro($conexion, $id);
} else {
    echo "Error: No se proporcionó el parámetro 'id'.";
}

mysqli_close($conexion);
?>