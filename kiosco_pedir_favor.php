<?php session_start(); ?>

            <!-- Modal Trigger -->
            <div class = " row post nuevo-favor z-depth-2" style="border-radius: 20px; display: flex;">
              <div class = "col s1 amber accent-2" style="border-radius: 20px 0px 0px 20px">
                <i class="medium material-icons">add</i>
              </div>
                <button data-target="modal-favor" class="modal-trigger col s11 amber accent-1  left-align flow-text amber accent-1" style="border:none; border-radius: 0px 20px 20px 0px;align-items: stretch;"> <div class = "col s12">Nuevo Favor</div></button>

            </div>
            <!-- Modal Structure -->
            <div id="modal-favor" class="modal  modal-fixed-footer">
              <div class="modal-content valign-wrapper">

                <div id = "ventana-favor" class = " row col s12">

                  <?php
                  // Open new favour form
                  require 'kiosco_nuevo_favor.php';
                  ?>

                </div>


              </div>
              <div class="modal-footer">
                <a href="#!" id = "boton-publicar" class="modal-action modal-close waves-effect waves-green btn-flat green-text disabled" onclick="publicar()">Publicar</a>
                <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat" >Cancelar</a>
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
                });

            </script>
            <script>

              function publicar(){
                // Check for filled form on post button
                if (document.forms["forma-favor"]["titulo-anuncio"].value == "" ||
                 document.forms["forma-favor"]["contenido-anuncio"].value == "" ||
                 document.forms["forma-favor"]["fecha-anuncio"].value == "" ||
                 document.forms["forma-favor"]["hora-anuncio"].value == "" ||
                 document.forms["forma-favor"]["minuto-anuncio"].value == "") {

                    alert("Llene todos los datos pertinentes");
                  }else{
                    // Post an announcement without exiting or reloading page
                      $.ajax({
                          url:'kiosco_publicar_favor.php',
                          type:'post',
                          data:$('#forma-favor').serialize(),
                          success:function(){
                              alert("¡Su solicitud de favor se ha publicado!");
                          }
                      });
                  }

              }

            </script>
