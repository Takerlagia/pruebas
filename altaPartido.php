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
                <h1>Alta de partido</h1>
            </header>
            <main>
                <form action="paltaPartido.php" method="POST" enctype="multipart/form-data">
                    <label>Local: </label>
                    <select name="elocal">
                        <?php
                        $equipos = leerEquipos($db);
                        foreach ($equipos as $valor) {
                            echo "<option value='$valor'>$valor</option>";
                        }
                        ?>
                    </select>
                    <input type="number" name="glocal"/> - <input type="number" name="gvisitante"/>
                    <label>Visitante:</label>
                    <select name="evisitante">
                        <?php
                        $equipos = leerEquipos($db);
                        foreach ($equipos as $valor) {
                            echo "<option value='$valor'>$valor</option>";
                        }
                        ?>
                    </select>
                    <br/>
                    <button type="submit">Guardar partido</button>
                </form>
            </main>
        </body>
    </html>
    <?php
} else {
    header("Location: login.php?url=altaPartido.php");
}
?>

