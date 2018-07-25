
<?php session_start();
require 'disable_right_click.php';
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

            <?php

            // New post button
            require 'kiosco_pedir_favor.php';

            // Connect to Database
            require 'kiosco_conectar_bdd.php';

            // Create QUERY
            $user = $_SESSION[S_id];

            $query = "SELECT * FROM Favor WHERE voluntarioID IS NULL AND favorID NOT IN (SELECT favorID FROM Favor WHERE voluntarioID < '' ) AND favorID NOT IN (SELECT favorID FROM Favor WHERE propietarioID = $user) AND favorID NOT IN(SELECT favorID FROM Voluntario WHERE voluntarioID = $user) ORDER BY fechaINI DESC";


            $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());

            echo "<div class = 'feed'>";

            // Print the data
            while($row = mysqli_fetch_assoc($result)) {

              require 'kiosco_favor.php';
            }

            echo "</div>";
            // Close database
            require 'kiosco_desconectar_bdd.php';

            ?>

        </div>
      </div>

        <script type="text/javascript" language="JavaScript">

          function confirmarFavor(favorID){
            var respuesta = document.getElementById("confirm"+favorID);
            respuesta.classList.add("disabled");
            respuesta.classList.add("grey");

            // Post a volunteer without exiting or reloading page
            $.ajax({
                url:'kiosco_publicar_voluntario.php',
                type:'post',
                data:$('#forma-favor'+favorID).serialize(),
                success:function(){
                    alert("Se agregarán sus puntos cuando el favor se haya completado");
                }
            });

          }


        </script>
    </body>
</html>
