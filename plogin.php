<?php
require_once 'library.php';
require_once 'config.php';

if (isset($_POST['usuario'])) {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $url = $_GET['url'];
    if (identificaUsuario($usuario, $clave, $db)) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("Location: $url");
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
                    <p> No es correcto el usuario o la contraseña </p>
                    <a href="login.php">Identificarse</a>
                    <a href="alta.php">Crear usuario</a>
                </main>
            </body>
        </html>
        <?php
    }
} else {
    header('Location: index.php');
}
?>
