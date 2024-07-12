<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header("Location: php/login.php");
    exit();
}

$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesindex.css">
    <title>Control Uniformes</title>
</head>
<body>
    <a class="btnsalir" href="php/logout.php">Salir</a>
        <form class="container">
            <h1 class="title">Control de Uniformes, <?php echo $_SESSION['username']; ?></h1>
            <div class="menu">
                <?php if ($role == 'administrador'): ?>
                    <a href="regempleado.php" class="menu-button" onclick="location.href='regempleado.php'">Alta Empleado</a>
                    <!--<a href="reguniforme.php" class="menu-button" onclick="location.href='reguniforme.php'">Entrada Uniformes</a>-->
                    <a href="entregauniforme.php" class="menu-button" onclick="location.href='entregauniforme.php'">Entrega Uniforme</a>
                    <a href="consultaentrega.php" class="menu-button" onclick="location.href='consultaentrega.php'">Consulta Inventario</a>
                    <!--<a href="editarempleado.php" class="menu-button" onclick="location.href='editarempleado.php'">Editar Empleado</a>-->
                <?php elseif ($role == 'supervisor'): ?>
                    <a href="regempleado.php" class="menu-button" onclick="location.href='regempleado.php'">Alta Empleado</a>
                    <a href="entregauniforme.php" class="menu-button" onclick="location.href='entregauniforme.php'">Entrega Uniforme</a>
                    <a href="consultaentrada.php" class="menu-button" onclick="location.href='consultaentrada.php'">Consulta Inventario</a>
                    <?php else: ?>
                    <p>No tiene permisos para ver esta página.</p>
                <?php endif; ?>
            </div>
            </form>
</body>

</html>