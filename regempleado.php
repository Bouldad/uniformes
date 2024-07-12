<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Uniformes</title>
    <link rel="stylesheet" href="css/regempleado.css">
</head>
<body>
<a class="btnsalir" href="php/logout.php">Salir</a>
    <a class="btninicio" href="inicio.php">Inicio</a>
    
    
<!--diseño de formulario de registro de entrada a inventario de uniformes-->
    <form class="form-container" action="php/regempleado.php" method="post">
        <h1>Alta de Empleado</h1>
        <?php
    if (isset($_SESSION['mensaje'])) {
        echo '<p id="mensaje-exito" class="mensaje-exito" style="color: green;">' . $_SESSION['mensaje'] . '</p>';
        unset($_SESSION['mensaje']);
    }
    ?>
        <p class="form-group" id="fecharegistro"><label for="fecharegistro">Fecha de Registro:</label><br>
        <input type="datetime-local" name="fecharegistro" placeholder="Fecha de Registro" required></p>

        <p class="form-group" id="nombre"><label for="nombre">Nombre Completo:</label>
        <input type="text" name="nombre" placeholder="Nombre Completo" required></p>

        <p class="form-group" id="numempleado"><label for="numempleado">Numero de Empleado</label>
        <input type="text" name="numempleado" placeholder="Numero de Empleado" required></p>
        
        <p class="form-group" id="botones"><input type="submit" value="Registrar" name="registro">
        <input type="reset"></p>
</form>
<script>
        // Ocultar el mensaje después de 5 segundos
        setTimeout(function() {
            var mensaje = document.getElementById('mensaje-exito');
            if (mensaje) {
                mensaje.style.display = 'none';
            }
        }, 3000); // 5000 ms = 5 segundos
    </script>
</body>
</html>