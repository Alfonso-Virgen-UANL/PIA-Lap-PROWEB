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
    <title>Albumfy - Solicitudes</title>
    <link rel="stylesheet" href="styles.css">
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
                        <a href="PerfilAdmin.html" class="NavDer">Mi perfil</a> 
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
                <li><a href="PerfilAdmin.html">Perfil</a></li>
                <li><a href="ConfPerfilAdmin.html">Configuración de la cuenta</a></li>
                <li><a href="CRUD Usuarios.html">CRUD de usuarios</a></li>
                <li><a href="CRUD Generos.html">CRUD de géneros</a></li>
                <li><a href="CRUD Albumes.html">CRUD de albumes</a></li>
                <li><a href="Solicitudes.html">Solicitudes de Albumes</a></li>
            </ul>
        </aside>

        <main class="content">
            <h2>Solicitudes de Albumes</h2>
            <div class="top-bar">
                
                <div class="search-bar">
                    <input type="text" id="search" placeholder="Buscar por ID, nombre o genero" />
                    <button class="btn-search">Buscar</button>
                </div>
                <button class="btn-add">Agregar</button>
            </div>
            <table class="user-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Album</th>
                        <th>Genero</th>
                        <th>Duración</th>
                        <th>Descripción</th>
                        <th>Foto</th>
                        <th>Aceptar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>NiceRem</td>
                        <td>Swiming</td>
                        <td>HipHop</td>
                        <td>10:20</td>
                        <td>Lorem ipsum, dolor sit amet consectetur</td>
                        <td>Foto</td>
                        <td><input type="checkbox" id="1" value="Solchkbx1"/></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>VegQuick</td>
                        <td>Nectar</td>
                        <td>ryb</td>
                        <td>10:20</td>
                        <td>Lorem ipsum, dolor sit amet consectetur</td>
                        <td>Foto</td>
                        <td><input type="checkbox" id="2" value="Solchkbx2"/></td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>