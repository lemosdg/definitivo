<?php

// datos para la conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$contrasena = "abc123.";
$base_datos = "gamelist";

// conexión a la base de datos
$conn = mysqli_connect($servidor, $usuario, $contrasena, $base_datos);

// comprobación de errores en la conexión
if (!$conn) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// código para interactuar con la base de datos

?>