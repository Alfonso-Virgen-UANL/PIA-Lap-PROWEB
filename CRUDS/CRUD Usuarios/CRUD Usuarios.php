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
    <title>Albumfy - Gestor de Usuarios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <table class="NavTab">
                <tr>
                    <td rowspan="3"><img src="AlbumifyLogo.png" class="logo"></td>
                    <td rowspan="1"><input type="text" placeholder="🔎¿Qué quieres buscar?" class="busqueda"></td>
                    <td rowspan="3">  
                        <a href="catalogo.html" class="NavMedio"> Catálogo</a>   
                        <a href="/AcercaDe/AcercaDe(UyA).html" class="NavMedio2">| Acerca de</a>
                    </td>
                    <td rowspan="3" class="fill"></td>
                    <td rowspan="3">
                        <a href="C:/PIA-Lap-PROWEB/PaginasUsuario/PerfilUsuario.html" class="NavDer">Mi perfil</a> 
                    </td>
                </tr>
                <tr>
                  <td><a href="index.html" class="TextoNav">| Home</a></td>
                </tr>
              </table>
        </nav>
    </header>
    <div class="layout">
        <aside class="side-nav">
            <ul>
                <li><a href="C:/PIA-Lap-PROWEB/PaginasUsuario/PerfilUsuario.html">Perfil</a></li>
                <li><a href="C:/PIA-Lap-PROWEB/PaginasUsuario/ConfPerfilUsuario.html">Configuración de la cuenta</a></li>
                <li><a href="/PaginasAdministrativas/CRUD Usuarios/CRUD Usuarios.php">CRUD de usuarios</a></li>
                <li><a href="/PaginasAdministrativas/CRUD Generos/CRUD Generos.php">CRUD de géneros</a></li>
                <li><a href="/PaginasAdministrativas/CRUD Albumes/CRUD Albumes.php">CRUD de albumes</a></li>
                <li><a href="/PaginasAdministrativas/Solicitudes/Solicitudes.php">Solicitudes de Albumes</a></li>
            </ul>
        </aside>

        <main class="content">
            <h2>Gestión de Usuarios</h2>
        <div class="top-bar">
                
            <div class="search-bar">
                <form method="GET" action="search.php">
                    <input type="text" id="search" name="busqueda" placeholder="Buscar por ID, usuario o correo" required />
                    <button class="btn-search" type="submit">Buscar</button>
                </form>
                
            </div>

                
                <button id="btnAgregar" class="btn-add">Agregar</button>
                <button id="btnCancelar" class="btn-cncl">Cancelar</button>
        </div>
<form id="formulario" action="create.php" method="POST">
<h2>Agregar Nuevo Usuario</h2>
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
    <input type="text" id="foto" name="foto" required>
    <br>

    <label for="idRol">Rol:</label>
    <input type="number" id="idRol" name="idRol" required>
    <br>

    <button type="submit">Guardar</button>
</form>

    <h1>Registros de la tabla</h1>
    <table border="1" class="BD">
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
        </main>
    </div>
    <script src="script.js"></script>

</body>
</html>
