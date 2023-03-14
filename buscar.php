<?php
    include "conn.php";
    include "validacion.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Inicio</title>
  <link rel="icon" type="image/jpg" href="img/favi.jpg" />
  <link href="css/perfil.css" rel="stylesheet" type="text/css" media="screen"/>
  <script src="js/perfil.js"></script>
</head>
<body>
    
<?php
    include "navperfil.php";
?>
<main>
    <section>
        <?php
            $cadena = $_GET["chain"];

            $query = $conn -> query ("SELECT * from juego where Nombre like '%$cadena%'");
            while ($valores = $query->fetch_array()) {
                            
                echo "<article>";
                echo "<div style='overflow:hidden'>";
                echo "<img class='imgjuego' src=".$valores['ImgJuego'].">";
                echo "</div>";
                echo "<div class='nome'>";
                echo "<p>".$valores['Nombre']."</p>";
                echo "</div>";
                echo "</article>";
            }
        ?>
    </section>
</main>
<footer>
    <ul class="ulfooter">
        <a href="https://github.com/lemosdg"><li class="lifooter">
            <img class="logo" src="img/github.png" alt="github"><p>Github</p>
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