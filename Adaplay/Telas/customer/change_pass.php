<h1 align="center">Alteração de Senha </h1>

<form action="" method="post"><!-- form Starts -->

    <div class="form-group"><!-- form-group Starts -->

        <label>Digite Sua Senha Atual</label>

        <input type="text" name="old_pass" class="form-control" required>

    </div><!-- form-group Ends -->


    <div class="form-group"><!-- form-group Starts -->

        <label>Digite Sua Nova Senha</label>

        <input type="text" name="new_pass" class="form-control" required>

    </div><!-- form-group Ends -->


    <div class="form-group"><!-- form-group Starts -->

        <label>Digite Sua Nova Senha Novamente</label>

        <input type="text" name="new_pass_again" class="form-control" required>

    </div><!-- form-group Ends -->

    <div class="text-center"><!-- text-center Starts -->

        <button type="submit" name="Enviar" class="btn btn-primary">

            <i class="fa fa-user-md"> </i> Alterar Senha

        </button>

    </div><!-- text-center Ends -->

</form><!-- form Ends -->
<?php

if (isset($_POST['Enviar'])) {

    $c_email = $_SESSION['customer_email'];

    $old_pass = $_POST['old_pass'];

    $new_pass = $_POST['new_pass'];

    $new_pass_again = $_POST['new_pass_again'];

    $sel_old_pass = "select * from customers where customer_pass='$old_pass'";

    $run_old_pass = mysqli_query($con, $sel_old_pass);

    $check_old_pass = mysqli_num_rows($run_old_pass);

    if ($check_old_pass == 0) {

        echo "<script>alert('Your Current Password is not valid try again')</script>";

        exit();
    }

    if ($new_pass != $new_pass_again) {

        echo "<script>alert('Your New Password dose not match')</script>";

        exit();
    }

    $update_pass = "update customers set customer_pass='$new_pass' where customer_email='$c_email'";

    $run_pass = mysqli_query($con, $update_pass);

    if ($run_pass) {

        echo "<script>alert('your Password Has been Changed Successfully')</script>";

        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    }
}



?>