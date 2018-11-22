<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];
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
                <h1>Login</h1>
            </header>
            <main>
                <form action="plogin.php?url=<?php echo $url?>" method="POST" enctype="multipart/form-data">
                    <label>Usuario: </label><input type="text" name="usuario"/>
                    <br/>
                    <label>Clave: </label><input type="password" name="clave"/>
                    <br/>
                    <button type="submit">Identificarse</button>
                </form>
            </main>
        </body>
    </html>
    <?php
} else {
    header('Location: index.php');
}
?>