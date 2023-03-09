<?php
    include "conn.php";
    include "validacion.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Inicio</title>
</head>
<body>
<?php    
    $query=$conn->query(' select * from usuario where idUsuario= '. $_SESSION["sesion"]);
    $valores=mysqli_fetch_array($query);
    echo "<p> Perfil de " . $valores['Nombre'] . "</p></br>";
    echo "<p> Correo " . $valores['Correo'] . "</p>";


?>
</body>
</html>