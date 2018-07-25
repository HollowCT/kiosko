<?php
if(!isset($_SESSION[S_id])){
  header("location: error.php");
}?>
<?php session_start(); ?>
<?php



// Connect to database
require 'kiosco_conectar_bdd.php';

$contenido = $_POST["contenido-favor"];
$propietarioID = $_POST["usuarioID"];
$contacto= $_POST["contacto-favor"];
$titulo = $_POST["titulo-favor"];
$categoria = $_POST["categoria-favor"];

// Create QUERY

// Post a favour request

$query = "INSERT INTO Favor(favorID, propietarioID, titulo, categoria, contenido, fechaINI, contacto) VALUES
(default, $propietarioID,'$titulo','$categoria','$contenido',default,'$contacto');";

$result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());

// Update points on user

$query = "UPDATE Users SET puntaje = puntaje-1 WHERE id = $propietarioID ";

$result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());


//  Close database
require 'kiosco_desconectar_bdd.php';


 ?>
