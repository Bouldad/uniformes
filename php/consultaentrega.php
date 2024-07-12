<?php
// consulta.php
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

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : '';
$fecha_fin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : '';

$sql = "SELECT * FROM entregauniforme WHERE 1=1";

if ($nombre != '') {
    $sql .= " AND nombre LIKE '%" . $conn->real_escape_string($nombre) . "%'";
}
if ($fecha_inicio != '' && $fecha_fin != '') {
    $sql .= " AND fecha BETWEEN '" . $conn->real_escape_string($fecha_inicio) . "' AND '" . $conn->real_escape_string($fecha_fin) . "'";
} elseif ($fecha_inicio != '') {
    $sql .= " AND fecha >= '" . $conn->real_escape_string($fecha_inicio) . "'";
} elseif ($fecha_fin != '') {
    $sql .= " AND fecha <= '" . $conn->real_escape_string($fecha_fin) . "'";
}

// Añadir la cláusula ORDER BY para ordenar por fecha
$sql .= " ORDER BY fecha ASC";

$result = $conn->query($sql);
//------------------------------------------------------------------------------

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/consulta.css">
    <title>Resultados de Consulta</title>
    
    <script>
        function printDiv() {
            window.print();
        }
    </script>
</head>
<body>
    <a class="btnsalir" href="../inicio.php">Salir</a>
    <a class="btnatras" href="../consultaentrega.php">Atras</a>
    <a class="btninicio" href="../inicio.php">Inicio</a>
    <h2>Resultados de Consulta</h2>
    <a class="btnimprimir" onclick="printDiv()">Imprimir</a>
    <div id="printableArea">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Empleado</th>
                    <th>Accesorio</th>
                    <th>Talla</th>
                    <th>Cantidad</th>
                    <th>Estacion</th>
                </tr>
            </thead>
            <?php
            //$totalCantidad = 0;
            //$totalMonto = 0;

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Sumar cantidad y montofactura para el total
                    //$totalCantidad += $row['cantidad'];
                    //$totalMonto += $row['montofactura'];

                    // Formatear el campo montofactura como moneda
                    //$monto_formateado = number_format($row['montofactura'], 2, ',', '.');

                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['fecha']}</td>
                            <td>{$row['nombre']}</td>
                            <td>{$row['uniforme']}</td>
                            <td>{$row['talla']}</td>
                            <td>{$row['cantidad']}</td>
                            <td>{$row['estacion']}</td>
                        </tr>";
                }
                // Mostrar fila de total
                //$totalMonto_formateado = number_format($totalMonto, 2, ',', '.');
                echo "<tr class='total-row'>
                        
                    </tr>";
            } else {
                echo "<tr><td colspan='7'>No se encontraron resultados</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
