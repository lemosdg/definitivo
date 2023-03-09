<?php
    include "conn.php";
    include "validacion.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Inicio</title>
  <link href="css/perfil.css" rel="stylesheet" type="text/css" media="screen"/>
  <link rel="icon" type="image/jpg" href="img/favi.jpg" />
</head>
<body>
<?php
    include "navperfil.php";
?>

<div class="filtros">
    <img >
    <img >
</div>

<main>
    <aside>
        <h3>Filtro</h3>
        <div class="divsubmenu">
            <a class="submenu" href="inicio.php">Todos</a>
            <a class="submenu" href="">Pasados</a>
            <a class="submenu" href="">Pasando</a>
            <a class="submenu" href="">Por pasar</a>
        </div>
    </aside>
    <section>
    <?php
                $query = $conn -> query ('SELECT a.Juego_idJuego, a.Nota, j.Nombre Juego,  j.ImgJuego Imagen
                FROM juego_has_usuario a
                JOIN juego j
                ON a.Juego_idJuego = j.idJuego
                where a.Usuario_idUsuario= '. $_SESSION['sesion'] .';');
                while ($valores = mysqli_fetch_array($query)) {
                    
                    echo "<article>";
                    echo "<div style='overflow:hidden'>";
                    echo "<p style='background-color:rgb(8, 153, 8)' class='estado'>pasado</p>";
                    echo "<p style='display: block' class='veces'>1</p>";
                    echo "<img class='imgjuego' src=".$valores['Imagen'].">";
                    echo "</div>";
                    echo "<div class='nome'>";
                    echo "<p>".$valores['Juego']."</p>";
                    echo "</div>";
                    echo "</article>";
                }
            ?>
    </section>
</main>

<footer>
    <ul class="ulfooter">
        <a href="https://github.com/lemosdg"><li class="lifooter">
            <img class="logo" src="imagenes/github.png" alt="github"><p>Github</p>
        </li></a>
    </ul>
    <ul class="ulfooter">
        <li class="lifooter">
            <p>Politicas de privacidad</p>
        </li>
        <li class="lifooter">
            <p>Politicas de coockies</p>
        </li>
    </ul>
</footer>
</body>
</html>