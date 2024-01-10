<?php

include("conexion.php");

/*<style>

// Estilo para los renglones pares 
tr:nth-child(even) {
    background-color: #f9f969;
}
//Estilo para los renglones impares 
tr:nth-child(odd) {
    background-color: #a3e698;
}
// Estilo para las celdas del encabezado 
th {
    background-color: #3498db; //Azul 
    color: #ffffff; // Texto blanco 
}
</style>
*/
//        <input class='btn input_btn' type='submit' value='Eliminar' name='eliminar'>
echo "<html><head><title>Listado de personal</title> <meta name='viewport' content='width=device-width, initial-scale=1.0'> <link rel='stylesheet' href='estilosF.css'> 
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
.TablaP{

    width: 90%; /* Cambia esto al ancho que desees */

}
@media (max-width: 768px) {
    .btn {
        width: 20%;
        padding: 10px 10px;
    }

    .entrada {
        width: 90%;
    }
    .TablaP {
        width: 100%; /* Cambia esto al ancho que desees */
        height: 1px;
    }

    .TablaP td, .TablaP th {
        font-size: 11px; /* Reduce el tamaño de la fuente para pantallas pequeñas */
    }
}
</style>
</head><body>";
echo "<br><br><br>";
echo "

    <center>
    <div id='mensaje'>
    <legend style='color: #f9f8fa; font-size: 23px; font-weight: bold;' class='titulo'>LISTA DE MAESTROS</legend>
    </div>
    <br><br> 
    <form action='MaestroTabla.php' method='POST'>
    <center>
        <input class='entrada' type='text' name='buscarR' id='BuscarR' placeholder=' Ingrese su ID'  required='true'>  
        <br><br>  

    <div class='cont__btn'>
            <button class='btn' name='buscar'>BUSCAR</button>
            <a class='btn' href='MaestroTabla.php'>ACTUALIZAR</a>
            <a class='btn' href='ForProfesor.html'>REGISTRAR</a>
        </div>
        </center>
    </form>
    </center>


    <br><br>
<center><table class='TablaP' border='1' bgcolor= 'white' >
<tr>
                    <th>Id_Profesor</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Acciones</th>
</tr>";
   

seleccionar($conexion);

function seleccionar($conexion){

    if(isset($_POST['buscar'])){
        buscarRegistro($conexion);
    } else{
        cargarTablaProfe($conexion);
    }
}
//BUSCAR
function buscarRegistro($conexion){

    $buscarR = $_POST['buscarR'];
    $consulta = "SELECT * FROM registro_profe WHERE (id_Maestro = '$buscarR');";
    $resultado = mysqli_query($conexion, $consulta);

    $columna = 0;
    $color = "#0b12d6";

    while($fila = mysqli_fetch_array($resultado)){
        
    
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

        $registrosEncontrados = true;
    }



    // Cierre de la conexión
    mysqli_close($conexion);



      
if ($registrosEncontrados) {
    echo "<script>alert('REGISTRO ENCONTRADO CON ÉXITO.');</script>";
} else {
    echo "<script>alert('REGISTRO NO ENCONTRADO.'); window.location.href = 'MaestroTabla.php';</script>";
}



} 

   
    
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