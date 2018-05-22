<!DOCTYPE HTML>
 <html>
  <head>
      <title>Mobile Phone</title>
      <meta name="viewport" content="width=device-width, initil-scale=1.0">
      <link href="css/materialize.min.css" rel="stylesheet">
  </head>
  <body class="green lighten-5">

      <?php
          // define variables and set to empty values
          $MID = $MModel = $Color = $Price ="";

          if ($_SERVER["REQUEST_METHOD"] == "POST")
          {
             $MID = test_input($_POST["MID"]);
             $MModel = test_input($_POST["MModel"]);
             $Color = test_input($_POST["Color"]);
              $Price = test_input($_POST["Price"]);
          }

          function test_input($data)
          {
             $data = trim($data);
             $data = stripslashes($data);
             $data = htmlspecialchars($data);
             return $data;
          }
      ?>

      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script src="js/materialize.min.js"></script>

      <div class="container">
        <div class="row">
          <form class="col s12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="row">
              <div class="input-field col s2">
                <input placeholder="A11" id="MID" name="MID" type="text" pattern="[A-Za-z]{1}[0-9]{2}" class="validate">
                <label for="MID">Mobile ID</label>
              </div>
              <div class="input-field col s2">
                <input id="MModel" name="MModel" type="text" class="validate">
                <label for="MModel">Mobile Model</label>
              </div>
              <div class="input-field col s2">
                <input id="Color" name="Color" type="text" class="validate">
                <label for="Color">Color</label>
              </div>
              <div class="input-field col s2">
                <input id="Price" name="Price" type="number" class="validate" min="0" max="5000">
                <label for="Price">Price</label>
              </div>
              </div>

               <!-- This do not works -->
              <button class="waves-effect waves-light btn" type="submit" name="action">Add
                  <i class="mdi-content-send right"></i>
              </button>

              <!-- This works -->
              <input type="submit" name="submit" value="Submit">
          </form>
                    </div>
                  </div>
      <?php
     if (isset($_POST['submit']))
  {
         echo "PHP function is executed<br>";
         echo $MID;
         echo $MModel;
         echo $Color;
         echo $Price;
  }
      ?>

  </body>
  </html>
