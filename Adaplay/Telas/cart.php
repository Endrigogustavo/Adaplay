<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>


<!-- MAIN -->
<main>
  <!-- HERO -->
  <div class="nero">
    <div class="nero__heading">
      <span class="nero__bold">CARRINHO</span> de Compras
    </div>
    <p class="nero__text">
    </p>
  </div>
</main>



<div id="content"><!-- content Starts -->
  <div class="container"><!-- container Starts -->



    <div class="col-md-9" id="cart"><!-- col-md-9 Starts -->

      <div class="box"><!-- box Starts -->

        <form action="cart.php" method="post" enctype="multipart-form-data"><!-- form Starts -->

          <h1> Carrinho de Compras </h1>

          <?php

          $ip_add = getRealUserIp();

          $Select_Carrinho = "select * from cart where ip_add='$ip_add'";

          $Run_Carrinho = mysqli_query($con, $Select_Carrinho);

          $Count = mysqli_num_rows($Run_Carrinho);

          ?>

          <p class="text-muted"> Você contém atualmente <?php echo $Count; ?> item(s) em seu carrinho. </p>

          <div class="table-responsive"><!-- table-responsive Starts -->

            <table class="table"><!-- table Starts -->

              <thead><!-- thead Starts -->

                <tr>

                  <th colspan="2">Produto</th>

                  <th>Quantidade</th>

                  <th>Preço Unitário</th>

                  <th>Tamanho</th>

                  <th colspan="1">Deletar</th>

                  <th colspan="2"> Sub Total </th>


                </tr>

              </thead><!-- thead Ends -->

              <tbody><!-- tbody Starts -->

                <?php

                $Total = 0;

                while ($Coluna_Carrinho = mysqli_fetch_array($Run_Carrinho)) {

                  $Id_Produto = $Coluna_Carrinho['p_id'];

                  $pro_size = $Coluna_Carrinho['size'];

                  $Quantidade_Produto = $Coluna_Carrinho['qty'];

                  $Preco_Unico = $Coluna_Carrinho['p_price'];

                  $Get_Produto = "select * from products where product_id='$Id_Produto'";

                  $Run_Produto = mysqli_query($con, $Get_Produto);

                  while ($row_products = mysqli_fetch_array($Run_Produto)) {

                    $Titulo_Produto = $row_products['product_title'];

                    $Produto_image1 = $row_products['product_img1'];

                    $Sub_Total = $Preco_Unico * $Quantidade_Produto;

                    $_SESSION['Quantidade_Produto'] = $Quantidade_Produto;

                    $Total += $Sub_Total;
                ?>

                    <tr><!-- tr Starts -->

                      <td>

                        <img src="admin_area/product_images/<?php echo $Produto_image1; ?>">

                      </td>

                      <td>

                        <a href="#"> <?php echo $Titulo_Produto; ?> </a>

                      </td>

                      <td>
                        <input type="text" name="quantity" value="<?php echo $_SESSION['Quantidade_Produto']; ?>" data-product_id="<?php echo $Id_Produto; ?>" class="quantity form-control">
                      </td>

                      <td>

                        $<?php echo $Preco_Unico; ?>.00

                      </td>

                      <td>

                        <?php echo $pro_size; ?>

                      </td>

                      <td>
                        <input type="checkbox" name="remove[]" value="<?php echo $Id_Produto; ?>">
                      </td>

                      <td>

                        $<?php echo $Sub_Total; ?>.00

                      </td>

                    </tr><!-- tr Ends -->

                <?php }
                } ?>

              </tbody><!-- tbody Ends -->

              <tfoot><!-- tfoot Starts -->

                <tr>

                  <th colspan="5"> Total </th>

                  <th colspan="2"> $<?php echo $Total; ?>.00 </th>

                </tr>

              </tfoot><!-- tfoot Ends -->

            </table><!-- table Ends -->

            <div class="form-inline pull-right"><!-- form-inline pull-right Starts -->

              <div class="form-group"><!-- form-group Starts -->

                <label>Código de Cupom : </label>

                <input type="text" name="Codigo" class="form-control">

              </div><!-- form-group Ends -->

              <input class="btn btn-primary" type="submit" name="Cupom_Aplicar" value="Aplicar Cupom">

            </div><!-- form-inline pull-right Ends -->

          </div><!-- table-responsive Ends -->


          <div class="box-footer"><!-- box-footer Starts -->

            <div class="pull-left"><!-- pull-left Starts -->

              <a href="index.php" class="btn btn-default">

                <i class="fa fa-chevron-left"></i> Continuar Comprando

              </a>

            </div><!-- pull-left Ends -->

            <div class="pull-right"><!-- pull-right Starts -->

              <button class="btn btn-info" type="submit" name="update">

                <i class="fa fa-refresh"></i> Atualizar Carrinho

              </button>

              <?php
              // Verifica se a quantidade de algum produto no carrinho é igual a zero.
              $Quantidade_zero = false;
              $get_cart = "select * from cart where ip_add='$ip_add'";
              $run_cart = mysqli_query($con, $get_cart);

              while ($row_cart = mysqli_fetch_array($run_cart)) {
                $Quantidade_Produto = $row_cart['qty'];
                if ($Quantidade_Produto == 0) {
                  $Quantidade_zero = true;
                  break;
                }
              }

              if (!$Quantidade_zero) {
                // Se nenhum produto tiver quantidade igual a zero, exibe o botão de checkout.
                echo '<a href="checkout.php" class="btn btn-success">
                Efetuar Check-Out <i class="fa fa-chevron-right"></i>
              </a>';
              } else {
                // Se houver algum produto com quantidade igual a zero, desabilite o botão de checkout e exiba a mensagem de erro.
                echo '<button class="btn btn-success" disabled>
                Efetuar Check-Out <i class="fa fa-chevron-right"></i>
              </button>
              <script>alert("Selecione uma quantidade válida para todos os produtos antes de prosseguir com o Checkout.")</script>';
              }
              ?>

            </div><!-- pull-right Ends -->

          </div><!-- box-footer Ends -->

        </form><!-- form Ends -->


      </div><!-- box Ends -->

      <?php

      if (isset($_POST['Cupom_Aplicar'])) {

        $Codigo = $_POST['Codigo'];

        if ($Codigo == "") {
        } else {

          $Get_Cupom = "select * from coupons where coupon_code='$Codigo'";

          $Run_Cupom = mysqli_query($con, $Get_Cupom);

          $Checar_Cupom = mysqli_num_rows($Run_Cupom);

          if ($Checar_Cupom == 1) {

            $Coluna_Cupons = mysqli_fetch_array($Run_Cupom);

            $Produto_Cupom = $Coluna_Cupons['product_id'];

            $Valor_Cupom = $Coluna_Cupons['coupon_price'];

            $Limite_Cupom = $Coluna_Cupons['coupon_limit'];

            $Cupom_Utilizado = $Coluna_Cupons['coupon_used'];


            if ($Limite_Cupom == $Cupom_Utilizado) {

              echo "<script>alert('Infelizmente seu código de cupom expirou.')</script>";
            } else {

              $get_cart = "select * from cart where p_id='$Produto_Cupom' AND ip_add='$ip_add'";


              $Run_Carrinho = mysqli_query($con, $get_cart);

              $check_cart = mysqli_num_rows($Run_Carrinho);


              if ($check_cart == 1) {

                $add_used = "update coupons set coupon_used=coupon_used+1 where coupon_code='$Codigo'";

                $run_used = mysqli_query($con, $add_used);

                $Valor_Cupom = min($Valor_Cupom, $Preco_Unico);

                // Aplica o desconto proporcional à quantidade de produtos no carrinho
                $Desconto_por_produto = $Valor_Cupom / $Quantidade_Produto;
                $Preco_Unico = $Preco_Unico - $Desconto_por_produto;

                $update_cart = "UPDATE cart SET p_price = '$Preco_Unico' WHERE p_id='$Produto_Cupom' AND ip_add='$ip_add'";
                $run_update = mysqli_query($con, $update_cart);

                echo "<script>alert('Seu cupom foi aplicado com sucesso.')</script>";

                echo "<script>window.open('cart.php','_self')</script>";
              } else {

                echo "<script>alert('Não encontramos o respectivo cupom para este produto.')</script>";
              }
            }
          } else {

            echo "<script> alert('Seu cupom está inválido ou foi digitado incorretamente.') </script>";
          }
        }
      }


      ?>

      <?php

      function update_cart()
      {

        global $con;

        if (isset($_POST['update'])) {

          foreach ($_POST['remove'] as $remove_id) {


            $delete_product = "delete from cart where p_id='$remove_id'";

            $run_delete = mysqli_query($con, $delete_product);

            if ($run_delete) {
              echo "<script>window.open('cart.php','_self')</script>";
            }
          }
        }
      }

      echo @$up_cart = update_cart();



      ?>



      <div id="row same-height-row"><!-- row same-height-row Starts -->

        <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->

          <div class="box same-height headline"><!-- box same-height headline Starts -->

            <h3 class="text-center"> Você pode gostar destes produtos </h3>

          </div><!-- box same-height headline Ends -->

        </div><!-- col-md-3 col-sm-6 Ends -->

        <?php

        $Get_Produto = "select * from products order by rand() LIMIT 0,3";

        $Run_Produto = mysqli_query($con, $Get_Produto);

        while ($row_products = mysqli_fetch_array($Run_Produto)) {

          $Id_Produto = $row_products['product_id'];

          $Titulo_Produto = $row_products['product_title'];

          $Preco_Produto = $row_products['product_price'];

          $Produto_image1 = $row_products['product_img1'];

          $Produto_Rotulo = $row_products['product_label'];

          $Id_Fabricante = $row_products['manufacturer_id'];

          $get_manufacturer = "select * from manufacturers where manufacturer_id='$Id_Fabricante'";

          $run_manufacturer = mysqli_query($db, $get_manufacturer);

          $row_manufacturer = mysqli_fetch_array($run_manufacturer);

          $Nome_Fabricante = $row_manufacturer['manufacturer_title'];

          $pro_psp_price = $row_products['product_psp_price'];

          $pro_url = $row_products['product_url'];


          if ($Produto_Rotulo == "Sale" or $Produto_Rotulo == "Gift") {

            $product_price = "<del> $$Preco_Produto </del>";

            $product_psp_price = "| $$pro_psp_price";
          } else {

            $product_psp_price = "";

            $product_price = "$$Preco_Produto";
          }


          if ($Produto_Rotulo == "") {
          } else {

            $product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>$Produto_Rotulo</div>

<div class='label-background'> </div>

</a>

";
          }


          echo "

<div class='col-md-3 col-sm-6 center-responsive' >

<div class='product' >

<a href='$pro_url' >

<img src='admin_area/product_images/$Produto_image1' class='img-responsive' >

</a>

<div class='text' >

<center>

<p class='btn btn-warning'> $Nome_Fabricante </p>

</center>

<hr>

<h3><a href='$pro_url' >$Titulo_Produto</a></h3>

<p class='price' > $product_price $product_psp_price </p>

<p class='buttons' >

<a href='$pro_url' class='btn btn-default' >View Details</a>

<a href='$pro_url' class='btn btn-danger'>

<i class='fa fa-shopping-cart'></i> Add To Cart

</a>


</p>

</div>

$product_label


</div>

</div>

";
        }




        ?>


      </div><!-- row same-height-row Ends -->


    </div><!-- col-md-9 Ends -->

    <div class="col-md-3"><!-- col-md-3 Starts -->

      <div class="box" id="order-summary"><!-- box Starts -->

        <div class="box-header"><!-- box-header Starts -->

          <h3>
            Resumo do Pedido</h3>

        </div><!-- box-header Ends -->

        <p class="text-muted">
          Os custos de envio e adicionais são calculados com base nos valores que você inseriu.
        </p>

        <div class="table-responsive"><!-- table-responsive Starts -->

          <table class="table"><!-- table Starts -->

            <tbody><!-- tbody Starts -->

              <tr>

                <td> Subtotal do Pedido </td>

                <th> $<?php echo $Total; ?>.00 </th>

              </tr>

              <tr>

                <td> Envio e manipulação </td>

                <th>$0.00</th>

              </tr>

              <tr>

                <td>Taxa</td>

                <th>$0.00</th>

              </tr>

              <tr class="total">

                <td>Total</td>

                <th>$<?php echo $Total; ?>.00</th>

              </tr>

            </tbody><!-- tbody Ends -->

          </table><!-- table Ends -->

        </div><!-- table-responsive Ends -->

      </div><!-- box Ends -->

    </div><!-- col-md-3 Ends -->

  </div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

<script>
  $(document).ready(function(data) {

    $(document).on('keyup', '.quantity', function() {

      var id = $(this).data("product_id");

      var quantity = $(this).val();

      if (quantity != '') {

        $.ajax({

          url: "change.php",

          method: "POST",

          data: {
            id: id,
            quantity: quantity
          },

          success: function(data) {

            $("body").load('cart.php');

          }




        });


      }




    });




  });
</script>

</body>

</html>