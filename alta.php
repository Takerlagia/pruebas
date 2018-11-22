<!DOCTYPE html>
<html>
    <head>
        <title>La liga andaluza</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <h1>Alta de usuario</h1>
        </header>
        <main>
            <form action="palta.php" method="POST" enctype="multipart/form-data">
                <label>Usuario: </label><input type="text" name="usuario"/>
                <br/>
                <label>Clave: </label><input type="password" name="clave"/>
                <br/>
                <label>Email: </label><input type="email" name="email"/>
                <br/>
                <button type="submit">Crear usuario</button>
            </form>
        </main>
    </body>
</html>