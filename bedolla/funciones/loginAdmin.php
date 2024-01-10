
<html>
<head>
    <title>Listado de personal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='estilosF.css'>
    <style>
        body {
            background: linear-gradient(to right, #4a148c, #536dfe);
            font-family: Arial, sans-serif;
            color: white;
        }
        #login {
            font-size: 24px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .entrada {
            width: 200px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            transition: background-color 0.5s ease;
        }
        .entrada:hover {
            background-color: rgba(255, 255, 255, 1);
        }
        .btn {
            margin-top: 30px;
            width: 70%;
            height: 40px;
            background: linear-gradient(to right, #0b12d6, #f9f8fa); 
            color: white;
            padding: 10px 60px;
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
    </style>
    <script>
        function validarFormulario() {
            var usuario = document.getElementById('usuario').value;
            var contrasena = document.getElementById('contrasena').value;

            if (usuario == '' || contrasena == '') {
                alert('Por favor, rellena todos los campos.');
                return false;
            }

            if (isNaN(usuario)) {
                alert('El campo de usuario solo debe contener números.');
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
<div class='container'>
    <center>
        <div id='login'>LOGIN ADMINISTRATIVO</div>
        <form action='verificacion.php' class= "form" method='POST' onsubmit='return validarFormulario()'>
            <input class='entrada' type='text' name='usuario' id='usuario' placeholder='Ingrese su usuario' required='true'>
            <input class='entrada' type='password' name='contrasena' id='contrasena' placeholder='Ingrese la contraseña' required='true'>
            <button class='btn' name='buscar'>INGRESAR</button>
            <a class='btn' href='../index.html'> REGRESAR </a>
        </form>
    </center>
 </div>
</body>
</html>

<?php
session_start();
if (isset($_SESSION['error'])) {
    echo "<script>alert('" . $_SESSION['error'] . "');</script>";
    unset($_SESSION['error']);
}
?>
