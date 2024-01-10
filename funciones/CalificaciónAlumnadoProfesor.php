<?php

include("conexion.php");

$id = $_GET["id"];

//echo "$id";

//        <input class='btn input_btn' type='submit' value='Eliminar' name='eliminar'>
echo "<html><head><title>Listado de personal</title>  <link rel='stylesheet' href='estilosF.css'> 
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

.tablaAlumnoProfe {
    width: 90%; /* Cambia esto al ancho que desees */
}
@media (max-width: 768px) {
    .btn {
        width: 35%;
        padding: 12px 12px;
    }

    .entrada {
        width: 90%;
    }

    .tablaAlumnoProfe {
        width: 90%; /* Cambia esto al ancho que desees */
        height: 1px;
    }

    .tablaAlumnoProfe td, .tablaAlumnoProfe th {
        font-size: 14px; /* Reduce el tamaño de la fuente para pantallas pequeñas */
    }
    
}

</style>
</head><body>";
echo "<br><br><br>";
echo "

    <center>
    <div id='mensaje'>
    <legend style='color: #f9f8fa; font-size: 23px; font-weight: bold;' class='titulo'>CONCENTRADO DE CALIFICACIONES</legend>
    </div>
    <br><br> 
    <form action='CalificaciónAlumnadoProfesor.php?id=" . $id . "' method='POST'>
    <center>
        <input class='entrada' type='text' name='buscarR' id='BuscarR' placeholder=' Inserta numero de control'  required='true'>  
        <br><br>  

    <div class='cont__btn'>
            <button class='btn' name='buscar'>BUSCAR</button>
            <a class='btn' href='CalificaciónAlumnadoProfesor.php?id=" . $id . "'>ACTUALIZAR</a>
            <a class='btn' href='ForCalificaciones.php?id=$id'>AGREGAR</a>
        </div>
        </center>
    </form>
    </center>


    <br><br>
    <center><table border='1' bgcolor= 'white' class = 'tablaAlumnoProfe'>
    <tr>
        <th>Modo Cursado</th>
        <th>Nivel</th>
        <th>Maestro</th>
        <th>Calificacion</th>
        <th>Numcontrol</th>
        <th>Carrera</th>
        <th>Acciones</th>
    </tr>";

    
seleccionar($conexion, $id);

function seleccionar($conexion, $id){

    if(isset($_POST['buscar'])){
        buscarRegistro($conexion, $id);
    } else{      
    cargarTablaAlumno($conexion, $id);
    }
}
//BUSCAR
function buscarRegistro($conexion, $id){

    $buscarR = $_POST['buscarR'];
    $consulta = "SELECT * FROM cursado_alumnos WHERE (ncontrol = '$buscarR') AND (id_Maestro = '$id')  ;";
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
        echo "<td><center>" . $fila['Modo_Cursado'] . "</center></td>";
        echo "<td><center>" . $fila['Nivel'] . "</center></td>";
        echo "<td><center>" . $fila['Maestro'] . "</center></td>";
        echo "<td><center>" . $fila['Calificación'] . "</center></td>";
        echo "<td><center>" . $fila['ncontrol'] . "</center></td>";
        echo "<td><center>" . $fila['Carrera'] . "</center></td>";
       
        echo "<td width='10%'> <center> <a href='editarCalificacionProfe.php?id=" . $id . "& numControl= ". $fila['ncontrol'] ."'> <img src= edit.png height='50' > </a> </center> </td>";

        echo "</tr>";

        $registrosEncontrados = true;
    }
    
if ($registrosEncontrados) {
    echo "<script>alert('REGISTRO ENCONTRADO CON ÉXITO.');</script>";
} else {
    echo "<script>alert('REGISTRO NO ENCONTRADO.'); window.location.href = 'CalificaciónAlumnadoProfesor.php?id=$id';</script>";
}

} 

   
function cargarTablaAlumno($conexion, $id) {
    $consulta = "SELECT * FROM cursado_alumnos WHERE id_Maestro = $id";
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
        echo "<td width='10%'> <center> <a href='editarCalificacionProfe.php?id=" . $id . "& numControl= ". $fila['ncontrol'] ."'> <img src= edit.png height='50' > </a> </center> </td>";

        echo "</tr>";
    }

    // Cierre de la conexión
    mysqli_close($conexion);
}

echo "</table></center>

    
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

</body>";

?>