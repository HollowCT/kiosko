<!--- Basic design structure for one question-->


<div class = "post pregunta row center z-depth-2" style="border-radius: 20px; display: flex;">

  <div class = "col s1 amber accent-2 valign-wrapper" style="border-radius: 20px 0px 0px 20px">
    <div class=" circle white center-align center" style="width: 40px; height: 40px;">
      <img src="icons/manos.png" alt="" class="circle responsive-img "> <!-- notice the "circle" class -->
    </div>
  </div>

  <div class = "col s11 amber accent-1 low-text left-align " style="border:none; border-radius: 0px 20px 20px 0px;align-items: stretch;">
      <div class ="col s9">
      <div class = "titulo flow-text"><?php echo $row[9];?></div>

      <?php // aux query for user
        $aux_query = "SELECT first_name, last_name FROM users WHERE id = $row[3]";
        $aux_result = mysqli_query($link, $aux_query) or die ("Error de consulta ".mysqli_error()); 
        $aux_row = mysqli_fetch_row($aux_result);
      ?>

      <div class = "dueño grey-text text-darken-1"><?php echo $aux_row[0]." ".$aux_row[1];?></div>
      <?php echo $row[2];?>
      <br><br>

    </div>
    <div class = "col s3">
      <div class = "row center">
        <br>
        <!-- Modal Trigger -->

        <button data-target="modal-question<?php echo $row[0];?>" id = "boton-votar<?php echo $row[0];?>" class="modal-trigger btn-large" style="background-color: #5F77B7"> <div class = "col s12">Votar</div></button>

        <!-- Modal Structure -->
        <div id="modal-question<?php echo $row[0];?>" class="modal modal-fixed-footer">
          <div class="modal-content valign-wrapper">
            <form id = "pregunta<?php echo $row[0];?>" action = "#">
              <div class = "row center center-align ">
                <div class = "titulo flow-text col s10 offset-s2 hide-on-med-and-down" style="margin-top: -50px;"><?php echo $row[9];?></div>
                <div class = "titulo flow-text col s10 offset-s2 hide-on-large-only" ><?php echo $row[9];?></div>
                <div class = "divider col s10 offset-s2"></div>
              </div>

              <br><br>
              <div class="col s4 offset-s2 valign-wrapper">
                <br><br><br><?php echo $row[2];?><br>
              </div>
              <div class ="col s5 offset-s1">
                <div class = "pregunta-contenido" id = "respuesta<?php echo $row[0];?>">
                  <br>
                  <?php
                  if ($row[6] != NULL ){?>
                  <p>
                    <label>
                      <input class="with-gap" name="opc<?php echo $row[0];?>" type="radio" value="1" required />
                      <span><?php echo $row[6];?></span>
                    </label>
                  </p>
                <?php }
                if ($row[7] != NULL ){?>
                  <p>
                    <label>
                      <input class="with-gap" name="opc<?php echo $row[0];?>" type="radio" value="2" />
                      <span><?php echo $row[7];?></span>
                    </label>
                  </p>
                <?php }
                if ($row[8] != NULL){?>
                  <p>
                    <label>
                      <input class="with-gap" name="opc<?php echo $row[0];?>" type="radio" value="3" />
                      <span><?php echo $row[8];?></span>
                    </label>
                  </p>
                <?php }?>
                  <p>
                    <label>
                      <input class="with-gap" name="opc<?php echo $row[0];?>" type="radio" value="4" />
                      <span>Ninguno de los anteriores</span>
                    </label>
                  </p>
                </div>
              </div>

          </div>
          <div class="modal-footer">
            <a href="#!" id = "boton-votar" class="modal-action modal-close waves-effect waves-green btn-flat green-text" onclick="enviarRespuesta(<?php echo $row[0];?>);">Votar</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat red-text">Cancelar</a>
          </div>
        </form>

        </div>

      </div>

    </div>
  </div>

</div>
