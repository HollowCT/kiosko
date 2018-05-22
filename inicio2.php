<html>

<head>
  <?php require 'kiosco_materialize.php'; ?>
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
  	height: 500px;
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

</head>

<body>
  
  <div class="section"></div>
  <div class="container white z-depth-2">
  	<ul class="tabs teal">
  		<li class="tab col s3"><a class="white-text active" href="#login">login</a></li>
  		<li class="tab col s3"><a class="white-text" href="#register">register</a></li>
  	</ul>

  	<div id="login" class="col s12">
  		<form class="col s12">
  			<div class="form-container">
  				<h3 class="teal-text">Hello</h3>
  				<div class="row">
  					<div class="input-field col s12">
  						<input id="username" type="text" class="validate">
  						<label for="username">Nombre de Usuario</label>
  					</div>
  				</div>
  				<div class="row">
  					<div class="input-field col s12">
  						<input id="password" type="password" class="validate">
  						<label for="password">Contraseña</label>
  					</div>
  				</div>
  				<br>
  				<center>
  					<button class="btn waves-effect waves-light teal" type="submit" name="action">Connect</button>
  					<br>
  					<br>
  					<a href="">Forgotten password?</a>
  				</center>
  			</div>
  		</form>
  	</div>


  	<div id="register" class="col s12">
  		<form class="col s12">
  			<div class="form-container">
  				<h3 class="teal-text">Welcome</h3>
  				<div class="row">
  					<div class="input-field col s4">
  						<input id="first_name" type="text" class="validate">
  						<label for="first_name">Nombre</label>
  					</div>
  					<div class="input-field col s4">
  						<input id="last_name" type="text" class="validate">
  						<label for="last_name">Apellido</label>
  					</div>
            <div class="input-field col s4">
  						<input id="date" type="date" class="validate">
  						<label for="date">Fecha de nacimiento</label>
  					</div>
  				</div>
  				<div class="row">
  					<div class="input-field col s6">
              <p>
                <input id="male" class="with-gap" name="sex" type="radio" checked />
                <label for="male">Hombre</label>
              </p>
  					</div>
            <div class="input-field col s6">
              <p>
                <input id="female" class="with-gap" name="sex" type="radio" />
                <label for="female">Mujer</label>
              </p>
  					</div>
  				</div>
  				<div class="row">
  					<div class="input-field col s6">
  						<input id="password" type="password" class="validate">
  						<label for="password">Contraseña</label>
  					</div>
  					<div class="input-field col s6">
  						<input id="password-confirm" type="password" class="validate">
  						<label for="password-confirm">Confirme Constraseña</label>
  					</div>
  				</div>
  				<center>
  					<button class="btn waves-effect waves-light teal" type="submit" name="action">Submit</button>
  				</center>
  			</div>
  		</form>
  	</div>
  </div>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
