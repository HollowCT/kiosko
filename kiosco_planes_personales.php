<?php session_start(); ?>

<?php

// Connect to Database
require 'kiosco_conectar_bdd.php';

// Create QUERY
$user = $_SESSION[S_id];

$query = "SELECT * FROM Publicacion WHERE publicacionID IN (SELECT publicacionID FROM Asistencia WHERE usuarioID = $user AND participacion = 'true') ORDER BY fechaINI ASC";


$result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());

echo "<div class = 'feed'>";

// Print the data
while($row = mysqli_fetch_row($result)) {
  switch($row[1]){

    case 'evento': // Show invitation
                    require 'kiosco_convocatoria.php';
                    break;
  }
}

echo "</div>";
// Close database
require 'kiosco_desconectar_bdd.php';

?>
