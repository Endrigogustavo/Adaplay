<?php


// Filtrando itens para enviar ao banco
if (isset($_POST['register'])) {


  if ($result['success'] == 0) {
    //Adicionando o conteudo "Nome" a uma varialvel
    $c_name = $_POST['c_name'];

    //Adicionando o conteudo "Email" a uma varialvel
    $c_email = $_POST['c_email'];

    //Adicionando o conteudo "Senha" a uma varialvel
    $c_pass = $_POST['c_pass'];

    //Adicionando o conteudo "Pais" a uma varialvel
    $c_country = $_POST['c_country'];

    //Adicionando o conteudo "Cidade" a uma varialvel
    $c_city = $_POST['c_city'];

    //Adicionando o conteudo "Telefone" a uma varialvel
    $c_contact = $_POST['c_contact'];

    //Adicionando o conteudo "Endereço" a uma varialvel
    $c_address = $_POST['c_address'];

    //Pegando os dados da foto de perfil = arquivo e nome
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];

    //Pegando Ip do usuario


    //Fazendo a conexão do "link" do banco com a pasta que vai armazenas as imagens
    move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

    //verificando se email já existe
    $get_email = "select * from customers where customer_email='$c_email'";

    //Rodando SQL do Email
    $run_email = mysqli_query($con, $get_email);

    //Checando se existe registros
    $check_email = mysqli_num_rows($run_email);

    //Se o registro existe ele atualiza os dados
    if ($check_email == 1) {
      echo "<script>alert('This email is already registered, try another one')</script>";
      exit();
    };


    //Mail serve par enviar um email a um user "em fase de teste"
    mail($c_email, $subject, $message, $headers);

    //Comando insert dos dados do form ao banco
    $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip,customer_confirm_code) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip','$customer_confirm_code')";
   
    //Enviando os dados
    $run_customer = mysqli_query($con, $insert_customer);

    //Checando o banco
    $check_cart = mysqli_num_rows($run_customer);


    //Se der certo
    if ($check_cart == 1) {

      $_SESSION['customer_email'] = $c_email;
      echo "<script>alert('Cadastrado com Sucesso')</script>";
      echo "<script>window.open('checkout.php','_self')</script>";
    } else {

      $_SESSION['customer_email'] = $c_email;
      echo "<script>alert('Cadastrado com Sucesso')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
  //Se der errado
  else {
    echo "<script>alert('Erro ao cadastrar, tente novamente')</script>";
  }
}
