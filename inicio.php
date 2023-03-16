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
        <form action="">
            <div class="divsubmenu">
                <button type="submit" class="submenu styled-button" name="filtro" value="todos">Todos</button>
                <button type="submit" class="submenu styled-button" name="filtro" value="completado">Completados</button>
                <button type="submit" class="submenu styled-button" name="filtro" value="jugando">Jugando</button>
                <button type="submit" class="submenu styled-button" name="filtro" value="planeado">Planeados</button>
                <?php
                    $url = $_SERVER['QUERY_STRING'];
                    parse_str($url, $params);
                    if (!empty($params['filtro'])){
                        $filtro = $params['filtro'];
                    } elseif (empty($params['filtro'])){
                        $filtro = 'todos';
                    }
                ?>
            </div>
        </form>
    </aside>
    <section>
        <?php
            if ($filtro=='completado'){
                $query = $conn -> query ('SELECT a.Juego_idJuego, a.Nota, a.Estado, j.Nombre Juego,  j.ImgJuego Imagen
                FROM juego_has_usuario a
                JOIN juego j
                ON a.Juego_idJuego = j.idJuego
                where a.Usuario_idUsuario= '. $_SESSION['sesion'] .' and estado in ("completado");');
            } elseif ($filtro=='jugando'){
                $query = $conn -> query ('SELECT a.Juego_idJuego, a.Nota, a.Estado, j.Nombre Juego,  j.ImgJuego Imagen
                FROM juego_has_usuario a
                JOIN juego j
                ON a.Juego_idJuego = j.idJuego
                where a.Usuario_idUsuario= '. $_SESSION['sesion'] .' and estado in ("jugando");');
            } elseif ($filtro=='planeado'){
                $query = $conn -> query ('SELECT a.Juego_idJuego, a.Nota, a.Estado, j.Nombre Juego,  j.ImgJuego Imagen
                FROM juego_has_usuario a
                JOIN juego j
                ON a.Juego_idJuego = j.idJuego
                where a.Usuario_idUsuario= '. $_SESSION['sesion'] .' and estado in ("planeado");');
            } else{
                $query = $conn -> query ('SELECT a.Juego_idJuego, a.Nota, a.Estado, j.Nombre Juego,  j.ImgJuego Imagen
                FROM juego_has_usuario a
                JOIN juego j
                ON a.Juego_idJuego = j.idJuego
                where a.Usuario_idUsuario= '. $_SESSION['sesion'] .';');
            }
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
                echo '        <div class="nameinser">';
                echo '            <label class="label" for="estado">Estado</label>';
                if ($valores['Estado']=='completado'){
                    echo '            <select class="selec" name="estado">';
                    echo "                <option value='completado' selected>Completado</option>";
                    echo "                <option value='jugando'>Jugando</option>";
                    echo "                <option value='planeado'>Planeado</option>";
                    echo '            </select>';
                } elseif ($valores['Estado']=='jugando'){
                    echo '            <select class="selec" name="estado">';
                    echo "                <option value='completado'>Completado</option>";
                    echo "                <option value='jugando' selected>Jugando</option>";
                    echo "                <option value='planeado'>Planeado</option>";
                    echo '            </select>';
                } elseif ($valores['Estado']=='planeado'){
                    echo '            <select class="selec" name="estado">';
                    echo "                <option value='completado'>Completado</option>";
                    echo "                <option value='jugando'>Jugando</option>";
                    echo "                <option value='planeado' selected>Planeado</option>";
                    echo '            </select>';
                }
                echo '        </div>';
                echo '       <div class="nameinser">';
                echo '            <label class="label" for="nota">Nota</label>';
                echo "            <input type='number' min='0' max='10' name='nota' value=".$valores['Nota']." class='not'>";
                echo '        </div>';
                echo '    </div>';
                echo '    <div class="botones">';
                echo '        <input name="eliminar" type="submit" value="Eliminar Juego" class="eliminar">';
                echo '        <input name="guardar" type="submit" value="Guardar cambios" class="guardar">';
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