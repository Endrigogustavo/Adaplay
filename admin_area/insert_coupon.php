<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>
<div class="linha"><!-- Início da 1ª linha -->

<div class="coluna-lg-12"><!-- Início da coluna-lg-12 -->

    <ol class="trilha"><!-- Início da trilha -->

        <li class="ativa">

            <i class="fa fa-dashboard"> </i> Painel / Inserir Cupons

        </li>

    </ol><!-- Fim da trilha -->

</div><!-- Fim da coluna-lg-12 -->

</div><!-- Fim da 1ª linha -->

<div class="linha"><!-- Início da 2ª linha -->

<div class="coluna-lg-12"><!-- Início da coluna-lg-12 -->

    <div class="painel painel-padrao"><!-- Início do painel padrão -->

        <div class="cabecalho-painel"><!-- Início do cabeçalho do painel -->

            <h3 class="titulo-painel"><!-- Início do título do painel -->

                <i class="fa fa-money fa-fw"> </i> Inserir Cupons

            </h3><!-- Fim do título do painel -->

        </div><!-- Fim do cabeçalho do painel -->

        <div class="corpo-painel"><!-- Início do corpo do painel -->

            <form class="form-horizontal" method="post" action=""><!-- Início do formulário horizontal -->

                <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                    <label class="col-md-3 etiqueta-controle"> Título do Cupom </label>

                    <div class="col-md-6">

                        <input type="text" name="coupon_title" class="form-control">

                    </div>

                </div><!-- Fim do grupo de formulário -->

                <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                    <label class="col-md-3 etiqueta-controle"> Preço do Cupom </label>

                    <div class="col-md-6">

                        <input type="text" name="coupon_price" class="form-control">

                    </div>

                </div><!-- Fim do grupo de formulário -->

                <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                    <label class="col-md-3 etiqueta-controle"> Código do Cupom </label>

                    <div class="col-md-6">

                        <input type="text" name="coupon_code" class="form-control">

                    </div>

                </div><!-- Fim do grupo de formulário -->

                <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                    <label class="col-md-3 etiqueta-controle"> Limite do Cupom </label>

                    <div class="col-md-6">

                        <input type="number" name="coupon_limit" value="1" class="form-control">

                    </div>

                </div><!-- Fim do grupo de formulário -->

                <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                    <label class="col-md-3 etiqueta-controle"> Qual Produto Receberá o Cupom? </label>

                    <div class="col-md-6">

                        <select name="product_id" class="form-control">

                            <option> Selecione o Produto </option>

                            <!-- Código PHP omitido para brevidade -->

                        </select>

                    </div>

                </div><!-- Fim do grupo de formulário -->

                <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                    <label class="col-md-3 etiqueta-controle"> </label>

                    <div class="col-md-6">

                        <input type="submit" name="submit" class="btn btn-primary form-control" value=" Inserir Cupom ">

                    </div>

                </div><!-- Fim do grupo de formulário -->

            </form><!-- Fim do formulário horizontal -->

        </div><!-- Fim do corpo do painel -->

    </div><!-- Fim do painel padrão -->

</div><!-- Fim da coluna-lg-12 -->

</div><!-- Fim da 2ª linha -->
    <?php

    if (isset($_POST['submit'])) {

        $coupon_title = $_POST['coupon_title'];

        $coupon_price = $_POST['coupon_price'];

        $coupon_code = $_POST['coupon_code'];

        $coupon_limit = $_POST['coupon_limit'];

        $product_id = $_POST['product_id'];

        $coupon_used = 0;

        $get_coupons = "select * from coupons where product_id='$product_id' or coupon_code='$coupon_code'";

        $run_coupons = mysqli_query($con, $get_coupons);

        $check_coupons = mysqli_num_rows($run_coupons);

        if ($check_coupons == 1) {

            echo "<script>alert('Código de cupom ou produto já adicionado Escolha outro código de cupom ou produto.')</script>";
        } else {

            $insert_coupon = "insert into coupons (product_id,coupon_title,coupon_price,coupon_code,coupon_limit,coupon_used) values ('$product_id','$coupon_title','$coupon_price','$coupon_code','$coupon_limit','$coupon_used')";

            $run_coupon = mysqli_query($con, $insert_coupon);

            if ($run_coupon) {

                echo "<script>alert('Novo cupom foi inserido')</script>";

                echo "<script>window.open('index.php?view_coupons','_self')</script>";
            }
        }
    }

    ?>

<?php } ?>