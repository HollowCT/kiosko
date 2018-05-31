
<html>
<style>
  .post{
    -border: solid black .5px;
    margin-top: 5px;
  }
  .titulo{
    font-weight: bold;
  }
  .oculto{
    display: none;
  }
</style>
  <head>
    <?php require 'kiosco_materialize.php'; ?>
    <style media="screen">

    header{
      padding-left: 300px;
      height: 70px;
      margin-top: -2px;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
    }

    li#nav{
      padding: 1.5em;
    }

    h2{
      color: #68B1A7;
    }

    .menu-img{
      max-width:90%;
      height: auto;
      padding: .5em;
    }

    .btn-menu{
      border: none;
      height: 150px;
      width: 150px;

    }

    .btn-profile{
      border: none;

    }

    .post{
      -border: solid black .5px;
      margin-top: 5px;
    }
    .titulo{
      font-weight: bold;
    }
    .oculto{
      display: none;
    }

    </style>

    <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

  </head>


  <body>



    <!-- Navbar goes here -->

<header style="background-color: #5F77B7">
  <?php require 'kiosco_conectar_bdd.php'; ?>

  <?php // aux query for user
    $query = "SELECT foto FROM Usuario WHERE usuarioID = 2";
    $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());
    $row = mysqli_fetch_row($result);
    $profile = "img/".$row[0].".png";
  ?>
  <div class="valign-wrapper right" style="width:70px;">
    <img src="<?php echo $profile;?>" alt="" onclick="location.href='perfil.php';" class="circle responsive-img right menu-img waves-effect waves-light ">
  </div>
  <?php require 'kiosco_desconectar_bdd.php'; ?>

  <div class = "white-text hide-on-large-only">
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons white">menu</i></a>
  Menu
  </div>
  <ul id="slide-out" class="sidenav sidenav-fixed">
    <li class="logo center hide-on-small-only" ><img class="menu-img" src ="icons/comuna_amarillo.png" style="max-width:150px;"></img></li>
    <li id="nav" class="center" ><button class = "waves-effect waves-light z-depth-2 blue light-blue lighten-4 btn-menu" onclick="location.href='kiosco_publicaciones.php';" > <img class="menu-img" src ="icons/planes.png"></img></button></li>
    <li id="nav" class="center" ><button class = "waves-effect waves-light z-depth-2 blue light-blue lighten-4 btn-menu" onclick="location.href='kiosko_main_menu.php';"  > <img class="menu-img" src ="icons/mercado.png"></img></button></li>
  </ul>

   <div class="divider"></div>
</header>


  </body>
</html>

    <!-- Page Layout here -->
<main>



      <div class="row">


        <div class="col teal s12">


      <div  class="fixed-action-btn"  style="bottom: 45px; right: 24px;">
        <button id="scroll-btn" onClick="topFunction()" class="btn-floating btn-large red">
          <i class="material-icons">arrow_upward</i>
        </button>
      </div>
    </div>
  </div>


</main>



 <!-- scripts go here -->





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



</script>
