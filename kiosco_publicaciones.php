<?php session_start(); ?>
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
          <h2 class = "row"> Publicaciones</h2>

            <?php

            // New post button
            require 'kiosco_nueva_publicacion.php';

            // Connect to Database
            require 'kiosco_conectar_bdd.php';

            // Create QUERY

            $query = "SELECT * FROM Publicacion WHERE publicacionID NOT IN (SELECT publicacionID FROM Asistencia WHERE usuarioID = ".$_SESSION[S_id].") AND publicacionID NOT IN(SELECT publicacionID FROM Voto WHERE usuarioID = $_SESSION[S_id]) ORDER BY fechaINI DESC";


            $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());

            echo "<div class = 'feed'>";

            // Print the data
            while($row = mysqli_fetch_row($result)) {
              switch($row[1]){

                case 'anuncio': // Show announcement
                                require 'kiosco_anuncio.php';
                                break;
                case 'votacion': // Show question
                                require 'kiosco_pregunta.php';
                                break;
                case 'evento': // Show invitation
                                require 'kiosco_convocatoria.php';
                                break;
              }
            }

            echo "</div>";
            // Close database
            require 'kiosco_desconectar_bdd.php';

            ?>

        </div>
      </div>

        <script type="text/javascript" language="JavaScript">

          function enviarRespuesta(preguntaID){
            var respuesta = document.querySelector('input[name=opc'+preguntaID+']:checked');
            if(respuesta){
              respuesta = respuesta.value;
              //  SUBMIT Vote
              votar(preguntaID,respuesta);
              responderVoto(preguntaID);
            }else{
              alert("Elija su respuesta para votar");
            }
          }

          function votar(preguntaID, respuesta) {
            $.get("kiosco_votar.php?preguntaID=" + preguntaID+"&voto=" +respuesta);
            return false;
          }

          function responderVoto(preguntaID) {
              var respuesta = document.getElementById("boton-votar"+preguntaID);
              respuesta.classList.add("disabled");

              alert("Su voto ha sido registrado, gracias por participar.");

          }

        </script>
    </body>
</html>
