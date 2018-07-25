<?php
if(!isset($_SESSION[S_id])){
  header("location: error.php");
}?>
<!--- Basic design structure for one question-->
<?php session_start(); ?>

<div class = "post pregunta row center z-depth-2" style="border-radius: 20px; display: flex;">
  <div class = "col s1 valign-wrapper" style="border-radius: 20px 0px 0px 20px; background-color: #5F77B7">
    <div class=" circle white center-align center" style="width: 40px; height: 40px;">
      <img src="img/manos.png" alt="" class="circle responsive-img "> <!-- notice the "circle" class -->
    </div>
  </div>

  <div class = "col s11 blue lighten-4 low-text left-align " style="border:none; border-radius: 0px 20px 20px 0px;align-items: stretch;">
      <div class ="col s9">
      <div class = "titulo flow-text"><?php echo $row[9];?></div>

      <?php // aux query for user
        $aux_query = "SELECT first_name, last_name FROM Users WHERE id = $row[3]";
        $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
        $aux_row = mysqli_fetch_row($aux_result);
      ?>

      <div class = "grey-text text-darken-1"><?php echo "Pregunta de encuesta: ";?></div>
      <?php echo $row[2];?>
      <br><br>

    </div>
    <div class = "col s3">
      <div class = "row center">
        <br>
        Resultados:

        <!-- Modal Trigger -->

        <button data-target="modal-question<?php echo $row[0];?>" id = "boton-votar<?php echo $row[0];?>" class="modal-trigger btn-large" style="background-color: #5F77B7"> <div class = "col s12">Votar</div></button>


      </div>

    </div>
  </div>

</div>
