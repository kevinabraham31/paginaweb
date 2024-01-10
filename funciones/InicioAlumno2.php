<?php
$server= "localhost";
$user= "root";
$pass= "";
$db= "Registro";

// Iniciar la sesión



  // Manejar el caso en que 'id' no se proporcionó en la URL
  session_start();

// Acceder a los valores de la sesión
if (isset($_GET['id'])) {
  $IdParaNombre = $_GET['id'];
} else {
  // Manejar el caso en que 'id' no se proporcionó en la URL
  $IdParaNombre = $_SESSION["IdProfe"];
}





// Crear conexión
$conn = new mysqli($server, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// El número de control ingresado por el usuario
$nombreUsuario = $IdParaNombre;

$sql = "SELECT nombre, apellidos FROM registro_user WHERE ncontrol = '$nombreUsuario'";
$result = $conn->query($sql);

$nombre = "";
$apellido = "";

if ($result->num_rows > 0) {
  // Mostrar los datos de cada fila
  while($row = $result->fetch_assoc()) {

    $nombre = $row["nombre"];
    $apellido = $row["apellidos"];
  }
} else {
  $nombre = " Alumnare ";


}


$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
  font-family: Arial, sans-serif;
  background: linear-gradient(to right, white, blue);
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}

h1 {
  font-size: 2em;
  text-align: center;
}

.container {
  text-align: center;
  max-width: 800px;
  padding: 20px;
  background: linear-gradient(to right, #0b12d6, #0b12d6); 
  border-radius: 25px;
  box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
}
</style>
</head>
<body>

<div class="container">
  
<h1>Bienvenid@ <?php echo $nombre . " " . $apellido ; ?></h1>

</div>

</body>
</html>
