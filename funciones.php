<?php
include 'Producto.php';
function crearBD()
{
	global $nombre_bd,$pwd_bd,$usuario_bd, $servername;
	try {
	$conexion=new PDO("mysql:host=$servername", $usuario_bd, $pwd_bd);
	$sql="CREATE DATABASE IF NOT EXISTS $nombre_bd";
	$conexion->exec($sql);
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}
function crearTabla()
{
		global $nombre_bd,$pwd_bd,$usuario_bd, $servername;
	try {
	$conexion=new PDO("mysql:host=$servername; dbname=$nombre_bd", $usuario_bd, $pwd_bd);
	$sql="CREATE TABLE IF NOT EXISTS tienda (id INTEGER AUTO_INCREMENT, 
	nombre varchar(50),precio FLOAT, stock INTEGER, PRIMARY KEY(id))";
	$conexion->exec($sql);
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}

//grabarProducto($nombre_producto,$precio_producto, $stock_producto );
function grabarProducto($nombre_producto,$precio_producto, $stock_producto )
{
		global $nombre_bd,$pwd_bd,$usuario_bd, $servername;
	try {
	$conexion=new PDO("mysql:host=$servername; dbname=$nombre_bd", $usuario_bd, $pwd_bd);
	$sql="INSERT INTO tienda (nombre, precio, stock) VALUES ('$nombre_producto',
	'$precio_producto', '$stock_producto')";
	$conexion->exec($sql);
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}
function devolverProductos()
{
	$lista_productos=array() ;
	$producto1=new Producto(1,"Portatil", 20, 10);
	$producto2=new Producto(2,"Tele", 200, 15);
	$producto3=new Producto(3,"Raton", 10, 100);

	array_push($lista_productos, $producto1, $producto2, $producto3);
	return $lista_productos;
//Conexion
//SELECT
//return de lista de productos
}
function pintarTabla($lista_productos)
{
	$aux="<table>";
	for ($i=0; $i<count($lista_productos); $i++)
	{
		$producto=$lista_productos[$i];
		$nombre= $producto->get_nombre();
		$precio= $producto->get_precio();
		$stock= $producto->get_stock();
		$id= $producto->get_id();
		//$aux+=
		$aux.="<tr><td>$nombre</td>
		<td>$precio</td>
		<td>$stock</td>
		<td><a href='comprarproducto.php?id=$id'>Comprar</a></td></tr>";
		
	}
	$aux.="</table>";
	return $aux;
}
?>