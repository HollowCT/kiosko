<?php
//Esta linea es para incluir el archivo con las variables
$hostname = 'localhost';
$user = 'root';
$pass = 'root'; //tino usa root, rodrigo no tiene pw
/* CONECTAR CON BASE DE DATOS **************** */
   $link = mysqli_connect($hostname,$user,$pass,'PULI') or die(mysqli_error());
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
//mysqli_query($con, "SET NAMES 'utf8'");
/* ********************************************** */
/* CONECTA CON LA BASE DE DATOS  **************** */
  // $link = mysqli_select_db($link,'streaming') or die(mysqli_error());
/* ********************************************** */
mysqli_set_charset($link, "utf8");
?>
