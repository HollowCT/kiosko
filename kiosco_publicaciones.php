<html>
    <meta charset="UTF-8">
    <head>
      Lista de Actividad
      <?php
        // Import styles
        require 'kiosco_materialize.php';

      ?>

    </head>
    <body>

      <?php
        // Show menu
        require 'kiosco_menu.php';

      ?>

      <h2>Publicaciones</h2


        <?php

        // New post button

        require 'kiosco_nueva_publicacion.php';

        // Connect to Database
        require 'kiosco_conectar_bdd.php';

        // Create QUERY
        $query = "SELECT * FROM Publicacion WHERE publicacionID NOT IN (SELECT publicacionID FROM Asistencia WHERE usuarioID = 1) AND publicacionID NOT IN (SELECT publicacionID FROM Voto WHERE usuarioID = 1) ORDER BY fechaINI DESC";
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

        <script type="text/javascript" language="JavaScript">

          function enviarRespuesta(preguntaID){
            var respuesta = document.querySelector('input[name=opc'+preguntaID+']:checked');
            if(respuesta){
              respuesta = respuesta.value;
              //  SUBMIT Vote
              votar(preguntaID,respuesta);
              responderVoto(preguntaID);
            }
          }

          function votar(preguntaID, respuesta) {
            $.get("kiosco_votar.php?preguntaID=" + preguntaID+"&voto=" +respuesta);
            return false;
          }

          function responderVoto(preguntaID) {
              var respuesta = document.getElementById("respuesta"+preguntaID);
              respuesta.parentNode.removeChild(respuesta);

              var div = document.createElement('div');
              div.className = "pregunta-contenido";
              div.id = "respuesta"+preguntaID;

              div.innerHTML = '<br>Tu voto ha sido registrado, gracias por participar.';
              document.getElementById("pregunta"+preguntaID).appendChild(div);

          }

        </script>
    </body>
</html>
