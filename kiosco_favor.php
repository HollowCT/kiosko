<!--- Basic design structure for one announcement-->



<div class = " row center post favor z-depth-2" style="border-radius: 20px; display: flex;">
  <div class = "col s1 amber accent-2 valign-wrapper" style="border-radius: 20px 0px 0px 20px">
    <div class=" circle white center-align center" style="width: 40px; height: 40px;">
      <img src="icons/favores.png" alt="" class="circle responsive-img "> <!-- notice the "circle" class -->
    </div>
  </div>

  <div class = "col s11 amber accent-1 low-text left-align " style="border:none; border-radius: 0px 20px 20px 0px;align-items: stretch;">
    <div class ="col s8">
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
      </form>
    </div>
    <div class = "col s2">
      <form id = "forma-favor<?php echo $row["favorID"];?>" action = "#">
        <br>
        <div class = "favor-contenido" id = "respuesta<?php echo $row["favorID"];?>">
          <div class = "row center">Voluntario</div>
          <div class = "row center">
            <input type = "hidden"  name = "voluntarioID" value = "<?php echo $_SESSION[S_id]; ?>">
            <input type = "hidden"  name = "favorID" value = "<?php echo $row["favorID"]; ?>">
            <input class = "btn confirm-invite green" id = "confirm<?php echo $row["favorID"];?>" type="button" onclick="confirmarFavor(<?php echo $row["favorID"];?>)" value = "✓">
          </div>
        </div>
      </form>
    </div>
    <div class = "col s2 center">
      <br>
      <div class = "row"></div>
      <div class = "row"></div>
      <div class = "favor-puntos row center">
        <div class = "col s3 flow-text" style="margin-top: 2px;">+1</div>
        <div class="col s8 offset-s1 circle  center-align center" style="width: 40px; height: 40px; padding:0px;">
          <img  src="icons/beecoin3.png" alt="" class="circle z-depth-2 responsive-img ">
        </div>
      </div>
    </div>
  </div>


</div>
