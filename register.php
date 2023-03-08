<?php
    include "conn.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro de usuario</title>
    <link href="css/loginestilo.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="icon" type="image/jpg" href="img/favi.jpg" />
</head>
<body>
    <?php
        include "navlog.php";
    ?>
    <div class="formu">
        <form action="regcontrol.php" method="POST">
            <h1>Registro</h1>
            <p>
                <label>Nombre de Usuario: </label>
                <input type="text" name="nameuser">
            </p>
            <p>
                <label>Correo electronico: </label>
                <input type="email" name="corruser">
            </p>
            <p>
                <label>Contraseña: </label>
                <input type="password" name="pass">
            </p>
            <p class="boton">
                <button type="submit" name="" value="Submit">Insertar</button>
            </p>
        </form>
    </div>
</body>
</html>