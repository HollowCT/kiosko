

            <!-- Modal Trigger -->
            <div class = " row post nueva-publicacion z-depth-2" style="border-radius: 20px; display: flex;">
              <div class = "col s1 amber accent-2" style="border-radius: 20px 0px 0px 20px">
                <i class="medium material-icons">add</i>
              </div>
                <button data-target="modal-publicacion" class="modal-trigger col s11 amber accent-1  left-align flow-text amber accent-1" style="border:none; border-radius: 0px 20px 20px 0px;align-items: stretch;"> <div class = "col s12">Nueva Publicación</div></button>

            </div>
            <!-- Modal Structure -->
            <div id="modal-publicacion" class="modal  modal-fixed-footer">
              <div class="modal-content valign-wrapper">
                <!-- Different content options -->

                <!-- Default state-->
                <div id = "ventana-publicacion" class = " col s12">
                  <div class = "row">
                  <h4 class = "col s11 offset-s1">¿Qué desea publicar?</h4>
                </div>
                  <br>

                    <button class="btn-large col s4 offset-s1" onclick="crearAnuncio()" style="background-color: #68B1A7" >Anuncio</button>
                    <button class="btn-large col s4 offset-s2" onclick="crearPregunta()" style="background-color: #68B1A7">Pregunta</button>

                </div>

                <!-- New announcement state-->
                <div id = "ventana-anuncio" class = "row oculto">
                  <?php
                  // Open new announcement form
                  require 'kiosco_nuevo_anuncio.php';
                  ?>
                </div>

                <!-- New question state-->
                <div id = "ventana-pregunta" class = "row oculto">
                  <?php
                  // Open new announcement form
                  require 'kiosco_nueva_pregunta.php';
                  ?>
                </div>

              </div>
              <div class="modal-footer">
                <a href="#!" id = "boton-publicar" class="modal-action modal-close waves-effect waves-green btn-flat green-text disabled" onclick="publicar()">Publicar</a>
                <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat" onclick="volverPredeterminado()">Cancelar</a>
              </div>
            </div>

            <script>
              //ajustes para que el modal funcione con la version jquery-1.9.1.min.js del menu
                document.addEventListener('DOMContentLoaded', function() {
                  var elems = document.querySelectorAll('.modal');
                  var instances = M.Modal.init(elems, options);
                });


                $(document).ready(function(){
                  $('.modal').modal();
                  $('.datepicker').datepicker({
                    closeText: 'Cerrar',
                    prevText: '< Ant',
                    nextText: 'Sig >',
                    currentText: 'Hoy',
                    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                    weekHeader: 'Sm',
                    dateFormat: 'yyyy-mm-dd',
                    format: 'yyyy-mm-dd',
                    formatSubmit: 'yyyy-mm-dd',
                    firstDay: 1,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: '',
                    container: 'body'
                  });
                });







  /* JavaScript FOR version 2.1

                $(document).ready(function() {
                  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                  $('.modal-trigger').leanModal();
                });


                $(document).ready(function() {
                  // Calendar in Spanish settings
                  $('.datepicker').pickadate({
                    format: 'yyyy-mm-dd',
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 2,
                    monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sept', 'Oct', 'Nov', 'Dic'],
                    weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
                    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vier', 'Sab'],
                    weekdaysLetter: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
                    today: 'hoy',
                    clear: 'borrar',
                    close: 'cerrar',
                    formatSubmit: 'yyyy-mm-dd'
                  });
                });

    */

            </script>
            <script>
              function crearAnuncio(){
                // Show form for new announcement
                var old = document.getElementById("ventana-publicacion");
                old.classList.add("oculto");
                var now = document.getElementById("ventana-anuncio");
                now.classList.remove("oculto");
                document.getElementById("boton-publicar").classList.remove("disabled");
              }

              function crearPregunta(){
                // Show form for new announcement
                var old = document.getElementById("ventana-publicacion");
                old.classList.add("oculto");
                var now = document.getElementById("ventana-pregunta");
                now.classList.remove("oculto");
                document.getElementById("boton-publicar").classList.remove("disabled");

              }

              function volverPredeterminado(){
                // Hide forms on cancel button
                var old = document.getElementById("ventana-publicacion");
                old.classList.remove("oculto");
                var now = document.getElementById("ventana-pregunta");
                now.classList.add("oculto");
                var now = document.getElementById("ventana-anuncio");
                now.classList.add("oculto");
                document.getElementById("boton-publicar").classList.add("disabled");


              }

              function publicar(){
                // Check for filled form on post button
                if (document.forms["forma-anuncio"]["titulo-anuncio"].value == "" ||
                 document.forms["forma-anuncio"]["contenido-anuncio"].value == "" ||
                 document.forms["forma-anuncio"]["fecha-anuncio"].value == "" ||
                 document.forms["forma-anuncio"]["hora-anuncio"].value == "" ||
                 document.forms["forma-anuncio"]["minuto-anuncio"].value == "") {

                   if (document.forms["forma-pregunta"]["titulo-pregunta"].value == "" ||
                    document.forms["forma-pregunta"]["contenido-pregunta"].value == "" ||
                    document.forms["forma-pregunta"]["fecha-pregunta"].value == "" ||
                    document.forms["forma-pregunta"]["opc1-pregunta"].value == "" ||
                    document.forms["forma-pregunta"]["opc2-pregunta"].value == "") {
                      alert("Llene todos los datos pertinentes");
                    }else{
                      publicarPregunta();
                    }

                }else{
                  publicarAnuncio();

                }

              }

              function publicarAnuncio (){
                // Post an announcement without exiting or reloading page
                  $.ajax({
                      url:'kiosco_publicar_anuncio.php',
                      type:'post',
                      data:$('#forma-anuncio').serialize(),
                      success:function(){
                          alert("¡Su anuncio se ha publicado!");
                      }
                  });
              }

              function publicarPregunta (){
                // Post a question without exiting or reloading page
                  $.ajax({
                      url:'kiosco_publicar_pregunta.php',
                      type:'post',
                      data:$('#forma-pregunta').serialize(),
                      success:function(){
                          alert("¡Su pregunta se ha publicado!");
                      }
                  });
              }
            </script>
