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
<html>
<head>
    <link rel="stylesheet" href="css/formconsulta.css">
    <title>Consulta de Entrada de Uniformes</title>
    <script>
        function cargarEmpleados() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'php/cargaentrega.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('nombre').innerHTML = xhr.responseText;
                } else {
                    console.error('Error al cargar los empleados.');
                }
            };
            xhr.send();
        }

        window.onload = function() {
            cargarEmpleados();
        };
    </script>
    
</head>
<body>
<a class="btnsalir" href="php/logout.php">Salir</a>
<a class="btninicio" href="inicio.php">Inicio</a>

    <form class="form-container" method="POST" action="php/consultaentrega.php">

    <p class="form-group" name="nombre">
        <label for="nombre">Nombre del Empleado:</label>
            <select name="nombre" id="nombre" required>
                <!-- Las opciones se cargarán aquí -->
            </select></p>

        <p class="form-group"><label for="fecha_inicio">Fecha Inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio"></p>

        <p class="form-group"><label for="fecha_fin">Fecha Fin:</label>
        <input type="date" id="fecha_fin" name="fecha_fin"></p>

        <p class="form-group"><input type="submit" value="Consultar"></p>
    </form>
</body>
</html>
