<?php
require_once 'config.php';
require_once 'library.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>La liga andaluza</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <h1>Clasificación</h1>
        </header>
        <main>
            <table border="1px">
                <tr><th>Equipo</th><th>Ciudad</th><th>Puntos</th><th>PJ</th><th>PG</th><th>PE</th><th>PP</th><th>GF</th><th>GE</th></tr>
                <?php
                $equipos = leerClasificacion($db);
                foreach ($equipos as $equipo) {
                    $nombre = $equipo['nombre'];
                    $ciudad = $equipo['ciudad'];
                    $puntos = $equipo['puntos'];
                    $pj = $equipo['pj'];
                    $pg = $equipo['pg'];
                    $pe = $equipo['pe'];
                    $pp = $equipo['pp'];
                    $gf = $equipo['gf'];
                    $ge = $equipo['ge'];
                    echo "<tr><td>$nombre</td><td>$ciudad</td><td>$puntos</td><td>$pj</td><td>$pg</td><td>$pe</td><td>$pp</td><td>$gf</td><td>$ge</td></tr>";
                }
                ?>
            </table>
        </main>
    </body>
</html>