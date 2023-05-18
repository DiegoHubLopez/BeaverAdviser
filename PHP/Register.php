<?php
    include "./Conection.php";

    if(isset($_POST ['name'] ) && isset($_POST ['mail'] ) && isset($_POST ['pass'] ) &&
    isset($_POST ['pass2'] ) ){

        if( $_POST ['pass'] == $_POST ['pass2'] ){
            include "./Mail.php";
            $Nombre = $_POST['name'];
            $Correo = $_POST['mail'];
            $Contraseña = $_POST['pass'];
            $Conexion -> query("INSERT INTO usuarios (Name,Mail,Password,Code,Estatus) VALUES ('$Nombre','$Correo','$Contraseña','145','No')");

        } else{

            echo "Contraseñas incorrectas";
        }
        

    }

?>