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

            <div class = "row profile-sections">


              <div class = "col s4">
                <button data-target="modal-favores" class ="modal-trigger col s10 offset-s1  align center waves-effect waves-light z-depth-2 btn-profile  amber accent-1" onclick="" style="height: 325px;">
                    <img class="menu-img" src ="icons/boton_favores.png"></img>
                    <br>
                    <br>
                    <a class="grey-text text-darken-2 justify">Descubra los resultados de los favores que ha hecho</a>

                </button>
              </div>

              <!-- modal de favores -->
              <div id="modal-favores" class="modal modal-fixed-footer">
                <div class="modal-content">

                  <?php

                  // New post button
                  // require 'kiosco_pedir_favor.php';

                  // Connect to Database
                  require 'kiosco_conectar_bdd.php';

                  // Create QUERY
                  $user = $_SESSION[S_id];

                  $query = "SELECT * FROM Favor WHERE propietarioID = $user ORDER BY fechaINI DESC";


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
                  <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
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
                  <?php

                  // New post button
                  // require 'kiosco_nueva_publicacion.php';
                  // Connect to Database
                  require 'kiosco_conectar_bdd.php';

                  // Create QUERY
                  $user = $_SESSION[S_id];

                  $query = "SELECT * FROM Publicacion WHERE propietarioID = $user ORDER BY fechaINI DESC";


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


                  <?php
                  require 'kiosco_conectar_bdd.php';
                  $sql = "SELECT * FROM Mercado JOIN Users WHERE Users.id =Mercado.usuarioID AND Users.id = $_SESSION[S_id]" ;
                  $q1 = mysqli_query($conexion, $sql);
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
            else {
              echo "No has agregado ningun producto al mercado!";

            }
              require 'kiosco_desconectar_bdd.php';

                  ?>




                </div>
                <div class="modal-footer">
                  <a href="#!" class="amber modal-close waves-effect waves-light btn-flat">Cerrar</a>
                </div>
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
