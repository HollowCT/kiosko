<!--- Basic design structure for one announcement-->

<div class = "post anuncio">
  <div class = "titulo"><?php echo $row[9];?></div>
  <form id = "anuncio<?php echo $row[0];?>" action = "#">
    <?php echo $row[2];?> <br>
    <div class = "anuncio-contenido" id = "respuesta<?php echo $row[0];?>">
    </div>
  </form>
</div>
