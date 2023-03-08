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
        <form action="login.php" method="POST">
            <h1>Iniciar sesion</h1>
            <p>
                <label>Nombre de Usuario: </label>
                <input type="text" name="">
            </p>
            <p>
                <label>Contraseña: </label>
                <input type="password" name="">
            </p>
            <p class="boton">
                <button type="submit" name="" value="Submit">Insertar</button>
            </p>
        </form>
    </div>
</body>
</html>