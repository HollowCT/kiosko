<?php
  // Show menu
  session_start();

?>
<html>
    <meta charset="UTF-8">
    <head>
      <?php
        // Show menu
        require 'kiosco_menu.php';
      ?>
<style media="screen">
  .modal { width: 80% !important ; }
</style>

    </head>
    <body>
      <div class = "row">
        <div class = "col l3 hide-on-med-and-down">
          menu-space
        </div>
        <div class = "col l9 s12">
          <br>

          <br>

          <div class = "row">
            <?php
            // Connect to Database
            require 'kiosco_conectar_bdd.php';

            // Create QUERY
            $query = "SELECT * FROM Users WHERE id = $_SESSION[S_id]";
            $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());
            $row = mysqli_fetch_row($result);
            // Set timezone
            date_default_timezone_set('America/New_York');
            $date = date_create($row[4]);

            ?>
            <div class = "row profile-data">

              <div class = "col s6 align center">
                  <?php echo "<img src = 'img/".$row[7].".png'>"; ?>
              </div>

              <div class = "col s6">

                <div class = "row flow-text"> <b> Nombre: </b> <?php echo $row[2]." ".$row[3];?> </div>
                <div class = "row flow-text"> <b> Fecha de Nacimiento: </b> <?php echo date_format($date,"d/M/Y"); ?> </div>
                <div class = "row flow-text"> <b> Género: </b> <?php echo $row[5];?> </div>
              </div>

            </div>

            <?php
              // Close database
              require 'kiosco_desconectar_bdd.php';

            ?>

            <div class = "row profile-sections">


              <div class = "col s4">
                <button data-target="modal-favores" class ="modal-trigger col s10 offset-s1  align center waves-effect waves-light z-depth-2 btn-profile  amber accent-1" onclick="" style="height: 325px;">
                    <img class="menu-img" src ="icons/boton_favores.png"></img>
                    <br>
                    <br>
                    <a class="grey-text text-darken-2 justify">Descubra los voluntarios a los favores que ha pedido</a>

                </button>
              </div>

              <!-- modal de favores -->
              <div id="modal-favores" class="modal modal-fixed-footer">
                <div class="modal-content">

                  <?php require 'kiosco_favores_personales.php'; ?>

                  </div>
                  <div class="modal-footer">
                    <div class="center">
                      <a class="modal-close btn waves-effect waves-light red"><i class="material-icons">close</i></a>
                    </div>
                  </div>
                </div>



              <div class = "col s4">
                <button data-target="modal-planes" class ="modal-trigger col s10 offset-s1 align center waves-effect waves-light z-depth-2 btn-profile amber accent-1" onclick="" style="height: 325px;">
                    <img class="menu-img" src ="icons/boton_planes.png"></img>
                    <br>
                    <br>
                    <a class="grey-text text-darken-2 justify">Recuerde los eventos en los que usted quiere participar</a>

                </button>
              </div>

              <!-- modal de planes -->
              <div id="modal-planes" class="modal modal-fixed-footer">
                <div class="modal-content">

                  <?php require 'kiosco_planes_personales.php'; ?>

                </div>
                <div class="modal-footer">
                  <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                </div>
              </div>


              <div class = "col s4">
                <button data-target="modal-carrito" class ="modal-trigger col s10 offset-s1  align center waves-effect waves-light z-depth-2 btn-profile  amber accent-1" onclick="" style="height: 325px;">
                    <img class="menu-img" src ="icons/boton_mercado.png"></img>
                    <br>
                    <br>
                    <a class="grey-text text-darken-2 justify">Vuelva a ver los servicios que ha compartido</a>

                </button>
              </div>

              <!-- modal de servicios -->
              <div id="modal-carrito" class="modal modal-fixed-footer">
                <div class="modal-content">

                  <?php require 'kiosco_mercadito_personal.php'; ?>

                </div>
                <div class="modal-footer">
                  <a href="#!" class="amber modal-close waves-effect waves-light btn-flat">Cerrar</a>
                </div>
              </div>


            </div>

          </div>

        </div>
      </div>

    </body>

    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.modal');
      var instances = M.Modal.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function(){
      $('.modal').modal();
    });
    </script>
</html>
