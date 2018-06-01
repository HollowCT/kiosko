<?php session_start(); ?>
<html>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>

    <head>
      Kiosco Votos
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

      <h2>Votaciones</h2

        <?php
          // Connect to Database
          require 'kiosco_conectar_bdd.php';

          // Create QUERY
          $query = "SELECT * FROM Pregunta WHERE preguntaID NOT IN (SELECT publicacionID FROM Voto WHERE usuarioID = $_SESSION[S_id]) ORDER BY fechaINI DESC";
          $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());

          // Print the data
          while($row = mysqli_fetch_row($result)) {
          ?>
          <div class = "post pregunta">
            <form id = "pregunta<?php echo $row[0];?>" action = "#">
              <?php echo $row[1];?> <br>
              <div class = "pregunta-contenido" id = "respuesta<?php echo $row[0];?>">
                <p>
                  <label>
                    <input class="with-gap" name="opc<?php echo $row[0];?>" type="radio" value="1" required />
                    <span>Partido AMARILLO</span>
                  </label>
                </p>
                <p>
                  <label>
                    <input class="with-gap" name="opc<?php echo $row[0];?>" type="radio" value="2" />
                    <span>Partido AZUL</span>
                  </label>
                </p>
                <p>
                  <label>
                    <input class="with-gap" name="opc<?php echo $row[0];?>" type="radio" value="3" />
                    <span>Partido MORADO</span>
                  </label>
                </p>
                <p>
                  <label>
                    <input class="with-gap" name="opc<?php echo $row[0];?>" type="radio" value="4" />
                    <span>Ninguno de los anteriores</span>
                  </label>
                </p>
                <input class = "btn" type="submit" onclick="enviarRespuesta(<?php echo $row[0];?>)" value = "Votar"/>
              </div>
            </form>
          </div>

        <?php
        }
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
