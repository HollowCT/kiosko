<?php

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

 <html>
 <body>

ID  <?php echo $_POST["MID"]; ?><br>
Model  <?php echo $_POST["MModel"]; ?><br>
Color  <?php echo $_POST["Color"]; ?><br>
Price  <?php echo $_POST["Price"]; ?><br>

 </body>
 </html>
