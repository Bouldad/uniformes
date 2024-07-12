<?php

session_start();

$servername = "localhost";
$username = "u962858637_root";
$password = "Tin990323761*";
$dbname = "u962858637_uniformes";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$fecharegistro = $_POST['fecharegistro'];
$nombre = strtoupper($_POST['nombre']);
$numempleado = strtoupper($_POST['numempleado']);

// Insertar los datos en la base de datos
$sql = "INSERT INTO empleado (fecharegistro, nombre, numempleado) VALUES ('$fecharegistro', '$nombre', '$numempleado')";

if ($conn->query($sql) === TRUE) {
    // Establecer el mensaje de éxito en una variable de sesión
    $_SESSION['mensaje'] = "¡El producto se registró con éxito!";
    // Redireccionar a registro.php después de la inserción exitosa
    header("Location: ../regempleado.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>

