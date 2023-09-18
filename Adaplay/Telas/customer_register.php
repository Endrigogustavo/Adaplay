<?php

session_start();

  //Variáveis de Link
$index= "index.php";
$register = "#";
$conta = "customer/my_account.php?my_orders";
$cart = "cart.php";
$favorites = "customer/my_account.php?my_wishlist";
$products = "shop.php";
$contato = "contact.php";
$logout = "logout.php";
$checkout = "checkout.php";


include("includes/db.php");

include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");



?>

<!--alt shift F -->

<link href="styles/Login.css" rel="stylesheet">

<main>

  <div class="d-flex justify-content-end align-items-center">
    <form action="customer_register.php" method="post" enctype="multipart/form-data" name="cliente">
      <div class="d-flex">


        <div class="d-flex justify-content-end">
          <h1 class="H1">Cadastro</h1>
          <div class="alternative">
          </div>

          <label for="name">
            <span>Nome</span>
            <input class="text" type="text" id="name" name="c_name" required>
          </label>


          <label for="email">
            <span>Email</span>
            <input class="text" type="email" id="email" name="c_email" required>
          </label>

          <label for="email">


            <span>Senha</span>


            <input class="text" type="password" id="pass" name="c_pass" required>


          </label>


          <div id="meter_wrapper"><!-- Início de wrapper do medidor de senha -->

            <span id="pass_type"> </span>

            <div id="meter"> </div>
            <div class="input-group">
            </div><!-- Fim de wrapper do medidor de senha -->


          </div><!-- Fim de grupo de entrada -->

        </div><!-- Fim de grupo de formulário -->



        <div class="form-group">


          <div class="input-group"><!-- Início de grupo de entrada -->



            </span><!-- Complemento do grupo de entrada termina -->


          </div><!-- Fim do grupo de entrada -->

        </div><!-- Fim do Formulário -->



        <label for="password">

          </span>

          <span>Confirmar Senha</span>

          <input class="text" type="password" id="con_pass" required>
        </label>
        <label for="password">

          <span>Contato</span>
          <input class="text" type="text" id="password" name="c_contact" required>
        </label>

        <label for="password">
          <span>Endereço</span>
          <input class="text" type="text" id="password" name="c_address" required>
        </label>


        <label for="password">
          <span>Foto de Perfil</span>
          <input class="text" type="file" id="password" name="c_image" required>
        </label>
        <div class="d-flex justify-content-end"> <input type="submit" value="Cadastar" name="register" id="button" class="cadastar"> </div>

      </div>

  </div>



  </form>
  </div>
</main>
<section class="images">
  <div class="circle"></div>
</section>



<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>



<!-- Tratamento da Força da senha -->
<script>
  $(document).ready(function() {
    $("#pass").keyup(function() {
      check_pass();
    });
  });

  function check_pass() {
    var val = document.getElementById("pass").value;
    var meter = document.getElementById("meter");
    var no = 0;
    if (val != "") {
      // 6 caracteres
      if (val.length <= 6) no = 1;
      // Caracter especial + 6 letras
      if (val.length > 6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))) no = 2;
      // Caracter especial + 6 letras + Numeros
      if (val.length > 6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))) no = 3;
      // Caracter especial + 6 letras + Numeros com uma certa quantidade de numeros
      if (val.length > 6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) no = 4;
      if (no == 1) {
        $("#meter").animate({
          width: '50px'
        }, 300);
        meter.style.backgroundColor = "red";
        document.getElementById("pass_type").innerHTML = "Fraco";
      }

      if (no == 2) {
        $("#meter").animate({
          width: '100px'
        }, 300);
        meter.style.backgroundColor = "Yellow";
        document.getElementById("pass_type").innerHTML = "Medio";
      }

      if (no == 3) {
        $("#meter").animate({
          width: '150px'
        }, 300);
        meter.style.backgroundColor = "Green";
        document.getElementById("pass_type").innerHTML = "Bom";
      }

      if (no == 4) {
        $("#meter").animate({
          width: '200px'
        }, 300);
        meter.style.backgroundColor = "Blue";
        document.getElementById("pass_type").innerHTML = "Forte";
      }
    } else {
      meter.style.backgroundColor = "";
      document.getElementById("pass_type").innerHTML = "";
    }
  }
</script>
</body>

</html>

<?php


// Filtrando itens para enviar ao banco
if (isset($_POST['register'])) {
  $remoteip = $_SERVER['REMOTE_ADDR'];

  if ($result['success'] == 0) {
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_ip = getRealUserIp();
    move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");
    $get_email = "select * from customers where customer_email='$c_email'";
    $run_email = mysqli_query($con, $get_email);
    $check_email = mysqli_num_rows($run_email);

    if ($check_email == 1) {
      echo "<script>alert('This email is already registered, try another one')</script>";
      exit();
    };



    mail($c_email, $subject, $message, $headers);
    $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip,customer_confirm_code) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip','$customer_confirm_code')";
    $run_customer = mysqli_query($con, $insert_customer);
    $sel_cart = "select * from cart where ip_add='$c_ip'";
    $run_cart = mysqli_query($con, $sel_cart);
    $check_cart = mysqli_num_rows($run_cart);

    if ($check_cart > 0) {

      $_SESSION['customer_email'] = $c_email;
      echo "<script>alert('Cadastrado com Sucesso')</script>";
      echo "<script>window.open('checkout.php','_self')</script>";
    } else {

      $_SESSION['customer_email'] = $c_email;
      echo "<script>alert('Cadastrado com Sucesso')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  } else {
    echo "<script>alert('Erro ao cadastrar, tente novamente')</script>";
  }
}

?>