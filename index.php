<?php             require 'kiosco_conectar_bdd.php';

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Introduce tu nombre de usuario.';
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Introduce tu contraseña.';
    } else{
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){

        $sql = "SELECT id,username, password FROM Users WHERE username = '$username'";
        if($q1 = mysqli_query($conexion, $sql)){
          $info = mysqli_fetch_assoc($q1);
          if(password_verify($password, $info['password'])){

                session_start();
                $_SESSION['S_username'] = $username;
                $_SESSION['S_id'] = $info['id'];
                header("location: kiosco_publicaciones.php");
            } else{

                header("location: index.php?credentials=mal");
            }

        }
        else{
            header("location: index.php?credentials=mal");
        }
    }
    // Close connection
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
        //echo var_dump($_POST);
        $fn=ucfirst($_POST['first_name']);
        $ln=ucfirst($_POST['last_name']);
        $username=trim($_POST['first_name'].$_POST['last_name']);
        $sql = "SELECT username FROM Users WHERE username like '$username%' ORDER BY username DESC";
        // echo $sql;
        //echo var_dump($conexion);
    if($q1 = mysqli_query($conexion, $sql)){
        // echo "hizo algo";
        $row = mysqli_fetch_array($q1);

            if(count($row)>0){
                $lastdigits = substr($row[0], -2);
                //evaluar últimos dos dígitos para saber si hay múltiples usuarios con ese nombre
                $digits = ctype_digit($lastdigits) ? intval($lastdigits) : null;
                if(!($digits === null)){
                  $digits += 1; //crear un nuevo usuario con ese Nombre
                  $digits = ($digits<9) ? '0'.$digits : $digits;
                  $username .= $digits;
                }else
                  $username .= '01';
            }
        } else{
           // echo "No hace query";
        }

        //Password stuff

    $password = trim($_POST['newpassword']);

    $confirm_password = trim($_POST['confirm_password']);

    if($password != $confirm_password){
        $confirm_password_err = 'La contraseña no es la misma.';
    }
    // Remaining data

    $dob = trim($_POST['dob']);
    $sex = trim($_POST['sex']);

    // Check input errors before inserting in database
    if(empty($username_err) && empty($confirm_password_err)){

        $hash = password_hash($password, PASSWORD_BCRYPT);
        $sql2 = "INSERT INTO Users (username,first_name,last_name, password, dob, sex, foto) VALUES ('$username','$fn','$ln','$hash','$dob','$sex','profile8')";

        // echo $sql2;

            if(mysqli_query($conexion, $sql2)){
                // Redirect to home to the logged in page
                header("location: index.php?newuser=".$username);
            } else{
                echo "SHAME ON YOU AND YOUR COW.";

            }
        }else {
          // echo "Hay un error";
        }


}
require 'kiosco_desconectar_bdd.php';

//Open login page
?>
<html>
<meta charset="utf-8">
<head>

  <style>
  body
  {
  	background: #f5f5f5;
  }

  h5
  {
  	font-weight: 400;
  }

  .container
  {
  	margin-top: 30px;
  	width: 800px;
  	height: 600px;
  }

  .tabs .indicator
  {
  	background-color: #e0f2f1;
  	height: 60px;
  	opacity: 0.3;
  }

  .form-container
  {
  	padding: 40px;
  	padding-top: 10px;
  }

  .confirmation-tabs-btn
  {
  	position: absolute;
  }

  .card-panel{
    min-width: 50vh;
    min-height: 50vh;
  }

  .carousel{
    height:100vh;
  }




  </style>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css"> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

  <?php require 'kiosco_materialize.php'; ?>
</head>

<body>

<?php
$username = "";
$password = "";
$username_err = "";
$password_err = "";

?>

<div class="fixed-action-btn direction-top" style="bottom: 45px; right: 24px;">
          <a class="btn-floating btn-large red">
            <i onclick="toggle()" class="material-icons">announcement</i>
          </a>
        </div>


        <div id='anuncios' style="display:none;" class="carousel carousel-slider center">


          <?php
            $colors = ['amber', 'red', 'green','blue','purple'];
            $c=0;
            require 'kiosco_conectar_bdd.php';
            $sql = "SELECT * FROM Publicacion ORDER BY publicacionID DESC LIMIT 5" ;
            $q1 = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($q1)!=0){
              while($d=mysqli_fetch_assoc($q1)){
        ?>
           <div class="carousel-item <?php echo $colors[$c];?>" href="#one!">

             <div class="container valign-wrapper">
                  <div class="row valign-wrapper">
                    <div class="card-panel <?php echo $colors[$c]; $c++;?> accent-2">
                      <div class=" col s2">
                        <img style="background-color:white" src=
                         <?php if ($d['tipo']=='votacion') echo "'icons/manos.png'"; ?>
                         <?php if ($d['tipo']=='evento') echo "'icons/planes.png'"; ?>
                         <?php if ($d['tipo']=='anuncio') echo "'icons/anuncio.png'"; ?>
                        alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                      </div>
                      <div class="col s10">
                        <h2 class="grey-text text-darken-3  left-align"><?php echo $d['titulo'];?></h2>
                        <p class='grey-text text-darken-3  flow-text left-align' class=""><?php echo $d['contenido']; ?></p>
                        <?php if ($d['tipo']=='votacion') {
                          echo "<ul class='collection'>";
                          echo "<li class='collection-item'>".$d['opc1']."</li>";
                          echo "<li class='collection-item'>".$d['opc2']."</li>";
                          if ($d['opc3']!= NULL) {
                            echo "<li class='collection-item'>".$d['opc3']."</li>";
                          }
                          echo "</ul>";
                        } ?>
                      </div>
                    </div>

                  </div>
              </div>
           </div>

         <?php
       }
     }
       require 'kiosco_desconectar_bdd.php';
    ?>
         </div>


  <div class="section"></div>




  <div id='menu' style="display:block;" class="container white z-depth-2">

