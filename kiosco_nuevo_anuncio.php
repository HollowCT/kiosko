<form id = "forma-anuncio" name= "forma-anuncio" class = "col s12" method = "POST" enctype="multipart/form-data" >
  <input type = "hidden"  name = "usuarioID" value = "1">
  


  <div class = "col s12">
  <br>

    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">title</i>
      <input placeholder="Título de anuncio" name ="titulo-anuncio" type = "text" class = "validate materialize-textarea" required = "true" maxlength = "25" data-length = "25">
    </div>
  </div>

  <div class = "col s4">

    <div class = "input-field col s12 post-form">
      <p>
        <label>
          <input type="checkbox" id= "evento" name ="evento" />
          <span>¿Preguntar asistencia?</span>
        </label>
      </p>
    </div>

    <div class = "input-field col s12 post-form">
      <br>
    </div>

    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">event</i>
      <input id = "fecha-anuncio" name = "fecha-anuncio" placeholder="Fecha" type="date" class="datepicker" required = "true">
    </div>

    <div class = "input-field col s7 post-form">
      <i class="material-icons prefix">timer</i>
      <input  placeholder="H" id = "hora-anuncio" name = "hora-anuncio" type="number" maxlength="2" max="23" min = "0" class="validate" required = "true">
      <span class="helper-text" data-error="inválido"></span>
    </div>

    <div class = "input-field col s4 post-form">
      <input  placeholder="M" id = "minuto-anuncio" name = "minuto-anuncio" type="number" maxlength="2" max="59" min = "0" class="validate" onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;" required = "true">
      <span class="helper-text" data-error="inválido"></span>
    </div>

    <div class = "col s12">
      <i class="grey-text">(formato 24 horas)</i>
    </div>
  </div>

  <div class = "col s8">
    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">mode_edit</i>
      <textarea  placeholder="Contenido..." name ="contenido-anuncio"  class="validate materialize-textarea" required = "true" maxlength = "65" data-length = "65"></textarea>
    </div>
  </div>

</form>
