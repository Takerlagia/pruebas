<?php
require_once 'library.php';
require_once 'config.php';

session_start();
if (isset($_SESSION['usuario'])) {
    ?>
    <html>
        <head>
            <title>La liga andaluza</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
            <header>
                <h1>Alta de equipo</h1>
            </header>
            <main>
                <form action="paltaEquipo.php" method="POST" enctype="multipart/form-data">
                    <label>Nombre: </label><input type="text" name="nombre"/>
                    <br/>
                    <label>Ciudad</label>
                    <select name="ciudad">
                        <?php
                        $ciudades = leerCiudades($db);
                        foreach ($ciudades as $valor) {
                            echo "<option value='$valor'>$valor</option>";
                        }
                        ?>
                    </select>
                    <br/>
                    <button type="submit">Crear equipo</button>
                </form>
            </main>
        </body>
    </html>
    <?php
} else {
    header("Location: login.php?url=altaEquipo.php");
}
?>

