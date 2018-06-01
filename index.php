<?php require 'config.php'; ?>
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

        $sql = "SELECT id,username, password FROM users WHERE username = '$username'";
        if($q1 = mysqli_query($link, $sql)){
        $info = mysqli_fetch_assoc($q1);


            if(password_verify($password, $info['password'])){

                session_start();
                $_SESSION['S_username'] = $username;
                $_SESSION['S_id'] = $info['id'];
                header("location: kiosco_main_menu.php");
            } else{

                $password_err = 'La contraseña no es válida.';
                echo $password_err;
            }

        }
        else{
            $username_err = "Este usuario no existe.";
            echo $username_err;
        }
    }


    // Close connection
    mysqli_close($link);
}

elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
        //echo var_dump($_POST);
        $fn=ucfirst($_POST['first_name']);
        $ln=ucfirst($_POST['last_name']);
        $username=trim($_POST['first_name'].$_POST['last_name']);
        $sql = "SELECT id FROM users WHERE username = '$username'";
        // echo $sql;
        //echo var_dump($link);
    if($q1 = mysqli_query($link, $sql)){
        // echo "hizo algo";
        $row = mysqli_fetch_array($q1);

            if(count($row)>0){
                $username_err = "Este usuario ya existe.";
                echo $username_err;
            }
        } else{
           // echo "No hace query";
        }

//Password stuff

    $password = trim($_POST['newpassword']);
    echo $password;

    $confirm_password = trim($_POST['confirm_password']);
    echo $confirm_password;

    if($password != $confirm_password){
        $confirm_password_err = 'La contraseña no es la misma.';
        echo $confirm_password_err;
    }
    // Remaining data

    $dob = trim($_POST['dob']);
    $sex = trim($_POST['sex']);

    // Check input errors before inserting in database
    if(empty($username_err) && empty($confirm_password_err)){

        $hash = password_hash($password, PASSWORD_BCRYPT);
        $sql2 = "INSERT INTO users (username,first_name,last_name, password, dob, sex) VALUES ('$username','$fn','$ln','$hash','$dob','$sex')";

        // echo $sql2;

            if(mysqli_query($link, $sql2)){
                // Redirect to home to the logged in page
                header("location: Index.php");
            } else{
                echo "SHAME ON YOU AND YOUR COW.";

            }
        }else {
          // echo "Hay un error";
        }


}


?>


  <div class="section"></div>
  <div class="container white z-depth-2">

<div class="row">
  <ul class="tabs teal">
    <li class="tab col s6"><a class="white-text active" href="#login">login</a></li>
    <li class="tab col s6"><a class="white-text" href="#register">register</a></li>
  </ul>
  	<div id="login"  class="col s12">
  		<form name='login' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="col s12">
  			<div class="form-container">
  				<h4 class="teal-text">Bienvenido</h3>
  				<div class="row">
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
  					<button class="btn waves-effect waves-light teal" type="submit" name="login">Iniciar</button>
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
  				<h4 class="teal-text">¿Nuevo Usuario? ¡Registrese!</h4>
  				<div class="row">
  					<div class="input-field col s4">
  						<input name="first_name" id="first_name" type="text" class="validate" required>
  						<label for="first_name">Nombre</label>
  					</div>
  					<div class="input-field col s4">
  						<input name="last_name" id="last_name" type="text" class="validate" required>
  						<label for="last_name">Apellido</label>
  					</div>
            <div class="input-field col s4">
  						<input name="dob" id="dob" type="date" class="validate" required>
  						<label for="date">Fecha de nacimiento</label>
  					</div>
  				</div>
  				<div class="row">
  					<div class="input-field col s6">
              <p>
                <label for="male">
                <input id="male" class="with-gap" name="sex" type="radio" value='m' checked />
                <span>Hombre</span>
              </label>
              </p>
  					</div>
            <div class="input-field col s6">
              <p>
                <label for="female">
                <input id="female" class="with-gap" name="sex" type="radio" value='f'  />
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
  					<button class="btn waves-effect waves-light teal" type="submit" name="register">Submit</button>
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
  </script>
</body>

</html>
