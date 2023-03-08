<?php
    include "conn.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Inicio</title>
</head>
<body>
<?php
    
    $query = $conn -> query ("SELECT nombre from usuario");
    $valores = mysqli_fetch_array($query);

    session_start();    
    echo "<p> Perfil de  " . $_SESSION['sesion'] . "</p>";


?>
</body>
</html>