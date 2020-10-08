<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
require_once('../include/db.php');
function getRealIpAddr()
{
if (!empty($_SERVER["HTTP_CLIENT_IP"]))
{
//check for ip from share internet
$ip = $_SERVER["HTTP_CLIENT_IP"];
}
elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
{
// Check for the Proxy User
$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else
{
$ip = $_SERVER["REMOTE_ADDR"];
}
return $ip;
}
?>

<div align="center" style="padding:20px;">

<h2>Payment Options for you</h2>
<?php
$ip = getRealIpAddr();

$get_customer = "select * from customers where customer_ip='$ip'";

$run_customer = sqlsrv_query($conn, $get_customer);

$customer = sqlsrv_fetch_array($run_customer);

$customer_id = $customer['customer_id'];
?>


<b>Pay With</b>$nbsp; <a href="www.paypal.com"><img src=""width="200" height="80">
</a><b>Or <a href="order.php?c_id=<?php echo $customer_id;?>"> Pay Offline</a></b><br><br><br>

<b> If you selected "Pay Offline" option then please check your email or account to find the 'Invoice Number' for your order
</b>




</div>
</body>
</html>