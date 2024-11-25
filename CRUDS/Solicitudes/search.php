<?php
// Conexión a la base de datos
include 'conexion.php'; // Conectar a la base de datos

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Capturar el valor de búsqueda (si existe)
$busqueda = isset($_GET['busqueda']) ? $conexion->real_escape_string($_GET['busqueda']) : '';

// Consulta base
$sql = "SELECT a.idAlbumes, a.nombre AS nombreAlbumes, a.duracion, a.fechaLanzamiento, a.foto, 
                ar.nombre AS nombreArtistas, a.url, g.nombre AS Genero, a.estado
         FROM albumes a
         INNER JOIN artista ar ON a.idArtista = ar.idArtista
         INNER JOIN generos g ON a.idGenero = g.idGenero"; 

// Si hay una búsqueda, modifica la consulta
if (!empty($busqueda)) {
    $sql .= " AND (a.nombre LIKE '%$busqueda%' 
              OR a.idAlbumes LIKE '%$busqueda%' 
              OR ar.nombre LIKE '%$busqueda%' 
              OR g.nombre LIKE '%$busqueda%')";
}

// Ejecutar la consulta
$resultado = $conexion->query($sql);



?>
 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda</title>
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
            <li><a href="/PIA-Lap-PROWEB/PaginasUsuario/PerfilUsuario.html">Perfil</a></li>
                <li><a href="/PIA-Lap-PROWEB/PaginasUsuario/ConfPerfilUsuario.html">Configuración de la cuenta</a></li>
                <li><a href="/PIA-Lap-PROWEB/CRUDS/CRUD_Usuarios/CRUD_Usuarios.php">CRUD de usuarios</a></li>
                <li><a href="/PIA-Lap-PROWEB/CRUDS/CRUD_Generos/CRUD_Generos.php">CRUD de géneros</a></li>
                <li><a href="/PIA-Lap-PROWEB/CRUDS/CRUD_Albumes/CRUD_Albumes.php">CRUD de albumes</a></li>
                <li><a href="/PIA-Lap-PROWEB/CRUDS/Solicitudes/Solicitudes.php">Solicitudes de Albumes</a></li>
            </ul>
        </aside>

    <h1>Búsqueda de Usuarios</h1>
    <!-- Resultados de la búsqueda -->
    <table class="search" border="1" style="background-color: white; height: min-content;" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Duración</th>
                <th>Fecha de Lanzamiento</th>
                <th>foto</th>
                <th>Artista</th>
                <th>url</th>
                <th>Genero</th>
                <th>estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila['idAlbumes'] . "</td>";
                    echo "<td>" . $fila['nombreAlbumes'] . "</td>";
                    echo "<td>" . $fila['duracion'] . "</td>";
                    echo "<td>" . $fila['fechaLanzamiento'] . "</td>";
                    echo "<td><img src='" . $fila['foto'] . "' alt='Imagen no disponible' style='width:100px;height:auto;'></td>";
                    echo "<td>" . $fila['nombreArtistas'] . "</td>";  // Nombre del artista
                    echo "<td><a href='" . $fila['url'] . "'>Escucha aquí</a></td>";
                    echo "<td>" . $fila['Genero'] . "</td>";  // Nombre del género
                    echo "<td>" . $fila['estado'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No hay registros</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
    <script src="script.js"></script>

</body>
</html>