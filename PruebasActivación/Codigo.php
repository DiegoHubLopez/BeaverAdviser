<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "claves";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Falló la conexión: " . $conn->connect_error);
}else{

    echo"Conection host";
}


$Clave = array_fill(0, 8, "");
$Homoclave = "";
$Codigo = "";
$op = false;

do {
    $truee = 0;
    $falsee = 0;

    for ($i = 0; $i < count($Clave); $i++) {
        $Clave[$i] = strval(rand(0, 9));
    }

    $suma = intval($Clave[3]) + intval($Clave[4]);
    $producto = intval($Clave[5]) * intval($Clave[6]);
    $individuo = intval($Clave[7]);
    $funcion = $suma * $individuo;

    if ($funcion == $producto) {

        $Homoclave = $Clave[0] . $Clave[1] . $Clave[2];
        $Codigo = $Clave[3] . $Clave[4] . $Clave[5] . $Clave[6] . $Clave[7];
        $truee++;

        echo "Clave: " . $Homoclave . "-" . $Codigo . "\n";
        echo "Activas: " . $truee . "\n";
        echo "Inactivas: " . $falsee . "\n";

        $CLAVEACTIVA = $Homoclave . "-" . $Codigo ;
        echo "Clave concatenada: " . $CLAVEACTIVA . ". <br>";
        
        $sql =  "INSERT INTO activacion (clave,activaciontxt) VALUES ('$CLAVEACTIVA','0')";
        $sql2 = "SELECT clave FROM activacion WHERE clave = '$CLAVEACTIVA'";

        $result = $conn->query($sql2);

        // Verificar si se encontraron resultados
        if ($result->num_rows > 0) {
            echo "La Clave ya existe . <br>";
        } else {
            echo "La clave no existe y sera guardada . <br>";
        }


        if ($conn->query($sql) === TRUE) {
            echo "El dato se almacenó correctamente en la tabla . <br>";
        } else {
            echo "Error al almacenar el dato: " . $conn->error;
        }

        $op = true;
    } else {
        $falsee++;
    }



} while ($op!=true);

?>