// funcion log out

function confirmarLogout() {
    if (confirm("¿Está seguro de que desea cerrar sesion?")) {
      // Acción a realizar si el usuario confirma el borrado
      location.href = "logout.php";
    }
}


// Despliega el menú al hacer click
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// cierra el mení al hacer click en cualquier otra parte
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}