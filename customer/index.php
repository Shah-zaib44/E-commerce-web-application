<?php
    session_start();
    require_once('../include/db.php');

    if (isset($_POST["add"])){
        $a=$_GET['id'];
        $b=$_POST['quantity'];

       $cart="insert into cart (p_id,qty) values ('$a','$b')";
       $run_cart=sqlsrv_query($conn,$cart);
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_image' => $_POST["hidden_image"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="index.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_image' => $_POST["hidden_image"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            $a=$_GET['id'];
            $delete_cart="delete from cart where p_id='".$a."'";
            $run_delete=sqlsrv_query($conn, $delete_cart);
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="index.php"</script>';
                }
            }
        }
    }
?>
<?php



?>








<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  
  
  <title>Bootstrap Theme</title>
  <style>
    #cartImage{
  height:50px;
  width: auto;
    }
  </style>
</head>

<body>
  <!-- START HERE -->
 
        
       
            <table class="table table-bordered text-center">
            <thead class='bg-dark text-light'>
            <tr>
            <th >Image</th>

                <th >Title</th>
                <th >Quantity</th>
                <th >Price </th>
                <th >Total</th>
                <th >Remove </th>
            </tr>
</thead>
            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                        <td><img src="<?php echo $value["item_image"]; ?>" alt="" srcset="" id="cartImage"></td>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td> <?php echo $value["product_price"]; ?>/-</td>
                            <td>
                                <?php echo $value["item_quantity"] * $value["product_price"]; ?>/-</td>
                            <td><a href="index.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="btn btn-danger">Remove</span></a></td>
                                       
                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr><td></td><td></td><td></td>
                            <th  >Total</th>
                            <th > <?php echo $total; ?>/-</th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
         

  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());
  </script>
</body>

</html>









