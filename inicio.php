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
    $per = $conn -> query ('SELECT * from Usuario where idUsuario=' . $_SESSION['sesion'] . '');
    $valper = mysqli_fetch_array($per);

    echo "<header>";
    echo "<img class='perfilimg' src=".$valper['ImgUsuario'].">";
    echo "<h2 class='pefilnombre'> ".$valper['Nombre']." </h2>";
    echo "</header>";
?>

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
            <a class="submenu" href="">Completados</a>
            <a class="submenu" href="">Jugando</a>
            <a class="submenu" href="">Planeados</a>
        </div>
    </aside>
    <section>
        <?php
            $query = $conn -> query ('SELECT a.Juego_idJuego, a.Nota, a.Estado, j.Nombre Juego,  j.ImgJuego Imagen
            FROM juego_has_usuario a
            JOIN juego j
            ON a.Juego_idJuego = j.idJuego
            where a.Usuario_idUsuario= '. $_SESSION['sesion'] .';');
            while ($valores = mysqli_fetch_array($query)) {
                echo "<article>";
                echo "<div style='overflow:hidden'>";
                echo "<p class='estado'>".$valores['Estado']."</p>";
                echo "<p style='display: block' class='nota'>".$valores['Nota']."</p>";
                echo "<img class='imgjuego' src=".$valores['Imagen'].">";
                echo "</div>";
                echo "<div class='nome'>";
                echo "<p>".$valores['Juego']."</p>";
                echo "<img onclick='mostrarFormulario(".$valores['Juego_idJuego'].")' class='editimg' src='img/edit.svg'>";
                echo "</div>";
                echo "</article>";

                // ventana desplegable para editar

                echo "<div id=".$valores['Juego_idJuego']." class='editar' style='display:none;'>";
                echo '<div class="tituloedit">';
                echo "    <img class='caratula' src=".$valores['Imagen'].">";
                echo "    <h3>".$valores['Juego']."</h3>";
                echo '</div>';
                echo '<form method="post" action="edit.php">';
                echo "<input type='hidden' name='idjuego' value=".$valores['Juego_idJuego'].">";
                echo '    <div class="formuedit">';
                echo '        <div>';
                echo '            <label for="estado">Estado</label><br>';
                echo '            <select name="estado">';
                echo "                <option value='completado'>Completado</option>";
                echo "                <option value='jugando'>Jugando</option>";
                echo "                <option value='planeado'>Planeado</option>";
                echo '            </select>';
                echo '        </div>';
                echo '       <div>';
                echo '            <label for="nota">Nota</label><br>';
                echo "            <input type='number' name='nota' value=".$valores['Nota'].">";
                echo '        </div>';
                echo '    </div>';
                echo '    <div class="botones">';
                echo '        <input name="guardar" type="submit" value="Guardar cambios">';
                echo '        <input name="eliminar" type="submit" value="Eliminar Juego" class="eliminar">';
                echo '    </div>';
                echo "    <input class='cerrar' type='button' value='X' onclick='ocultarVentanaEmergente(".$valores['Juego_idJuego'].")'>";
                echo '</form>';
                echo '</div>';
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