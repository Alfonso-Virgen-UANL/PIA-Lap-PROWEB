<?php
include 'conexion.php'; // Conectar a la base de datos
$consulta = "SELECT a.idAlbumes, a.nombre AS nombreAlbumes, a.duracion, a.fechaLanzamiento, a.foto, 
                ar.nombre AS nombreArtistas, a.url, g.nombre AS Genero, a.estado
             FROM albumes a
             INNER JOIN artista ar ON a.idArtista = ar.idArtista
             INNER JOIN generos g ON a.idGenero = g.idGenero
             WHERE estado = 0
             ORDER BY a.idArtista ASC";  
$resultado = $conexion->query($consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albumfy - Solicitudes</title>
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
                        <a href="/Home/catalogo.html" class="NavMedio"> Catálogo</a>   
                        <a href="/AcercaDe/AcercaDe(UyA).html" class="NavMedio2">| Acerca de</a>
                    </td>
                    <td rowspan="3" class="fill"></td>
                    <td rowspan="3">
                        <a href="C:/PIA-Lap-PROWEB/PaginasUsuario/PerfilUsuario.html" class="NavDer">Mi perfil</a> 
                    </td>
                </tr>
                <tr>
                  <td><a href="/HomeTendencias/Home.html" class="TextoNav">| Home</a></td>
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

        <main class="content">
            <h2>Solicitudes</h2>
            <div class="top-bar">
                
            <div class="search-bar">
                <form method="GET" action="search.php">
                    <input type="text" id="search" name="busqueda" placeholder="Buscar por ID, nombre" required />
                    <button class="btn-search" type="submit">Buscar</button>
                </form>
                
            </div>
                <button id="btnAgregar"class="btn-add">Agregar</button>
                <button id="btnCancelar" class="btn-cncl">Cancelar</button>
            </div>

            <form id="formulario" action="create.php" method="POST">
<h2>Agregar Nuevo Album</h2>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <br>

    <label for="duracionhrs">Duracion (hrs):</label>
    <input style="width: 50px;" type="number" id="duracionhrs" name="duracionhrs" required>
    <label for="duracionmin">Duracion (min):</label>
    <input style="width: 50px;" type="number" id="duracionmin" name="duracionmin" required>
    <label for="duracionseg">Duracion (seg):</label>
    <input style="width: 50px;" type="number" id="duracionseg" name="duracionseg" required>
    <br>


    <label for="fechaLanzamiento">Fecha de Lanzamiento:</label>
    <input type="date" id="fechaLanzamiento" name="fechaLanzamiento" required>
    <br>

    <label for="foto">URL de Foto:</label>
    <input type="text" id="foto" name="foto" required>
    <br>

    <label for="idArtista">Artista:</label>
    <select id="idArtista" name="idArtista" required>
    <?php
    $consultaArtistas = "SELECT idArtista, nombre FROM artista"; // Obtén los artistas de la base de datos
    $resultArtistas = $conexion->query($consultaArtistas);
    while ($row = $resultArtistas->fetch_assoc()) {
        echo "<option value='" . $row['idArtista'] . "'>" . $row['nombre'] . "</option>";
    }
    ?>
    </select>
    <br>

    <label for="url">Link:</label>
    <input type="url" id="url" name="url" required>
    <br>

    <label for="idGenero">Género:</label>
    <select id="idGenero" name="idGenero" required>
    <?php
    $consultaGeneros = "SELECT idGenero, nombre FROM generos"; // Obtén los géneros de la base de datos
    $resultGeneros = $conexion->query($consultaGeneros);
    while ($row = $resultGeneros->fetch_assoc()) {
        echo "<option value='" . $row['idGenero'] . "'>" . $row['nombre'] . "</option>";
    }
    ?>
    </select>
    <br>

    <label for="estado">Estado:</label>
    <input type="number" id="estado" name="estado" required>
    <br>

    <button type="submit">Guardar</button>
</form>

    <h1>Registros de la tabla</h1>
    <table border="1" class="BD">
        <thead>
            <tr>
                <th>idAlbumes</th>
                <th>nombre</th>
                <th>duracion</th> <!-- Cambia los encabezados según tus columnas -->
                <th>fechaLanzamiento</th>
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
                    echo "<td>" . $fila['idAlbumes'] . "</td>"; // Cambia 'id' por tus columnas
                    echo "<td>" . $fila['nombreAlbumes'] . "</td>"; // Ejemplo
                    echo "<td>" . $fila['duracion'] . "</td>"; // Ejemplo
                    echo "<td>" . $fila['fechaLanzamiento'] . "</td>";
                    echo "<td><img src='" . $fila['foto'] . "' alt='Imagen no disponible' style='width:100px;height:auto;'></td>";
                    echo "<td>" . $fila['nombreArtistas'] . "</td>";
                    echo "<td><a href='" . $fila['url'] . "'>Escucha aquí</a></td>";
                    echo "<td>" . $fila['Genero'] . "</td>";
                    echo "<td>" . $fila['estado'] . "</td>";
                    echo "<td><a href='aprobar.php?id=" . $fila['idAlbumes'] . "'>Aprobar</a></td>";
                    echo "</tr>";
                }
            }
             else {
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
