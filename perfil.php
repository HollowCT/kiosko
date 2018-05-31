<html>
    <meta charset="UTF-8">
    <head>
      Perfil de Usuario

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

          <h2>Mi Perfil</h2>

          <div class = "container">
            <?php

            // Connect to Database
            require 'kiosco_conectar_bdd.php';

            $userID = 2;

            // Create QUERY
            $query = "SELECT * FROM Usuario WHERE usuarioID = $userID";
            $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());
            $row = mysqli_fetch_row($result);
            // Set timezone
            date_default_timezone_set('America/New_York');
            $date = date_create($row[3]);

            ?>
            <div class = "row profile-data">

              <div class = "col s6 align center">
                  <?php echo "<img src = 'img/".$row['5'].".png'>"; ?>
              </div>

              <div class = "col s6">

                <div class = "row flow-text"> <b> Nombre: </b> <?php echo $row[1]." ".$row[2];?> </div>
                <div class = "row flow-text"> <b> Fecha de Nacimiento: </b> <?php echo date_format($date,"d/M/Y"); ?> </div>
                <div class = "row flow-text"> <b> Género: </b> <?php echo $row[4];?> </div>
              </div>

            </div>

            <div class = "row profile-sections">

              <div class = "col s4 align center">
                <a class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">add</i></a>

                  <?php //echo "<img src = 'img/".$row['5'].".png'>"; ?>
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
