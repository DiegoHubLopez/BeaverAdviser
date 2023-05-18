<?php
    $Conexion = new mysqli('localhost','root','','integradora');
    if($Conexion->connect_error){

        die('No se pudo conectar al servidor');
    }


?>