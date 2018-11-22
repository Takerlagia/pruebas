<?php
require_once 'library.php';
require_once 'config.php';

if (isset($_POST['usuario'])) {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $email = $_POST['email'];
    if (!existeUsuario($usuario, $db)) {
        crearUsuario($usuario, $clave, $email, $db);
        header('Location: index.php');
    } else {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>La liga andaluza</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
            </head>
            <body>
                <main>
                    <p>El usuario ya existe.</p>
                    <a href="alta.php">Volver</a>
                </main>
            </body>
        </html>
        <?php
    }
} else {
    header('Location: index.php');
}
?>


