<?php
include 'conexion.php'; // Conectar a la base de datos

// Obtener el idUsuario desde la URL
$idAlbumes = $_GET['id'];

// Consultar el album a editar
$consulta = "SELECT * FROM albumes WHERE idAlbumes = $idAlbumes";
$resultado = $conexion->query($consulta);
$albumes = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albumfy - Gestor de Albumes</title>
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
        <main>
        <h2>Editar Album</h2>
<form action="update.php" method="POST">
    <input type="hidden" name="idAlbumes" value="<?php echo $albumes['idAlbumes']; ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $albumes['nombre']; ?>" required>
    <br>

    <label for="duracion">Duracion:</label>
    <input type="time" id="duracion" name="duracion" value="<?php echo $albumes['duracion']; ?>" required>
    <br>

    <label for="fechaLanzamiento">fecha de Lanzamiento:</label>
    <input type="date" id="fechaLanzamiento" name="fechaLanzamiento" value="<?php echo $albumes['fechaLanzamiento']; ?>" required>
    <br>

    <label for="foto">url Foto:</label>
    <input type="url" id="foto" name="foto" value="<?php echo $albumes['foto']; ?>" required>
    <br>

    <label for="idArtista">idArtista:</label>
    <input type="number" id="idArtista" name="idArtista" value="<?php echo $albumes['idArtista']; ?>">
    <br>

    <label for="url">Link:</label>
    <input type="url" id="url" name="url" value="<?php echo $albumes['url']; ?>" required>
    <br>

    <label for="idGenero">idGenero:</label>
    <input type="number" id="idGenero" name="idGenero" value="<?php echo $albumes['idGenero']; ?>" required>
    <br>
    <label for="estado">Estado:</label>
    <input type="number" id="estado" name="estado" value="<?php echo $albumes['estado']; ?>" required>
    <br>
    <button type="submit">Actualizar</button>
    </form>
        </main>
        </div>
        
    <script src="script.js"></script>

</body>
</html>
