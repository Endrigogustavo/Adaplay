<?php

session_start();

include("includes/db.php");
include("functions/functions.php");

?>

<head>
<link rel="icon" href="images/logo.png">
</head>



<?php

if (!isset($_SESSION['customer_email'])) {

  include("customer/customer_login.php");
} else {

  include("select_payment.php");
}



?>



<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>