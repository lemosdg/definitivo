<?php

include "conn.php";
include "validacion.php";


if(isset($_POST['guardar'])) {
    // Acciones a realizar si se presionó el botón guardar
    $estado = $_POST["estado"];
    $nota = $_POST["nota"];
    $idjuego = $_POST["idjuego"];

    echo $estado. "<br>";
    echo $nota. "<br>";
    echo $idjuego. "<br>";

    $sql = "UPDATE juego_has_usuario SET Nota='".$nota."', Estado='".$estado."' WHERE (Juego_idJuego='".$idjuego."') and (Usuario_idUsuario='".$_SESSION["sesion"]."')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    header("Location: inicio.php" );
}
elseif(isset($_POST['eliminar'])) {
    // Acciones a realizar si se presionó el botón eliminar
}
?>