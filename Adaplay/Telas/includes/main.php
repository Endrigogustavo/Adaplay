<!--Funciona com base  de Variável, aqui só possuí o comando pra puxar, pois as variáveis estão em cada página devido a "Customer". -->

<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>

  <header>
    <div class="upper-nav">
      <div class="iconezinho">
        <a href="#" class="icone"><img src="images/adapt.png"></a>
      </div>

      <ul class="login">

        <li class="login__item">
          <?php
          if (!isset($_SESSION['customer_email'])) {
            echo '<a href="'.$register.'" class="login__link">Registrar</a>';
          } else {
            echo '<a href="'.$conta.'" class="login__link">Minha Conta</a>';
          }
          ?>
        </li>


        <li class="login__item">
          <?php
          if (!isset($_SESSION['customer_email'])) {
            echo '<a href="'.$checkout.'" class="login__link">Entrar</a>';
          } else {
            echo '<a href="'.$logout.'" class="login__link">Sair</a>';
          }
          ?>

        </li>
      </ul>


    </div>

    <nav>


      <div class="logozinha">
        <a href="<?php echo $index?>" class="logo"><img src="images/logo2.png" alt=""></a>
      </div>

      <ul class="navmenuzin">
        <li><a href="<?php echo $index?>">Home</a></li>
        <li><a href="#">Lançamentos</a></li>
        <li id="dropdownzinho"><a href="#">Minha Conta<i class='bx bx-chevron-down'></i></a>

          <ul>
            <li><?php
                if (!isset($_SESSION['customer_email'])) {
                  echo "<p>Seja Bem-Vindo :</p>";
                } else {
                  echo "<p>Seja Bem-Vindo : " . $_SESSION['customer_email'] . "</p>";
                }
                ?></li>
            <li><a href="<?php echo $conta?>">Configurações da Conta</a></li>
            <li><a href="<?php echo $favorites?>">Lista de Desejos</a></li>
          </ul>

        </li>

        <li><a href="<?php echo $products?>">Produtos</a></li>
        <li><a href="<?php echo $contato?>">Fale Conosco</a></li>
      </ul>

      <div class="nav-icon">

        <a href="#"><i class='bx bx-search'></i></a>



        <a href="<?php echo $favorites?>"><i class='bx bx-heart'></i></a>

        <div class="Carrinho">
          <a href="<?php echo $cart?>"><i class='bx bx-shopping-bag'></i> </a>
          <p><?php items(); ?></p>
        </div>

        <div class="bx bx-menu" id="menu-icon"></div>

      </div>
    </nav>



  </header>

  <script src="js/navbar.js"></script>