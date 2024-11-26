<?php
include 'VerPriv.php';
verificarPrivilegio("Gestionar usuarios");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albumfy - Perfil de Usuario</title>
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript" src="bootstrap.bundle.min.js"></script>
</head>
<body>
    <header>
        <nav>
            <table class="NavTab">
                <tr>
                    <td rowspan="3"><img src="/ContenidoAlbumify/AlbumifyLogo.png" class="logo"></td>
                    <td rowspan="1"><input type="text" placeholder="🔎¿Qué quieres buscar?" class="busqueda"></td>
                    <td rowspan="3">  
                        <a href="/Home/catalogo.html" class="NavMedio"> Catálogo</a>   
                        <a href="/AcercaDe/AcercaDe(UyA).html" class="NavMedio2">| Acerca de</a>
                    </td>
                    <td rowspan="3" class="fill"></td>
                    <td rowspan="3">
                        <a href="/.html" class="NavDer">Mi perfil</a> 
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
                <li><a href="/PIA-Lap-PROWEB/CRUDS/PerfilAdmin.html">Perfil</a></li>
                <li><a href="/PIA-Lap-PROWEB/PaginasUsuario/ConfPerfilAdmin.php">Configuración de la cuenta</a></li>
                <li><a href="/PIA-Lap-PROWEB/CRUDS/CRUD_Usuarios/CRUD_Usuarios.php">CRUD de usuarios</a></li>
                <li><a href="/PIA-Lap-PROWEB/CRUDS/CRUD_Generos/CRUD_Generos.php">CRUD de géneros</a></li>
                <li><a href="/PIA-Lap-PROWEB/CRUDS/CRUD_Albumes/CRUD_Albumes.php">CRUD de albumes</a></li>
                <li><a href="/PIA-Lap-PROWEB/CRUDS/Solicitudes/Solicitudes.php">Solicitudes de Albumes</a></li>
            </ul>
        </aside>

        <main class="content">
            <h2>Perfil</h2><br>
            <div id="perfil">
                <p><strong>Usuario Administrativo:</strong> Admin</p><br>
                <p><strong>Correo electrónico:</strong> usario.admin@gmail.com</p><br>
            </div>
        </main>
    </div>
</body>
</html>
