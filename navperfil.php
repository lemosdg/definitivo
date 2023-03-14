<!-- barra de navegación del perfil -->
<nav>
    <!-- logos -->
    <div class="imgnav">
        <img class="logonav" src="img/favi.jpg" alt="logo">
        <a class="logout" onclick="confirmarLogout()"><img class="logoutnav" src="img/logout.png" alt="logout"></a>
    </div>
    <!-- menu -->
    <ul class="ulnav">
        <li class="linav"><a href="inicio.php">Inicio</a></li>
        <li class="linav"><a href="">Perfil</a></li>
        <li class="linav"><a href="">Social</a></li>
    </ul>
    <!-- darkmode -->
    <form action="buscar.php" method="get">
        <input class="buscador" name="chain" type="text" placeholder="Buscar...">
        <button class="busbut">
            <img class="logbuscar" src="img/lupa.png" alt="lupa">
        </button>
    </form>
</nav>