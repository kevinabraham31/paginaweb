<?php
$id = $_GET["id"];
echo"
<html>
    <head>
        <title></title>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='estilosF.css'>
        <style>
            body {
                background: #0b12d6;
                color: white;
                font-family: 'Arial', sans-serif;
            }

            .menu th {
                padding: 10px;
                text-align: center;
            }

            .menu a {
                display: inline-block;
                padding: 10px 10px;
                margin: 10px;
                border: none;
                border-radius: 5px;
                text-align: center;
                text-decoration: none;
                cursor: pointer;
                color: white;
                font-size: 20px;
                transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            }

            .menu a:hover {
                background: linear-gradient(to right, #0b12d6, #f9f8fa); /* Color de fondo al pasar el ratón */
                color: #fff; /* Color de texto al pasar el ratón */
            }

            .menu a:active {
                transform: scale(0.15); /* Efecto de escala al hacer clic */
            }

            @media (max-width: 768px) {
                .menu th {
                    padding: 8px;
                    margin-top: 90px;
                }

                .menu a {
                   
                    font-size: 9px;
                    padding: 0px 0px;
                    margin-top: 40px;
                }
            }
        </style>
    </head>
    <body>
        <p></p> 
        <table border='0' width='100%' align='center'> 
            <tr class='menu' >
                <th width='20%'> <a href='InicioAdmin2.php?id=$id' target='info'>  <h3>INICIO</h3> </a> </th>
                <th width='20%'> <a href='AlmacenamientoFor.php' target='info'>  <h3>ALUMNOS</h3> </a> </th>
                <th width='20%'> <a href='MaestroTabla.php?id=$id' target='info'> <h3>DOCENTES</h3> </a></th>
                <th width='20%'> <a href='CalificaciónAlumnado.php?id=$id' target='info'> <h3> CALIFICACIONES</h3> </a></th>
                <th width='20%'> <a href='/juaquincelacome/bedolla/index.html' target='_top'>  <h3>REGRESAR</h3> </a> </th>
            </tr>
        </table>
    </body>
</html>
";
?>
