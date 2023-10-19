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


<body>

    <div class="containerrr" id="containerrr">
        <div class="form-container sign-up">
            <form>
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registeration</span>
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1>Sign In</h1>
                <div class="social-icons">
                <div class="max-width">
                 <div class="imageContainer">
                 <img src="images/icone.png" alt="Selecione uma imagem" id="imgPhoto">
                 </div>
               </div>
               <input type="file" id="flImage" name="fImage" accept="image/*">

                </div>
                <span>or use your email password</span>

                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <a href="#">Forget Your Password?</a>
                <button>Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hiddenn" id="loginn">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hiddenn" id="registerr">Teste</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 
            <script type="text/javascript" src="Script/script.js">
                                    	                                    
const Banco = requere('banco')	const Banco = requere('banco')
const banco = new Banco('testeibm', 'root', '',{	const banco = new Banco('testeibm', 'root', '',{
  host: "localhost",	 host: "localhost",
  dialect: "mysql"	 dialect: "mysql"
})	})
banco.authenticate().then(function(){	  banco.authenticate().then(function(){
  console.log("Sucesso")	   console.log("Sucesso")
}).catch(function(erro){	  }).catch(function(erro){
  console.log("falha " +erro)	  console.log("falha " +erro)
})	  })
    function salvar(){
            function salvar(){	        var nome = document.getElementById('register_username').value;
                var nome = document.getElementById('register_username').value;	        var senha = document.getElementById('register_password').value;
                var senha = document.getElementById('register_password').value;	        banco.transaction(function(armazenar){
                banco.transaction(function(armazenar){	         armazenar.executeSql("INSERT INTO usuarios (username, password) VALUES (?,?)",[nome,senha]);
                 armazenar.executeSql("INSERT INTO usuarios (username, password) VALUES (?,?)",[nome,senha]);	         });
                 });	     }
             }	    </script>


             https://github.com/Endrigogustavo/IBM--2023/commit/d65bc4d02f4b0ab1506b46f48978a755ac1e8e3e#diff-48ae95d0b66a2bff674d13ecf7158b80303bf77dc9027f9822560a352ff104dd
    -->
    <script src="js/Login.js"></script>
    <script src="js/Script-Cadastro.js"></script>

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
        meter.style.backgroundColor = "#ff3259";
        document.getElementById("pass_type").innerHTML = "Fraco";
      }

      if (no == 2) {
        $("#meter").animate({
          width: '100px'
        }, 300);
        meter.style.backgroundColor = "#f8ff32";
        document.getElementById("pass_type").innerHTML = "Medio";
      }

      if (no == 3) {
        $("#meter").animate({
          width: '150px'
        }, 300);
        meter.style.backgroundColor = "#32ff54";
        document.getElementById("pass_type").innerHTML = "Bom";
      }

      if (no == 4) {
        $("#meter").animate({
          width: '200px'
        }, 300);
        meter.style.backgroundColor = "#32a6ff";
        document.getElementById("pass_type").innerHTML = "Forte";
      }
    } else {
      meter.style.backgroundColor = "";
      document.getElementById("pass_type").innerHTML = "";
    }
  }
</script>

<div class="toggle">
</div>
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