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
$sql = "SELECT * FROM albumes"; 

// Si hay una búsqueda, modifica la consulta
if (!empty($busqueda)) {
    $sql .= " WHERE nombre LIKE '%$busqueda%' OR idAlbumes LIKE '%$busqueda%' 
    OR idGenero LIKE '%$busqueda%'";
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
                <li><a href="C:/PIA-Lap-PROWEB/PaginasUsuario/PerfilUsuario.html">Perfil</a></li>
                <li><a href="C:/PIA-Lap-PROWEB/PaginasUsuario/ConfPerfilUsuario.html">Configuración de la cuenta</a></li>
                <li><a href="/PaginasAdministrativas/Solicitudes(Usuarios)/Solicitudes.php">Solicitudes de Albumes</a></li>
            </ul>
        </aside>

    <h1>Búsqueda de Solicitudes</h1>
    <!-- Resultados de la búsqueda -->
    <table class="search" border="1" style="background-color: white; height: min-content;" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Duración</th>
                <th>Fecha de Lanzamiento</th>
                <th>foto</th>
                <th>idArtista</th>
                <th>url</th>
                <th>idGenero</th>
                <th>estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $fila['idAlbumes']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['duracion']; ?></td>
                        <td><?php echo $fila['fechaLanzamiento']; ?></td>
                        <td><?php echo $fila['foto']; ?></td>
                        <td><?php echo $fila['idArtista']; ?></td>
                        <td><?php echo $fila['url']; ?></td>
                        <td><?php echo $fila['idGenero']; ?></td>
                        <td><?php echo $fila['estado']; ?></td>
                        
                        <td>
                            <a href="edit.php?id=<?php echo $fila['idAlbumes']; ?>">Editar</a>
                            <a href="delete.php?id=<?php echo $fila['idAlbumes']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php }
            } else {
                echo "<tr><td colspan='5'>No se encontraron resultados para '$busqueda'</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
    <script src="script.js"></script>

</body>
</html>