<div class="row">
  <ul class="tabs amber">
    <li class="tab col s6"><a class="white-text <?php if (empty($confirm_password_err)) echo "active"; ?>" href="#login">login</a></li>
    <li class="tab col s6"><a class="white-text <?php if (!empty($confirm_password_err)) echo "active"; ?> " href="#register">register</a></li>
  </ul>
  	<div id="login"  class="col s12">
  		<form name='login' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="col s12">
  			<div class="form-container">
  				<h4 class="amber-text">Bienvenido</h3>
  				<div class="row">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['credentials']))
                echo "<div class = 'red-text col s12'>Usuario o contraseña inválidos</div>";

            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['newuser'])){
                echo "<div class='card-panel green lighten-2'>
                        Su nuevo nombre de usuario es: <b>".$_GET['newuser']."</b>
                        <br>
                        Recuerde su nombre de usuario y contraseña. Sin estos datos no podrá entrar al sistema.
                        </div>";
            }
            ?>
  					<div class="input-field col s12">
  						<input name="username" id="username" type="text" class="validate">
  						<label for="username">Nombre de Usuario</label>
  					</div>
  				</div>
  				<div class="row">
  					<div class="input-field col s12">
  						<input name="password" id="password" type="password" class="validate">
  						<label for="password">Contraseña</label>
  					</div>
  				</div>
  				<br>
  				<center>
  					<button class="btn waves-effect waves-light indigo" type="submit" name="login">Iniciar</button>
  					<br>
  					<br>
  					<!-- <a href="">¿Olvidaste tu contraseña?</a> -->
  				</center>
  			</div>
  		</form>
  	</div>


  	<div id="register" class="col s12">
  		<form name='register' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="col s12">
  			<div class="form-container">
  				<h4 class="amber-text">¿Nuevo Usuario? ¡Registrese!</h4>
  				<div class="row">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($confirm_password_err))
                echo "<div class = 'red-text col s12'>La confirmación de contraseña no coincide</div>";
                //en caso de presentar este error, mostrar valores con que llenó la forma

             ?>
  					<div class="input-field col s4">
  						<input name="first_name" id="first_name" type="text" class="validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['first_name'])."'"; ?> required>
  						<label for="first_name">Nombre</label>
  					</div>
  					<div class="input-field col s4">
  						<input name="last_name" id="last_name" type="text" class="validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['last_name'])."'"; ?> required>
  						<label for="last_name">Apellido</label>
  					</div>
            <div class="input-field col s4">
  						<input name="dob" id="dob" type="date" class="validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['dob'])."'"; ?> required>
  						<label for="date">Fecha de nacimiento</label>
  					</div>
  				</div>
  				<div class="row">
  					<div class="input-field col s6">
              <p>
                <label for="male">
                <input id="male" class="with-gap" name="sex" type="radio" value='m' <?php if (empty($confirm_password_err) || trim($_POST['sex'])=='m') echo "checked"; ?> />
                <span>Hombre</span>
              </label>
              </p>
  					</div>
            <div class="input-field col s6">
              <p>
                <label for="female">
                <input id="female" class="with-gap" name="sex" type="radio" value='f' <?php if (!empty($confirm_password_err) && trim($_POST['sex'])=='f') echo "checked"; ?>  />
                <span>Mujer</span>
              </label>
              </p>
  					</div>
  				</div>
  				<div class="row">
  					<div class="input-field col s6">
  						<input name="newpassword" id="newpassword" type="password" class="validate" required>
  						<label for="newpassword">Contraseña</label>
  					</div>
  					<div class="input-field col s6">
  						<input name="confirm_password" id="confirm_password" type="password" class="validate" required>
  						<label for="confirm_password">Confirme Constraseña</label>
  					</div>
  				</div>
  				<center>
  					<button class="btn waves-effect waves-light amber" type="submit" name="register">Submit</button>
  				</center>
  			</div>
  		</form>
  	</div>
  </div>
</div>

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>

  <script type="text/javascript">


$(document).ready(function(){
$('.tabs').tabs();
});


var instance = M.Carousel.init({
  fullWidth: true,
  indicators: true
});

// Or with jQuery

$('.carousel.carousel-slider').carousel({
  fullWidth: true,
  indicators: true
});

setTimeout(autoplay, 15000);
function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 15000);
}


function toggle() {
    var x = document.getElementById("anuncios");
    var y = document.getElementById("menu");
    if (x.style.display == "none") {
        x.style.display = "block";
        x.style.height = "100vh";
        y.style.display = 'none';

    } else {
        x.style.display = "none";
        y.style.display = 'block';
    }
}




  </script>
</body>

</html>
<?php ?>
