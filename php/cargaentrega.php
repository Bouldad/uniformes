<?php
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
$sql = "SELECT DISTINCT nombre FROM empleado";
$sql = "SELECT nombre FROM empleado ORDER BY nombre ASC";
$result = $conn->query($sql);

$options = "";
if ($result->num_rows > 0) {
    // Salida de datos por cada fila
    while($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row["nombre"] . "'>" . $row["nombre"] . "</option>";
    }
} else {
    $options = "<option value=''>No hay empleados</option>";
}
//
$conn->close();
echo $options;
//aqui finaliza la conexion para el campo nombre_____________________________________


?>

        
    