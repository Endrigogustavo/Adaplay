<?php

session_start();

//Variáveis de Link
$index = "index.php";
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
      <form action="checkout.php" method="post">
        <h1>login</h1>
        <div class="social-icons">
          <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
        </div>
        <span>Coloque as infromações da sua conta</span>
        <input type="text" placeholder="Email" name="c_email" required>
        <input type="password" placeholder="Senha" name="c_pass" required>
        <button name="login" value="Login" class="btn btn-primary">

<i class="fa fa-sign-in"></i> Entrar


</button>
      </form>
    </div>
    <div class="form-container sign-in">
      <form action="customer_register.php" method="post" enctype="multipart/form-data" name="cliente">
        <h1>Cadastrar</h1>
        <span>Foto de perfil</span>
        <div class="social-icons">
          <div class="max-width">
            <div class="imageContainer">
              <img src="images/Cadastro/icone.png" alt="Selecione uma imagem" id="imgPhoto">
            </div>
          </div>
          <input type="file" id="flImage" name="c_image" required accept="image/*">

        </div>
        <span>Informações da conta</span>

      <input type="text" placeholder="Nome" id="name" name="c_name" required>

      <input type="email" placeholder="Email" type="email" id="email" name="c_email" required>

      <input type="password" placeholder="Senha"  onkeyup="trigger()" id="pass" name="c_pass" required class="Senha">
      <div class="indicator">
        <span class="fraco"></span>
        <span class="medio"></span>
        <span class="forte"></span>
      </div>
      <div class="text">Fraca</div>

      <input type="password" placeholder="Corfirmar Senha" id="con_pass" required>

      <input type="tel" placeholder="Contato" name="c_contact" required
      >
      <!-- pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" -->
      <input type="text" placeholder="Endereço" name="c_address" required>
      <input type="submit" value="Cadastrar" name="register" id="button" class="cadastar">
      </form>
  </div>
  <div class="toggle-container">
    <div class="toggle">
      <div class="toggle-panel toggle-left">
        <h1>Adaplay</h1>
        <img  src="images/Cadastro/Login.png" alt="" class="Img-fun1">
        <p>Bem vindo de volta!!!</p>
        <button class="hiddenn" id="loginn">Cadastrar</button>
        
      </div>
      <div class="toggle-panel toggle-right">
        <h1>Adaplay</h1>
        <img src="images/Cadastro/Cadastro.png" alt="" class="Img-fun2">
        <p>Se já tem uma conta? click em login</p>
        <button class="hiddenn" id="registerr">Login</button>
      </div>
    </div>
  </div>
  </div>

        

  <script src="js/Login.js"></script>
  <script src="js/Script-Cadastro.js"></script>

  <script src="js/jquery.min.js"> </script>

  <script src="js/bootstrap.min.js"></script>



  <!-- Tratamento da Força da senha -->
  <script>
    const indicator = document.querySelector('.indicator');
    const input = document.querySelector('.Senha');
    const fraco = document.querySelector('.fraco');
    const medio = document.querySelector('.medio');
    const forte = document.querySelector('.forte');
    const text = document.querySelector('.text');
    const showBtn = document.querySelector('.showBtn');

    let regExpFraco = /[a-z]/;
    let regExpMedio = /\d+/;
    let regExpForte = /.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/;

    function trigger() {
      if (input.value != "") {
        indicator.style.display = "flex";

        if (input.value.length <= 3
          && (input.value.match(regExpFraco)
            || input.value.match(regExpMedio)
            || input.value.match(regExpForte))) no = 1;

        if (input.value.length >= 6
          && ((input.value.match(regExpFraco)
            && input.value.match(regExpMedio))
            || (input.value.match(regExpMedio)
              && input.value.match(regExpForte))
            || (input.value.match(regExpFraco)
              && input.value.match(regExpForte)))) no = 2;

        if (input.value.length >= 6
          && input.value.match(regExpFraco)
          && input.value.match(regExpMedio)
          && input.value.match(regExpForte)) no = 3;

        if (no == 1){
          fraco.classList.add('active');
          text.style.display ="block";
          text.textContent="A sua senha é fraca";
          text.classList.add('fraco');
        }

        if (no == 2){
          medio.classList.add('active');
          text.style.display ="block";
          text.textContent="A sua senha é mediana";
          text.classList.add('medio');
        }else{
          medio.classList.remove('active');
          text.classList.remove('medio');
        }

        if (no == 3){
          forte.classList.add('active');
          text.style.display ="block";
          text.textContent="A sua senha é forte";
          text.classList.add('forte');
        }else{
          forte.classList.remove('active');
          text.classList.remove('forte');
        }

        showBtn.style.display='block';
        showBtn.onclick=function(){

          if(input.type == 'password'){
            showBtn.textContent="HIDE";
            input.type = 'text';
          }else{
            showBtn.textContent="SHOW";
            input.type = 'password';
          }
        }

      } else {
        indicator.style.display = "none";
        text.style.display = "none";
        showBtn.style.display = "none"
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




if (isset($_POST['login'])) {
    // Verifica se o formulário de login foi submetido

    $customer_email = $_POST['c_email'];
    // Obtém o valor do campo de email do formulário

    $customer_pass = $_POST['c_pass'];
    // Obtém o valor do campo de senha do formulário

    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    // Cria uma consulta SQL para verificar se o email e a senha correspondem a um registro na tabela de clientes

    $run_customer = mysqli_query($con, $select_customer);
    // Executa a consulta SQL usando a conexão com o banco de dados ($con)

    $get_ip = getRealUserIp();
    // Obtém o endereço IP real do usuário

    $check_customer = mysqli_num_rows($run_customer);
    // Verifica quantas linhas correspondem à consulta SQL, ou seja, se o login foi bem-sucedido

    $select_cart = "select * from cart where ip_add='$get_ip'";
    // Cria uma consulta SQL para buscar informações do carrinho com base no endereço IP do usuário

    $run_cart = mysqli_query($con, $select_cart);
    // Executa a consulta no banco de dados para o carrinho

    $check_cart = mysqli_num_rows($run_cart);
    // Verifica quantas linhas foram retornadas pela consulta do carrinho

    if ($check_customer == 0) {
        // Se nenhum cliente corresponder ao email e senha fornecidos

        echo "<script>alert('Senha ou Email incorretos.')</script>";
        // Exibe um alerta informando que a senha ou o email estão incorretos
        exit();
        // Encerra o script
    }

    if ($check_customer == 1 and $check_cart == 0) {
        // Se um cliente corresponder e não houver itens no carrinho

        $_SESSION['customer_email'] = $customer_email;
        // Define a variável de sessão 'customer_email' com o valor do email do cliente

        echo "<script>alert('Conta Acessada.')</script>";
        // Exibe um alerta informando que o cliente está logado

        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
        // Redireciona o cliente para a página 'my_account.php' com a consulta de 'my_orders' como parâmetro
    } else {
        // Se um cliente corresponder e houver itens no carrinho

        $_SESSION['customer_email'] = $customer_email;
        // Define a variável de sessão 'customer_email' com o valor do email do cliente

        echo "<script>alert('You are Logged In')</script>";
        // Exibe um alerta informando que o cliente está logado

        echo "<script>window.open('checkout.php','_self')</script>";
        // Redireciona o cliente para a página 'checkout.php'
    }
}


?>