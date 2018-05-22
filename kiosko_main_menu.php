<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php require 'kiosco_materialize.php'; ?>
    <style media="screen">

    header, main, footer {
      padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
    }

    li#nav{
      padding: 2em;
    }

    </style>

    <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

  </head>



  <body>

<?php





?>


    <!-- Navbar goes here -->

<header class="teal">
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons white">menu</i></a>  Menu

  <ul id="slide-out" class="sidenav sidenav-fixed">
    <li class="logo center" ><h1 text-align="center">g r u p</h1></li>
    <li id="nav"><a class="waves-effect waves-light btn-large"><i class="material-icons left">date_range</i>Planes</a></li>
    <li id="nav"><a class="waves-effect waves-light btn-large"><i class="material-icons left">shopping_basket</i>Mercado</a></li>
  </ul>

   <div class="divider"></div>

</header>



    <!-- Page Layout here -->
<main>



      <div class="row">


        <div class="col teal s12">

          <div class="row">

            <div class="col s4">



              <!-- card structure -->
              <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                  <span class="card-title">Card Title</span>
                  <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
                  </div>
                  <div class="card-action">
                    <a href="#modal1" class="modal-trigger">Modal Test</a>
                  </div>
                </div>

                <!-- Modal Structure -->
              <div id="modal1" class="modal modal-fixed-footer">
                  <div class="modal-content">
                    <h4>Nuevo Producto</h4>
                    <div class="row">
                      <form id="newMarket" name="forma-producto" action="submitProduct.php" class="col s12">
                        <div class="row">
                          <div class="col s6">
                            <div class="input-field">
                              <i class="material-icons prefix">account_circle</i>
                              <input placeholder="nombre" name="producto-nombre" type="text">
                            </div>
                            <div class="input-field">
                              <i class="material-icons prefix">phone</i>
                              <input placeholder="telefono" name="producto-tel" type="text">
                            </div>
                            <div class="input-field">
                              <i class="material-icons prefix">access_time</i>
                              <input placeholder="Hora"  name="producto-hora" type="text">
                            </div>
                            <div class="input-field">
                              <i class="material-icons prefix">calendar_today</i>
                              <input placeholder="Dias" namce="producto-dias" type="text">
                            </div>
                          </div>
                          <div class="col s6">
                            <div class="input-field">
                              <i class="material-icons prefix">attach_money</i>
                              <input placeholder="Precio" name="producto-precio" type="text">
                            </div>
                            <div class="input-field">
                              <textarea name="producto-desc" class="materialize-textarea"></textarea>
                              <label for="desc">Descripcion</label>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>


                  <div class="modal-footer">
                    <button type="submit" class="modal-close waves-effect waves-green btn">Submit</button>
                    <button class="modal-close waves-effect waves-red red btn">Cancel</button>

                  </div>
                </div>






            </div>

            <div class="col s4 m4 l4">
              <div class="card">
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="images/office.jpg">
                  </div>
                  <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                    <p><a href="#">This is a link</a></p>
                  </div>
                  <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                  </div>
                </div>
            </div>

            <div class="col s4 m4 l4">
              <div class="card">
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="images/office.jpg">
                  </div>
                  <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                    <p><a href="#">This is a link</a></p>
                  </div>
                  <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                  </div>
                </div>
            </div>

          </div>


<div class="row">

  <div class="col s4 m4 l4">
    <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="images/office.jpg">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
          <p><a href="#">This is a link</a></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
          <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
      </div>
  </div>

  <div class="col s4 m4 l4">
    <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="images/office.jpg">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
          <p><a href="#">This is a link</a></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
          <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
      </div>
  </div>

  <div class="col s4 m4 l4">
    <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="images/office.jpg">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
          <p><a href="#">This is a link</a></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
          <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
      </div>
  </div>


</div>


<div class="row">

  <div class="col s4 m4 l4">
    <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="images/office.jpg">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
          <p><a href="#">This is a link</a></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
          <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
      </div>
  </div>

  <div class="col s4 m4 l4">
    <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="images/office.jpg">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
          <p><a href="#">This is a link</a></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
          <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
      </div>
  </div>

  <div class="col s4 m4 l4">
    <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="images/office.jpg">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
          <p><a href="#">This is a link</a></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
          <p>Here is some more information about this product that is only revealed once clicked on.</p>
        </div>
      </div>
  </div>


</div>
        </div>

      </div>

      <div  class="fixed-action-btn"  style="bottom: 45px; right: 24px;">
        <button id="scroll-btn" onClick="topFunction()" class="btn-floating btn-large red">
          <i class="material-icons">arrow_upward</i>
        </button>
      </div>
    </div>


</main>

  </body>



 <!-- scripts go here -->



<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>

<script>
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

document.addEventListener('DOMContentLoaded', function() {
   var elems = document.querySelectorAll('.sidenav');
   var instances = M.Sidenav.init(elems, options);
 });


 $(document).ready(function(){
   $('.sidenav').sidenav();
 });

 document.addEventListener('DOMContentLoaded', function() {
   var elems = document.querySelectorAll('.modal');
   var instances = M.Modal.init(elems, options);
 });


 $(document).ready(function(){
   $('.modal').modal();
 });


 function publicar(){
              if (document.forms["forma-producto"]["producto-nombre"].value == "" ||
               document.forms["forma-producto"]["producto-tel"].value == "" ||
               document.forms["forma-producto"]["producto-dias"].value == "" ||
               document.forms["forma-producto"]["producto-desc"].value == "" ||
               document.forms["forma-producto"]["producto-hora"].value == "" ||
               document.forms["forma-producto"]["producto-precio"].value == ""
             ) {
                  alert("Llene todos los datos pertinentes");
              }else{
                document.getElementById("forma-producto").submit();
              }

            }

</script>
</html>
