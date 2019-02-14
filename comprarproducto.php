<?php
include 'funciones.php';

$id_producto=$_GET['id'];
echo($id_producto);
actualizarStock($id_producto);
header('Location: comprar.php');

?>