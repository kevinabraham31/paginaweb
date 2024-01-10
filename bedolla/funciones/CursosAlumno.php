<?php

include("conexion.php");

$id = $_GET["id"];

//echo "$id";

echo "<html> <head> <title>Listado de personal</title>  <link rel='stylesheet' href='BtnEstilo.css'> 
<style>
body {
    background: linear-gradient(to right, #0b12d6, #f9f8fa);
    background-size: 400% 400%;
    
}
.btn {
    margin-top: 30px;
    width: 10%;
    height: 40px;
    background: linear-gradient(to right, #0b12d6, #f9f8fa); 
    color: white;
    padding: 10px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
    transition: background-color 0.5s ease, box-shadow 0.5s ease;
}
.btn:hover {
    transform: scale(1.1); 
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); 
    background: linear-gradient(to left , #fff12a, #f84141);
}

.entrada {
    width: 20%; /* Cambia el valor de width según tus necesidades */
    height: 30px;
    border: none;
    border-bottom: 2px solid #0726d5; 
    outline: none;
    margin-bottom: 5px;
}
</style>

</head> <body>
    <br><br><br>

    <center>
    <div id='mensaje'>
    <legend style='color: #f9f8fa; font-size: 23px; font-weight: bold;' class='titulo'>HISTORIAL DE CURSOS</legend>
    </div>
    <br><br> 
    </center>


    <br><br>
<center><table border='1' bgcolor= 'white' width = '90%' height='20%'>
<tr>
                    <th>Curso</th>
                    <th>Nivel</th>
                    <th>Maestro</th>
                    <th>Calificación</th>
                    <th>Numcontrol</th>
                    <th>Carrera</th>
</tr>";


function cargarTablaAlumno($conexion, $id) {
    $consulta = "SELECT * FROM cursado_alumnos WHERE ncontrol = $id";
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

cargarTablaAlumno($conexion, $id);

echo "</table></center>

    
    <script>
        // Obtén el cuerpo y el elemento con id 'mensaje'
        var body = document.body;
        var mensaje = document.getElementById('mensaje');

        // Aplica los estilos al cuerpo
       
        body.style.fontFamily = 'Arial, sans-serif';
        body.style.textAlign = 'center';

        // Aplica los estilos al elemento con id 'mensaje'
        mensaje.style.fontSize = '50px';
        mensaje.style.color = '#ff0000'; /* Color rojo */
    </script>

</body>";

/*<tr>
<td>".$contador."</td>
<td>" .$nombre." ".$apellidos."</td>
<td>".$control."</td>
<td>".$carrera."</td>
<td>".$hora_registro."</td>
</tr>*/
?>