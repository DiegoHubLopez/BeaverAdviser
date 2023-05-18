<?php
    $Conexion = new mysqli('localhost','root','','claves');
    if($Conexion->connect_error){

        die('No se pudo conectar al servidor');
    }else{

        echo "Conexion Establecida";
    }


?>