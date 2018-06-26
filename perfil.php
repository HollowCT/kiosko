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
            $query = "SELECT * FROM users WHERE id = $_SESSION[S_id]";
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

            <div class = "row profile-sections">


              <div class = "col s4">
                <button class = "col s10 offset-s1  align center waves-effect waves-light z-depth-2 btn-profile  amber accent-1" onclick="" style="height: 325px;">
                    <img class="menu-img" src ="icons/boton_favores.png"></img>
                    <br>
                    <br>
                    <a class="grey-text text-darken-2 justify">Descubra los resultados de los favores que ha hecho</a>

                </button>
              </div>

              <div class = "col s4">
                <button class = "col s10 offset-s1 align center waves-effect waves-light z-depth-2 btn-profile amber accent-1" onclick="" style="height: 325px;">
                    <img class="menu-img" src ="icons/boton_planes.png"></img>
                    <br>
                    <br>
                    <a class="grey-text text-darken-2 justify">Recuerde los eventos en los que usted quiere participar</a>

                </button>
              </div>

              <div class = "col s4">
                <button class = "col s10 offset-s1  align center waves-effect waves-light z-depth-2 btn-profile  amber accent-1" onclick="" style="height: 325px;">
                    <img class="menu-img" src ="icons/boton_mercado.png"></img>
                    <br>
                    <br>
                    <a class="grey-text text-darken-2 justify">Vuelva a ver los servicios que ha compartido</a>

                </button>
              </div>

            </div>

          </div>


          <?php
            // Close database
            require 'kiosco_desconectar_bdd.php';

          ?>

        </div>
      </div>

    </body>
</html>
