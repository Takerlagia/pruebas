<?php
require_once 'library.php';
require_once 'config.php';

if (isset($_POST['elocal'])) {
    $local = $_POST['elocal'];
    $visitante = $_POST['evisitante'];
    $glocal = $_POST['glocal'];
    $gvisitante = $_POST['gvisitante'];
    if ($local != $visitante) {
        if (!existePartido($local, $visitante, $db)) {
            agregarPartido($local, $visitante, $glocal, $gvisitante, $db);
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
                        <p>El partido ya existe</p>
                        <a href="altaPartido.php">Volver</a>
                    </main>
                </body>
            </html>
            <?php
        }
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
                    <p>No se puede registrar un partido entre los mismos equipos.</p>
                    <a href="altaPartido.php">Volver</a>
                </main>
            </body>
        </html>
        <?php
    }
} else {
    header('Location: index.php');
}
?>
