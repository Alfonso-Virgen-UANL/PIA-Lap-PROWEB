<?php
include 'VerPriv.php';
verificarPrivilegio("Gestionar usuarios");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albumfy - Configuración de Perfil de Usuario</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="bootstrap.min.css">
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
                        <a href="PerfilUsuario.html" class="NavDer">Mi perfil</a> 
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
        <li><a href="/CRUDS/PerfilAdmin.php">Perfil</a></li>
                <li><a href="/CRUDS/ConfPerfilAdmin.php">Configuración de la cuenta</a></li>
                <li><a href="/CRUDS/CRUD_Usuarios/CRUD_Usuarios.php">CRUD de usuarios</a></li>
                <li><a href="/CRUDS/CRUD_Generos/CRUD_Generos.php">CRUD de géneros</a></li>
                <li><a href="/CRUDS/CRUD_Albumes/CRUD_Albumes.php">CRUD de albumes</a></li>
                <li><a href="/CRUDS/Solicitudes/Solicitudes.php">Solicitudes de Albumes</a></li>
            </ul>
        </aside>

        <main class="content">
            <h2>Configuración de Perfil</h2><br>
            <div class="row">
                <div class="col-5" id="datoscuenta">
                    <div>
                        <h3>Cambiar datos de la cuenta</h3>
                        <form action="">
                            <label class="labelconf" >Cambiar E-mail</label><br>
                            <input class="inp" type="email" id="newemail" name="uemail"><br><br>
                            <label class="labelconf" for="uemail">Cambiar nombre de usuario</label><br>
                            <input class="inp" type="text" id="newnomb" name="uemail"><br><br>
                            <label class="labelconf" for="ucont">Contraseña actual</label><br>
                            <input class="inp" type="text" id="cont" name="cont"><br><br>
                            <input id="bot" type="submit" value="Cambiar datos">
                        </form>
                    </div> 
                </div>
                <div class="col-5" id="cambcont">
                    <div>
                        <h3>Cambiar contraseña</h3>
                        <form action="">
                            <label class="labelconf" for="ucont">Contraseña actual</label><br>
                            <input class="inp" type="text" id="cont" name="cont"><br><br>
                            <label class="labelconf" for="ucont">Nueva contraseña</label><br>
                            <input class="inp" type="text" id="nuecont" name="nuecont"><br><br>
                            <label class="labelconf" for="ucont">Confirmar nueva contraseña</label><br>
                            <input class="inp" type="text" id="confnuecont" name="confnuecont"><br><br>
                            <input id="bot" type="submit" value="Cambiar contraseña">
                        </form>
                    </div> 
                </div>
            </div>
        </main>
    </div>
</body>
</html>
