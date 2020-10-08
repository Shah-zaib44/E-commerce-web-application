<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
  
<div class="wrapper">
   <a href="index.php"><div class="header"></div></a>

   <div class="right">


<?php
if(isset($_GET['view_payments'])){

include("view_payments.php");
}
?>
</div> </div> 
</body>
</html>
