<?php
include "conn.php";

echo "Connected successfully";
$nombre = $_POST["nameuser"];
$correo = $_POST["corruser"];
$clave = $_POST["pass"];


$sql = 'INSERT INTO usuario (Nombre, Correo, Clave, Rol_Usuario_idRol) VALUES ("'.$nombre.'", "'.$correo.'", "'.$clave.'", "3")';

if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
      
header("Location: inises.php");     

?>