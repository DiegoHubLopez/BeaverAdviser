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
?>

<!DOCTYPE html>
<html>
<head>
  <title>Ingreso de Clave de Activación</title>
</head>
<body>
  <h2>Ingreso de Clave de Activación</h2>
  <form action="Activacion.php" method="post">
    <label for="clave">Clave de Activación:</label>
    <input type="text" id="clave" name="clave" required>
    <br><br>
    <input type="submit" value="Activar">
  </form>
</body>
</html>

    <?php
    

    if(isset($_POST["clave"])) {
        $cadena = $_POST["clave"];
        $ClaveActiva =0 ;
        
        // Validar la cadena
        if(empty($cadena)) {
            echo "La cadena está vacía.";
        } else {
          
          $sql = "SELECT * FROM activacion WHERE clave = '$cadena'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {

            $sql2 = "SELECT * FROM activacion WHERE clave = '$cadena' AND activaciontxt = '1'";
            $result2 = $conn->query($sql2);
  
            if ($result2->num_rows > 0) {
                echo "La Clave ya esta activa . <br>";
            } else {
                echo "La clave no esta activa . <br>";
            }

          } else {
              echo "La clave no existe . <br>";
          }
      
        }

    } else {

        echo "No se recibió ninguna cadena.";
    }


?>