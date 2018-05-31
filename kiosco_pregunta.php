<!--- Basic design structure for one question-->


<div class = "post pregunta row center z-depth-2" style="border-radius: 20px; display: flex;">

  <div class = "col s1 amber accent-2 valign-wrapper" style="border-radius: 20px 0px 0px 20px">
    <div class=" circle white center-align center" style="width: 40px; height: 40px;">
      <img src="icons/manos.png" alt="" class="circle responsive-img "> <!-- notice the "circle" class -->
    </div>
  </div>

  <div class = "col s11 amber accent-1 low-text left-align " style="border:none; border-radius: 0px 20px 20px 0px;align-items: stretch;">
      <div class ="col s12">
      <div class = "titulo flow-text"><?php echo $row[9];?></div>

      <?php // aux query for user
        $aux_query = "SELECT nombre, apellido FROM Usuario WHERE usuarioID = $row[3]";
        $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
        $aux_row = mysqli_fetch_row($aux_result);
      ?>

      <div class = "dueño grey-text text-darken-1"><?php echo $aux_row[0]." ".$aux_row[1];?></div>

      <form id = "pregunta<?php echo $row[0];?>" action = "#">
        <?php echo $row[2];?> <br>
        <div class = "pregunta-contenido" id = "respuesta<?php echo $row[0];?>">
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
          <input class = "btn" type="submit" onclick="enviarRespuesta(<?php echo $row[0];?>)" value = "Votar"/>
        </div>
      </form>
    </div>
  </div>

</div>
