<?php
session_start();
require_once 'config.php';
// $id = $_SESSION('id');
// echo $id;
// var_dump($_SESSION);
$counter=1;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php require 'kiosco_materialize.php'; ?>
    <style media="screen">

    header, main, footer {
      padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
    }

    li#nav{
      padding: 2em;
    }

    </style>

    <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

  </head>



  <body>

    <?php
        // define variables and set to empty values
        $producto_nombre = $producto_tele = $producto_hora = $producto_dias_inicio = $producto_desc = $producto_precio = $id= "";
        // var_dump($_SESSION);
        // echo 'aqui como va';

        // echo $_SERVER["REQUEST_METHOD"];
        // echo var_dump($_POST);

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitProduct']))
        {
          // echo 'entro al post';
           $producto_nombre = test_input($_POST["producto_nombre"]);
           // echo 'paso al segundo';
           $producto_tele = test_input($_POST["producto_tele"]);
           // echo 'paso al 3';
           $producto_hora = test_input($_POST["producto_hora"]);
           // echo 'paso al 4';
           $producto_dias_inicio = test_input($_POST["producto_dias_inicio"]);
           // echo 'paso al 5';
           $producto_dias_fin = test_input($_POST["producto_dias_fin"]);
           // echo 'paso al 6';
           $producto_precio = test_input($_POST["producto_precio"]);
           // echo 'paso al 7';
           $producto_desc = test_input($_POST["producto_desc"]);
           // echo 'paso al 8';
           // var_dump($_SESSION);
           // $_SESSION('S_username'); //tambien aqui
           // echo 'funciona aqui';
           $id = $_SESSION["S_id"]; //aqui crasheo
           // echo $id;
           // echo 'paso al 9';
           // echo '<h1>todo bien aqui</h1>';
           $sql =  "INSERT into Mercado (nombre, descripcion, usuarioID, telefono, precio, fecha_ini, fecha_fin, hora) VALUES ('$producto_nombre','$producto_desc','$id','$producto_tele','$producto_precio','$producto_dias_inicio','$producto_dias_fin','$producto_hora' )";
           // echo $sql;
           if(mysqli_query($link, $sql)){
               // Redirect to home to the logged in page
               echo '<script language="javascript">';
               echo 'alert("producto agregado")';
               echo '</script>';
           } else{
               // echo "SHAME ON YOU AND YOUR COW.";
               echo '<script language="javascript">';
               echo 'alert("No se pudo agregar el producto, intente mas tarde o contacte a soporte")';
               echo '</script>';           }
        }
        else {
          // echo "'no entro'";
        }

        function test_input($data)
        {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }
    ?>


    <!-- Navbar goes here -->

<header class="teal">
  <div class="section right-align" id="top">
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons white">menu</i></a>
    <a onclick="logout()" class="btn red btn-large"> <i class="material-icons right">exit_to_app</i>Salir </a>
  </div>
  <ul id="slide-out" class="sidenav sidenav-fixed">
    <li class="logo center" ><h1 text-align="center">g r u p</h1></li>
    <li id="nav"><a class="waves-effect waves-light btn-large"><i class="material-icons left">date_range</i>Planes</a></li>
    <li id="nav"><a class="waves-effect waves-light btn-large"><i class="material-icons left">shopping_basket</i>Mercado</a></li>
  </ul>

   <div class="divider"></div>

</header>



    <!-- Page Layout here -->
