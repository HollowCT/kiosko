<!--- Basic design structure for one event invitation-->


<div class = "post convocatoria">
  <form id = "convocatoria<?php echo $row[0];?>" action = "#">
    <div class = "titulo"><?php echo $row[9];?></div>
    <?php echo $row[2];?> <br>
    <div class = "convocatoria-contenido" id = "respuesta<?php echo $row[0];?>">
      <input class = "btn confirm-invite green" type="submit" onclick="confirmarAsistencia(<?php echo $row[0];?>)" value = "Si Voy"/>
      <input class = "btn deny-invite red" type="submit" onclick="rechazarAsistencia(<?php echo $row[0];?>)" value = "No Voy"/>
    </div>
  </form>
</div>
