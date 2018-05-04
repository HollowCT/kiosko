<!--- Basic design structure for one question-->


<div class = "container post pregunta">
  <form id = "pregunta<?php echo $row[0];?>" action = "#">
    <div class = "titulo"><?php echo $row[9];?></div>
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
