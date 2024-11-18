<?php
include 'conexion.php'; // Conectar a la base de datos

$consulta = "SELECT * FROM usuario"; 
$resultado = $conexion->query($consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Registros</title>
</head>
<body>
<h2>Agregar Nuevo Usuario</h2>
<form action="create.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <br>

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required>
    <br>

    <label for="correo">Correo:</label>
    <input type="email" id="correo" name="correo" required>
    <br>

    <label for="contraseña">Contraseña:</label>
    <input type="password" id="contraseña" name="contraseña" required>
    <br>

    <label for="foto">URL de Foto:</label>
    <input type="text" id="foto" name="foto">
    <br>

    <label for="idRol">Rol:</label>
    <input type="number" id="idRol" name="idRol" required>
    <br>

    <button type="submit">Guardar</button>
</form>

    <h1>Registros de la tabla</h1>
    <table border="1">
        <thead>
            <tr>
                <th>idUsuario</th>
                <th>nombre</th>
                <th>apellido</th> <!-- Cambia los encabezados según tus columnas -->
                <th>correo</th>
                <th>contraseña</th>
                <th>foto</th>
                <th>idRol</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila['idUsuario'] . "</td>"; // Cambia 'id' por tus columnas
                    echo "<td>" . $fila['nombre'] . "</td>"; // Ejemplo
                    echo "<td>" . $fila['apellido'] . "</td>"; // Ejemplo
                    echo "<td>" . $fila['correo'] . "</td>";
                    echo "<td>" . $fila['contraseña'] . "</td>";
                    echo "<td>" . $fila['foto'] . "</td>";
                    echo "<td>" . $fila['idRol'] . "</td>";
                    echo "<td><a href='edit.php?id=" . $fila['idUsuario'] . "'>Editar</a></td>"; // Enlace para editar
                    echo "<td><a href='delete.php?id=" . $fila['idUsuario'] . "'>Eliminar</a></td>"; // Enlace para eliminar
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No hay registros</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
