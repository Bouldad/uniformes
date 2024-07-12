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
    <title>Control de Uniformes</title>
    <link rel="stylesheet" href="css/entregauniforme.css">
    <script>
        function updateSizes() {
            const clothes = document.getElementById('clothes').value;
            const sizesSelect = document.getElementById('sizes');

            const sizes = {
                pantalon: ['28', '30', '32', '34', '36', '38' ,'40', '42'],
                playera: ['C', 'M', 'L', 'XL', 'XXL'],
                camisola: ['32', '34', '36', '38', '40', '42'],
                botas: ['22', '23', '24', '25', '26', '27', '28', '29'],
                gorra: ['Talla Unica']
            };

            // Limpiar las opciones del segundo select
            sizesSelect.innerHTML = '';

            // Agregar una opción predeterminada
            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = 'Seleccione una talla';
            sizesSelect.appendChild(defaultOption);

            // Si hay una prenda seleccionada, agregar las tallas correspondientes
            if (clothes) {
                const availableSizes = sizes[clothes];
                for (let size of availableSizes) {
                    const option = document.createElement('option');
                    option.value = size;
                    option.textContent = size;
                    sizesSelect.appendChild(option);
                }
            }
        }
    </script>
    <script>
        function cargarEmpleados() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'php/cargaempleado.php', true);
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
        
<!--diseño de formulario de registro de entrada a inventario de uniformes-->
    <form class="form-container" action="php/entregauniforme.php" method="post">
        
        <h1>Entrega de Uniformes</h1>
        
        <?php
    if (isset($_SESSION['mensaje'])) {
        echo '<p id="mensaje-exito" class="mensaje-exito" style="color: green;">' . $_SESSION['mensaje'] . '</p>';
        unset($_SESSION['mensaje']);
    }
    ?>
        <p class="form-group" id="fecha"><label for="fecha">Fecha:</label>
            <input type="datetime-local" name="fecha" placeholder="Fecha de entrega" required></p>

        <p class="form-group" name="nombre"><label for="nombre">Empleado:</label>
            <select name="nombre" id="nombre" required>
                <!-- Las opciones se cargarán aquí -->
            </select></p>
        
            <p p class="form-group">
                <label for="clothes">Uniforme:</label>
                <select id="clothes" name="uniforme" onchange="updateSizes()" required>
                    <option value="">Seleccione una prenda</option>
                    <option value="pantalon">Pantalón</option>
                    <option value="playera">Playera</option>
                    <option value="camisola">Camisola</option>
                    <option value="botas">Botas</option>
                    <option value="gorra">Gorra</option>
                </select>
            </p>
            <p p class="form-group">
                <label for="sizes">Talla:</label>
                <select id="sizes" name="talla" required>
                    <option value="">Seleccione una talla:</option>
                </select>
            </p>

        <p class="form-group" id="cantidad"><label for="cantidad">Cantidad:</label>
            <input type="text" name="cantidad" placeholder="Cantidad" required></p>

        <p class="form-group" id="estacion"><label for="estacion">Estacion:</label>
            <select name="estacion" placeholder="Estacion de Transferencia" required>
                <option value="Azcapotzalco">Azcapotzalco</option>
                <option value="Benito Juarez">Benito Juarez</option>
                <option value="Bordo">Bordo</option>
                <option value="Central Abastos">Central Abastos</option>
                <option value="Coyoacan">Coyoacan</option>
                <option value="Cuauhtemoc">Cuauhtemoc</option>
                <option value="Iztapalapa">Iztapalapa</option>
                <option value="Milpa Alta">Milpa Alta</option>
                <option value="San Juan">San Juan</option>
                <option value="San Juan GAM">San Juan GAM</option>
                <option value="Santa Catarina">Santa Catarina</option>
                <option value="Tlalpan">Tlalpan</option>
                <option value="Venustiano Carranza">Venustiano Carranza</option>
                <option value="Xochimilco">Xochimilco</option>
            </select>
            </p>
        
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
