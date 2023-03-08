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
        <form action="" method="POST">
        <?php
            include "inicontrol.php";
        ?>
            <h1>Iniciar sesion</h1>
            <p>
                <label>Nombre de Usuario: </label>
                <input type="text" name="user">
            </p>
            <p>
                <label>Contraseña: </label>
                <input type="password" name="pass">
            </p>
            <p class="boton">
                <button type="submit" name="btningresar" value="Submit">Insertar</button>
            </p>
        </form>
    </div>
</body>
</html>