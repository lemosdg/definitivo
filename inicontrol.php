<?php

    if(!empty($_POST["btningresar"])){
        if (empty($_POST["user"]) and empty($_POST["pass"])){
            echo "Campos vacios </br>";
        } else {
            $user=$_POST["user"];
            $pass=$_POST["pass"];
            $sql=$conn->query(" select * from usuario where nombre='$user' and clave='$pass' ");
            if ($datos=$sql->fetch_object()){
                session_start();
                $_SESSION["sesion"] = $user;
                header("location:inicio.php");
            } else {
                echo "acceso denegado </br>";
            }
        }
    
    }

?>