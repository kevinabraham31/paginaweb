<?php
// Datos de la base de datos
$server= "localhost";
$user= "id21360332_kev";
$pass= "Dedo123456789#";
$db= "id21360332_registro";

// Crear conexión
$conn = new mysqli($server, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Preparar la consulta SQL
    $sql = "SELECT * FROM registro_admind WHERE usuario = ? AND contraseña = ?";

    // Crear una declaración preparada
    $stmt = $conn->prepare($sql);

    // Vincular los parámetros
    $stmt->bind_param("ss", $usuario, $contrasena);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener los resultados
    $result = $stmt->get_result();

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
      // El usuario y la contraseña son correctos
      // Puedes redirigir al usuario a otra página aquí
      session_start();
      
      $_SESSION['usuario'] = $usuario;
      $_SESSION['contrasena'] = $contrasena;
      header('Location: InicioAdmin.php');
    
      exit;


    } else {
        session_start();
        $_SESSION['error'] = 'Usuario o contraseña incorrectos';
        header('Location: loginAdmin.php');
        exit;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}
?>