<main>



      <div class="row">


        <div class="col teal s12">

          <div class="row">

            <div class="col s4">


              <!-- card structure -->
              <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                  <span class="card-title">Nueva Publicacion</span>
                  <p>¿Quiere vender algo dentro de su comunidad?</p>
                  </div>
                  <div class="card-action">
                    <a href="#modalNewProduct" class="modal-trigger">¡Haga clic aqui!</a>
                  </div>
                </div>
                <!-- termina card -->

                <!-- Modal Structure -->
              <div id="modalNewProduct" class="modal modal-fixed-footer">
                  <div class="modal-content">
                    <h4>Nuevo Producto</h4>
                    <div class="row">
                      <!-- inicia form -->
                      <form id="forma_producto" name="forma_producto" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="col s12">
                        <div class="row">
                          <div class="col s6">
                            <div class="input-field">
                              <i class="material-icons prefix">shopping_basket</i>
                              <input required id="producto_nombre" placeholder="Producto" name="producto_nombre" type="text">
                            </div>
                            <div class="input-field">
                              <i class="material-icons prefix">phone</i>
                              <input id="producto_tele" type="tel" placeholder="Telefono" name="producto_tele" type="text">
                            </div>
                            <div class="input-field">
                              <i class="material-icons prefix">access_time</i>
                              <input required id="producto_hora" type="time" placeholder="Hora"  name="producto_hora">
                            </div>
                            <div class="input-field">
                              <i class="material-icons prefix">calendar_today</i>
                              <input required id="producto_dias_inicio" placeholder="Dia Inicio" name="producto_dias_inicio" type="date">
                              <input required id="producto_dias_fin" type="date" name="producto_dias_fin" placeholder="Dia Fin" name="producto_dias_fin">
                            </div>
                          </div>
                          <div class="col s6">
                            <div class="input-field">
                              <i class="material-icons prefix">attach_money</i>
                              <input required id="producto_precio" type="number" min="0" step="1" placeholder="producto_precio" name="producto_precio" >
                            </div>
                            <div class="input-field">
                              <textarea id="producto_desc" name="producto_desc" class="materialize-textarea"></textarea>
                              <label for="producto_desc">Descripcion</label>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button name='submitProduct' type="submit" class="modal-close waves-effect waves-green btn">Submit</button>
                    <button class="modal-close waves-effect waves-red red btn">Cancel</button>
                  </div>
                </form>
                </div>
                <!-- termina modal -->
              </div>

                <!-- empieza cartas generadas desde BD -->
                <?php
                $sql = "SELECT * FROM mercado JOIN users WHERE users.id =mercado.usuarioID" ;
                $q1 = mysqli_query($link, $sql);
                if(mysqli_num_rows($q1)!=0){

                while($d=mysqli_fetch_assoc($q1)){
              ?>

              <div class="col s4">
                <div class="card amber accent-1">
                  <div class="card-content black-text">
                    <span class="card-title black-text center"><?php echo $d["nombre"]; ?></span>
                    <div class="divider"></div>
                    <div class="section">
                      <p><?php echo $d["first_name"]." ".$d["last_name"]; ?></p>
                      <p><?php echo $d["telefono"]?></p>
                      <p><?php echo "$".$d["precio"]; ?></p>
                    </div>
                    </div>
                    <div class="card-action white-text">
                      <a href="#modalProduct<?php echo $d['ventaID'];?>" class="white-text modal-trigger btn">Mas informacion....</a>
                    </div>
                  </div>

                  <div id="modalProduct<?php echo $d['ventaID'];?>" class="modal modal-fixed-footer">
                      <div class="modal-content">
                        <div class="left-align">
                          <h4 class="center"><?php echo $d['nombre'] ?></h4>
                          <div class="divider"></div>
                          <div class="row">
                            <div class="col s6">
                              <div class="section">
                                <i class="material-icons prefix">account_circle</i>
                                <?php echo $d["first_name"]." ".$d["last_name"]; ?>
                              </div>
                              <div class="section">
                                <i class="material-icons prefix">phone</i>
                                <?php echo $d["telefono"]?>
                              </div>
                              <div class="section">
                                <i class="material-icons prefix">attach_money</i>
                                <?php echo $d["precio"]?>
                              </div>
                              <div class="section">
                                <i class="material-icons prefix">calendar_today</i>
                                 del <?php echo date('d/m/Y',strtotime($d["fecha_ini"]));?> hasta <?php echo date('d/m/Y',strtotime($d["fecha_fin"]));?>
                              </div>
                              <div class="section">
                                <i class="material-icons prefix">access_time</i>
                                desde las <?php echo $d["hora"]?>
                              </div>
                            </div>
                            <div class="col s6">
                              <div class="section">
                                <i class="material-icons prefix">description</i> Descripcion:
                                <div class="divider"></div>
                                <p><?php echo $d['descripcion'] ?></p>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>

                      <div class="modal-footer">
                        <div class="center">
                          <a class="modal-close btn waves-effect waves-light red"><i class="material-icons">close</i></a>
                        </div>
                      </div>
                    </form>
                    </div>

              </div>



              <?php
            }
          }


                ?>




            </div>
            <!-- termna columna -->
      </div>
<!-- termina fila -->


      <!-- boton para hacer scrollup -->
      <div  class="fixed-action-btn"  style="bottom: 45px; right: 24px;">
        <button id="scroll-btn" onClick="topFunction()" class="btn-floating btn-large red">
          <i class="material-icons">arrow_upward</i>
        </button>
      </div>
      <!-- termina button scoll -->

    </div>
    <!-- termina columna -->


</div>
<!-- termina fila -->
</main>

  </body>



 <!-- scripts go here -->



<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>

<script>
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

document.addEventListener('DOMContentLoaded', function() {
   var elems = document.querySelectorAll('.sidenav');
   var instances = M.Sidenav.init(elems, options);
 });


 $(document).ready(function(){
   $('.sidenav').sidenav();
 });

 document.addEventListener('DOMContentLoaded', function() {
   var elems = document.querySelectorAll('.modal');
   var instances = M.Modal.init(elems, options);
 });


 $(document).ready(function(){
   $('.modal').modal();
 });


 function publicar(){
              if (document.forms["forma_producto"]["producto_nombre"].value == "" ||
               document.forms["forma_producto"]["producto_tele"].value == "" ||
               document.forms["forma_producto"]["producto_dias_inicio"].value == "" ||
               document.forms["forma_producto"]["producto_desc"].value == "" ||
               document.forms["forma_producto"]["producto_hora"].value == "" ||
               document.forms["forma_producto"]["producto_precio"].value == ""
             ) {
                  alert("Llene todos los datos pertinentes");
              }else{
                document.getElementById("forma_producto").submit();
              }

            }
  function logout() {
             window.location.replace("index.php");
             return false;
         }


</script>
</html>
