<?php session_start(); ?>
<?php



// Connect to database
require 'kiosco_conectar_bdd.php';

$contenido = $_POST["contenido-favor"];
$propietarioID = $_POST["usuarioID"];
$contacto= $_POST["contacto-favor"];
$titulo = $_POST["titulo-favor"];
$categoria = $_POST["categoria-favor"];

echo $contenido;
echo $propietarioID;
echo $contacto;
echo $titulo;
echo $categoria;

// Create QUERY

// Post a favour request

$query = "INSERT INTO Favor(favorID, propietarioID, titulo, categoria, contenido, fechaINI, contacto) VALUES
(default, $propietarioID,'$titulo','$categoria','$contenido',default,'$contacto');";

$result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());


//  Close database
require 'kiosco_desconectar_bdd.php';


 ?>