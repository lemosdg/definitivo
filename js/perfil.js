// funcion log out

function confirmarLogout() {
    if (confirm("¿Está seguro de que desea cerrar sesion?")) {
      // Acción a realizar si el usuario confirma el borrado
      location.href = "logout.php";
    }
}