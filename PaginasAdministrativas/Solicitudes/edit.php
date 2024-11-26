<?php
include 'conexion.php'; // Conectar a la base de datos

// Obtener el idUsuario desde la URL
$idUsuario = $_GET['id'];

// Consultar el usuario a editar
$consulta = "SELECT * FROM usuario WHERE idUsuario = $idUsuario";
$resultado = $conexion->query($consulta);
$usuario = $resultado->fetch_assoc();
?>

</form>
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
                        <a href="perfil.html" class="NavDer">Mi perfil</a> 
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
                <li><a href="perfil.html">Perfil</a></li>
                <li><a href="#">Configuración de la cuenta</a></li>
                <li><a href="CRUD Usuarios.php">CRUD de usuarios</a></li>
                <li><a href="CRUD Generos.php">CRUD de géneros</a></li>
                <li><a href="CRUD Albumes.php">CRUD de albumes</a></li>
                <li><a href="Solicitudes.php">Solicitudes de Albumes</a></li>
            </ul>
        </aside>
        <main>
        <h2>Editar Usuario</h2>
<form action="update.php" method="POST">
    <input type="hidden" name="idUsuario" value="<?php echo $usuario['idUsuario']; ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
    <br>

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" value="<?php echo $usuario['apellido']; ?>" required>
    <br>

    <label for="correo">Correo:</label>
    <input type="email" id="correo" name="correo" value="<?php echo $usuario['correo']; ?>" required>
    <br>

    <label for="contraseña">Contraseña:</label>
    <input type="password" id="contraseña" name="contraseña" value="<?php echo $usuario['contraseña']; ?>" required>
    <br>

    <label for="foto">URL de Foto:</label>
    <input type="text" id="foto" name="foto" value="<?php echo $usuario['foto']; ?>">
    <br>

    <label for="idRol">Rol:</label>
    <input type="number" id="idRol" name="idRol" value="<?php echo $usuario['idRol']; ?>" required>
    <br>

    <button type="submit">Actualizar</button>
        </main>
        </div>
    <script src="script.js"></script>

</body>
</html>
