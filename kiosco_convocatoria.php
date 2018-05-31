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
        $aux_query = "SELECT nombre, apellido FROM Usuario WHERE usuarioID = $row[3]";
        $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
        $aux_row = mysqli_fetch_row($aux_result);
        date_default_timezone_set('America/New_York');
        $date = date_create($row[5]);
      ?>

      <div class = "dueño grey-text text-darken-1"><?php echo $aux_row[0]." ".$aux_row[1];?></div>

      <?php echo date_format($date,"d/M/Y"); ?> | <?php echo $row[10];?>:<?php if($row[11]<10)echo "0".$row[11]; if($row[11]>9) echo $row[11];?><br>
      <?php echo $row[2];?> <br>
    </div>
    <div class = "col s3">
      <form id = "convocatoria<?php echo $row[0];?>" action = "#">
        <br>
        <div class = "convocatoria-contenido" id = "respuesta<?php echo $row[0];?>">
          <div class = "row center">Asistencia</div>
          <div class = "row center">
            <input class = "btn confirm-invite green" type="submit" onclick="confirmarAsistencia(<?php echo $row[0];?>)" value = "✓">
            <input class = "btn deny-invite red" type="submit" onclick="rechazarAsistencia(<?php echo $row[0];?>)" value = "✕ "/>
          </div>
        </div>
      </form>
    </div>

  </div>

</div>
