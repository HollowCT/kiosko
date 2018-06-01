<?php session_start(); ?>
<!---  Los asuntos de las preguntas son la pregunta
-->

<form id = "forma-pregunta" name= "forma-pregunta" class = "col s12" method = "POST" enctype="multipart/form-data" >
  <input type = "hidden"  name = "usuarioID" value = "<?php $_SESSION[S_id] ?>">

  <div class = "col s12">
    <br>
    <br>

    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">title</i>
      <input placeholder="Título de pregunta" name ="titulo-pregunta" type = "text" class = "validate materialize-textarea" required = "true" maxlength = "25" data-length = "25">
    </div>

    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">help_outline</i>
      <textarea  placeholder="¿Qué quieres preguntar?" name ="contenido-pregunta"  class="validate materialize-textarea" required = "true" maxlength = "65" data-length = "65"></textarea>
      <label for= "contenido-pregunta">Descripción</label>
    </div>

  </div>

  <div class = "col s4">


    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">event</i>
      <input id = "fecha-pregunta" name = "fecha-pregunta" placeholder="Día límite" type="date" class="datepicker" required = "true">
    </div>

  </div>

  <div class = "col s8">

    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">mode_edit</i>
      <input placeholder="Opción 1" name ="opc1-pregunta" type = "text" class = "validate materialize-textarea" required = "true" maxlength = "25" data-length = "25">
      <label for= "opc1-pregunta">Respuestas</label>
      <input placeholder="Opción 2" name ="opc2-pregunta" type = "text" class = "validate materialize-textarea" required = "true" maxlength = "25" data-length = "25">
      <input placeholder="Opción 3 (opcional)" name ="opc3-pregunta" type = "text" class = "validate materialize-textarea" required = "true" maxlength = "25" data-length = "25">

    </div>



  </div>

</form>
