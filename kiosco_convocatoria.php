<!--- Basic design structure for one event invitation-->


<div class = "post convocatoria row center z-depth-2" style="border-radius: 20px; display: flex;">
  <div class = "col s1 amber accent-2 valign-wrapper" style="border-radius: 20px 0px 0px 20px">
    <div class=" circle white center-align center" style="width: 40px; height: 40px;">
      <img src="icons/planes.png" alt="" class="circle responsive-img "> <!-- notice the "circle" class -->
    </div>
  </div>

  <div class = "col s11 amber accent-1 low-text left-align " style="border:none; border-radius: 0px 20px 20px 0px;align-items: stretch;">
    <div class = "col s9">
      <div class = "titulo flow-text"><?php echo $row[9];?></div>

      <?php // aux query for user
        $aux_query = "SELECT first_name, last_name FROM users WHERE id = $row[3]";
        $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
        $aux_row = mysqli_fetch_assoc($aux_result);
        date_default_timezone_set('America/New_York');
        $date = date_create($row[5]);
      ?>

      <div class = "dueño grey-text text-darken-1"><?php echo $aux_row["first_name"]." ".$aux_row["last_name"];?></div>

      <?php echo date_format($date,"d/M/Y"); ?> | <?php echo $row[10];?>:<?php if($row[11]<10)echo "0".$row[11]; if($row[11]>9) echo $row[11];?><br>
      <?php echo $row[2];?> <br>
    </div>
    <div class = "col s3">
      <form id = "forma-convocatoria<?php echo $row[0];?>" action = "#">
        <br>
        <div class = "convocatoria-contenido" id = "respuesta<?php echo $row[0];?>">
          <?php  //aux query for asistance
          $aux_query = "SELECT * FROM Asistencia WHERE publicacionID = $row[0] AND usuarioID = $_SESSION[S_id];";
          $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
          $participacion = "undefined";
          while($aux_row = mysqli_fetch_assoc($aux_result)){
            $participacion = $aux_row["participacion"];
          }
          ?>
          <div class = "row center">Asistencia</div>
          <div class = "row center">
            <input type = "hidden"  name = "usuarioID" value = "<?php echo $_SESSION[S_id]; ?>">
            <input type = "hidden"  name = "publicacionID" value = "<?php echo $row[0]; ?>">
            <input type = "hidden"  name = "estatus" value = "<?php echo $participacion; ?>">
            <input class = "btn confirm-invite green <?php if($participacion == "true") echo "disabled";?>" id = "confirm<?php echo $row[0];?>" type="button" onclick="confirmarAsistencia(<?php echo $row[0];?>)" value = "✓">
            <input class = "btn deny-invite red <?php if($participacion == "false") echo "disabled";?>" id = "deny<?php echo $row[0];?>" type="button" onclick="rechazarAsistencia(<?php echo $row[0];?>)" value = "✕"/>
          </div>
        </div>
      </form>
    </div>

  </div>

</div>
