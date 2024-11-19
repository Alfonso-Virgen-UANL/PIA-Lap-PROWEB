<?php
include 'conexion.php'; // Conectar a la base de datos

// Obtener el idGenero desde la URL
$idGenero = $_GET['id'];

// Consultar el usuario a editar
$consulta = "SELECT * FROM generos WHERE idGenero = $idGenero";
$resultado = $conexion->query($consulta);
$genero = $resultado->fetch_assoc();
?>

</form>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albumfy - Gestor de Generos</title>
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
        <main>
        <h2>Editar Generos</h2>
<form action="update.php" method="POST">
    <input type="hidden" name="idGenero" value="<?php echo $genero['idGenero']; ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $genero['nombre']; ?>" required>
    <br>

    <button type="submit">Actualizar</button>
        </main>
        </div>
    <script src="script.js"></script>

</body>
</html>
