<!--- Basic design structure for one announcement-->



<div class = " row center post favor z-depth-2" style="border-radius: 20px; display: flex;">
  <div class = "col s1 amber accent-2 valign-wrapper" style="border-radius: 20px 0px 0px 20px">
    <div class=" circle white center-align center" style="width: 40px; height: 40px;">
      <img src="icons/favores.png" alt="" class="circle responsive-img "> <!-- notice the "circle" class -->
    </div>
  </div>

  <div class = "col s11 amber accent-1 low-text left-align " style="border:none; border-radius: 0px 20px 20px 0px;align-items: stretch;">
      <div class ="col s12">
      <div class = "titulo flow-text"><?php echo $row["titulo"];?></div>

      <?php // aux query for user
        $aux_query = "SELECT first_name, last_name FROM Users WHERE id = ".$row["propietarioID"];
        $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
        $aux_row = mysqli_fetch_assoc($aux_result);
        date_default_timezone_set('America/New_York');
        $date = date_create($row["fechaINI"]);
      ?>

      <div class = "dueño grey-text text-darken-1"><?php echo $aux_row["first_name"]." ".$aux_row["last_name"];?></div>

      <form id = "favor<?php echo $row["favorID"];?>" action = "#">
        <?php echo date_format($date,"d/M/Y"); ?> | <?php echo $row["categoria"];?><br>
        <?php echo $row["contenido"];?> <br>
        <div class = "favor-contenido" id = "respuesta<?php echo $row["favorID"];?>">
        </div>
      </form>
    </div>
  </div>


</div>
