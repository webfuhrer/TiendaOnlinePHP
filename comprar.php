<?php
include 'variables.php';
include 'funciones.php';//Aquí ya está incluido Producto.php


$lista_productos=devolverProductos();
$texto_tabla=pintarTabla($lista_productos);

?>
<html>
<head>

</head>
<body>

<?php 
echo $texto_tabla;
?>
</body>
</html>