<?php
include "conn.php";
include "validacion.php";

echo "Connected successfully";

$url = $_SERVER['QUERY_STRING'];
parse_str($url, $params);
$valor = $params['valor'];
$estado = $params['estado'];

$sql = 'INSERT INTO juego_has_usuario (Juego_idJuego, Usuario_idUsuario, Nota, Estado) VALUES ("'.$valor.'", "'.$_SESSION["sesion"].'", "1", "'.$estado.'")';

if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
      
header("Location: inicio.php");     

?>