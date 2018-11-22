<?php

require_once 'library.php';
require_once 'config.php';

if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $ciudad = $_POST['ciudad'];
    crearEquipo($nombre, $ciudad, $db);
}
header('Location: index.php');
?>


