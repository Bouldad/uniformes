<?php
session_start();
// Conexión a la base de datos
$servername = "localhost";
$username = "u962858637_root";
$password = "Tin990323761*";
$dbname = "u962858637_uniformes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener los datos del formulario
$username = $_POST['username'];
$password = md5($_POST['password']);

// Verificar el usuario en la base de datos
$sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];

    if ($row['role'] == 'administrador') {
        header("Location: ../inicio.php");
    } else if ($row['role'] == 'supervisor') {
        header("Location: ../inicio.php");
    }
    } else {
    
    // Redireccionar a registro.php después de la inserción exitosa
    header("Location: ../index.php");
    exit();
}

$conn->close();
?>
