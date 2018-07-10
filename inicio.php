<html>
    <meta charset="UTF-8">
    <head>
      Inicio de Sesión
      <?php
        // Import styles
        require 'kiosco_materialize.php';

      ?>
    </head>
    <body>
    <div class = "row">
      <div class="col s12 m5">

      <div class = "login container card blue-grey lighten-3">
        <div class = "card-content white-text">
          <span class ="card-title">LOG IN</span>
          <br>
          <form method="POST" action="kiosco_publicaciones.php">

            <?php
              if($_SERVER["REQUEST_METHOD"] == "POST")
               {
                echo "<br>Tu sesión se ha cerrado.";

              }
            ?>
            <div class = "row">
              <div class = "input-field col s10" >
                <i class="material-icons prefix">account_circle</i>
                <input type = "text" name = "usrname" required>
                <label class = "active" for = "usrname">Usuario</label>
              </div>
            </div>
            <div class = "row">
              <div class = "input-field col s10" >
                <i class="material-icons prefix">lock</i>
                <input type = "password" name = "psw" required>
                <label class = "active" for = "psw">Contraseña</label>
              </div>
            </div>
            <input class = "right btn lighten-2 waves-effect waves-light" type="submit" value="Iniciar Sesión"><br>

          </form>

        </div>
      </div>
      </div>
    </div>


    </body>
</html>
