<?php

if (!isset($_SESSION['admin_email'])) {

  echo "<script>window.open('login.php','_self')</script>";
} else {

?>

  <?php

  if (isset($_GET['edit_product'])) {

    $edit_id = $_GET['edit_product'];

    $get_p = "select * from products where product_id='$edit_id'";

    $run_edit = mysqli_query($con, $get_p);

    $row_edit = mysqli_fetch_array($run_edit);

    $p_id = $row_edit['product_id'];

    $p_title = $row_edit['product_title'];

    $p_cat = $row_edit['p_cat_id'];

    $cat = $row_edit['cat_id'];

    $m_id = $row_edit['manufacturer_id'];

    $p_image1 = $row_edit['product_img1'];

    $p_image2 = $row_edit['product_img2'];

    $p_image3 = $row_edit['product_img3'];

    $new_p_image1 = $row_edit['product_img1'];

    $new_p_image2 = $row_edit['product_img2'];

    $new_p_image3 = $row_edit['product_img3'];

    $p_price = $row_edit['product_price'];

    $p_desc = $row_edit['product_desc'];

    $p_keywords = $row_edit['product_keywords'];

    $psp_price = $row_edit['product_psp_price'];

    $p_label = $row_edit['product_label'];

    $p_url = $row_edit['product_url'];

    $p_features = $row_edit['product_features'];

    $p_video = $row_edit['product_video'];
  }

  $get_manufacturer = "select * from manufacturers where manufacturer_id='$m_id'";

  $run_manufacturer = mysqli_query($con, $get_manufacturer);

  $row_manfacturer = mysqli_fetch_array($run_manufacturer);

  $manufacturer_id = $row_manfacturer['manufacturer_id'];

  $manufacturer_title = $row_manfacturer['manufacturer_title'];


  $get_p_cat = "select * from product_categories where p_cat_id='$p_cat'";

  $run_p_cat = mysqli_query($con, $get_p_cat);

  $row_p_cat = mysqli_fetch_array($run_p_cat);

  $p_cat_title = $row_p_cat['p_cat_title'];

  $get_cat = "select * from categories where cat_id='$cat'";

  $run_cat = mysqli_query($con, $get_cat);

  $row_cat = mysqli_fetch_array($run_cat);

  $cat_title = $row_cat['cat_title'];

  ?>


  <!DOCTYPE html>

  <html>

  <head>

    <title> Editar Produtos </title>


    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
      tinymce.init({
        selector: '#product_desc,#product_features'
      });
    </script>

  </head>

  <body>

    <div class="row"><!-- linha começa -->

      <div class="col-lg-12"><!-- col-lg-12 Inicia -->

        <ol class="breadcrumb"><!-- col-lg-12 Inicia -->

          <li class="active">

            <i class="fa fa-dashboard"> </i> Dashboard / Editar Produtos

          </li>

        </ol><!-- breadcrumb Termina -->

      </div><!-- col-lg-12 Termina -->

    </div>
<!-- Fim da linha -->

<div class="linha"><!-- Início da 2ª linha -->

      <div class="coluna-lg-12"><!-- Início da coluna-lg-12 -->

        <div class="painel painel-padrao"><!-- Início do painel padrão -->

          <div class="cabecalho-painel"><!-- Início do cabeçalho do painel -->

            <h3 class="titulo-painel">

              <i class="fa fa-money fa-fw"></i> Editar Produtos

            </h3>

          </div><!-- Fim do cabeçalho do painel -->

          <div class="corpo-painel"><!-- Início do corpo do painel -->

            <form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- Início do formulário horizontal -->

              <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                <label class="col-md-3 etiqueta-controle"> Título do Produto </label>

                <div class="col-md-6">

                  <input type="text" name="product_title" class="form-control" required value="">

                </div>

              </div><!-- Fim do grupo de formulário -->


              <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                <label class="col-md-3 etiqueta-controle"> URL do Produto </label>

                <div class="col-md-6">

                  <input type="text" name="product_url" class="form-control" required value="">

                  <br>

                  <p style="font-size:15px; font-weight:bold;">

                    Exemplo de "URL" : carrinho-adapatado-azul

                  </p>

                </div>

              </div><!-- Fim do grupo de formulário -->

              <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                <label class="col-md-3 etiqueta-controle"> Selecione um Fabricante </label>

                <div class="col-md-6">

                  <select name="manufacturer" class="form-control">

                    <option value="">
                     
                    </option>

                    <!-- Código PHP omitido para brevidade -->

                  </select>

                </div>

              </div><!-- Fim do grupo de formulário -->

              <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                <label class="col-md-3 etiqueta-controle"> Categoria de Produto </label>

                <div class="col-md-6">

                  <select name="product_cat" class="form-control">

                    <option value=""> </option>

                    <!-- Código PHP omitido para brevidade -->

                  </select>

                </div>

              </div><!-- Fim do grupo de formulário -->

              <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                <label class="col-md-3 etiqueta-controle"> Categoria </label>

                <div class="col-md-6">

                  <select name="cat" class="form-control">

                    <option value=""> </option>

                    <!-- Código PHP omitido para brevidade -->

                  </select>

                </div>

              </div><!-- Fim do grupo de formulário -->

              <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                <label class="col-md-3 etiqueta-controle"> Primeira Imagem do Produto </label>

                <div class="col-md-6">

                  <input type="file" name="product_img1" class="form-control">
                  <br><img src="" width="70" height="70">

                </div>

              </div><!-- Fim do grupo de formulário -->

              <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                <label class="col-md-3 etiqueta-controle"> Segunda Imagem do Produto </label>

                <div class="col-md-6">

                  <input type="file" name="product_img2" class="form-control">
                  <br><img src="" width="70" height="70">

                </div>

              </div><!-- Fim do grupo de formulário -->

              <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                <label class="col-md-3 etiqueta-controle"> 3ª Imagem do Produto </label>

                <div class="col-md-6">

                  <input type="file" name="product_img3" class="form-control">
                  <br><img src="" width="70" height="70">

                </div>

              </div><!-- Fim do grupo de formulário -->

              <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                <label class="col-md-3 etiqueta-controle"> Preço do Produto </label>

                <div class="col-md-6">

                  <input type="text" name="product_price" class="form-control" required value="">

                </div>

              </div><!-- Fim do grupo de formulário -->

              <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                <label class="col-md-3 etiqueta-controle"> Preço Promocional do Produto </label>

                <div class="col-md-6">

                  <input type="text" name="psp_price" class="form-control" required value="">

                </div>

              </div><!-- Fim do grupo de formulário -->

              <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                <label class="col-md-3 etiqueta-controle"> Palavras-Chave do Produto </label>

                <div class="col-md-6">

                  <input type="text" name="product_keywords" class="form-control" required value="">

                </div>

              </div><!-- Fim do grupo de formulário -->

              <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                <label class="col-md-3 etiqueta-controle"> Guias de produtos </label>

                <div class="col-md-6">

                  <ul class="nav nav-tabs"><!-- Início das guias de navegação -->

                    <li class="ativa">

                      <a data-toggle="tab" href="#descricao"> Descrição do Produto </a>

                    </li>

                    <li>

                      <a data-toggle="tab" href="#caracteristicas"> Especificações do Produto </a>

                    </li>

                    <li>

                      <a data-toggle="tab" href="#video"> Sons e Vídeos </a>

                    </li>

                  </ul><!-- Fim das guias de navegação -->

                  <div class="conteudo-guia"><!-- Início do conteúdo da guia -->

                    <div id="descricao" class="tab-pane fade in ativa"><!-- Início da guia de descrição -->

                      <br>

                      <textarea name="product_desc" class="form-control" rows="15" id="product_desc">

                      </textarea>

                    </div><!-- Fim da guia de descrição -->


                    <div id="caracteristicas" class="tab-pane fade in"><!-- Início da guia de características -->

                      <br>

                      <textarea name="product_features" class="form-control" rows="15" id="product_features">

                      </textarea>

                    </div><!-- Fim da guia de características -->


                    <div id="video" class="tab-pane fade in"><!-- Início da guia de vídeo -->

                      <br>

                      <textarea name="product_video" class="form-control" rows="15">

                      </textarea>

                    </div><!-- Fim da guia de vídeo -->


                  </div><!-- Fim do conteúdo da guia -->

                </div>

              </div><!-- Fim do grupo de formulário -->

              <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                <label class="col-md-3 etiqueta-controle"> Rótulo do Produto </label>

                <div class="col-md-6">

                  <input type="text" name="product_label" class="form-control" required value="">

                </div>

              </div><!-- Fim do grupo de formulário -->

              <div class="grupo-formulario"><!-- Início do grupo de formulário -->

                <label class="col-md-3 etiqueta-controle"></label>

                <div class="col-md-6">

                  <input type="submit" name="update" value="Atualizar Produto" class="btn btn-primary form-control">

                </div>

              </div><!-- Fim do grupo de formulário -->

            </form><!-- Fim do formulário horizontal -->

          </div><!-- Fim do corpo do painel -->

        </div><!-- Fim do painel padrão -->

      </div><!-- Fim da coluna-lg-12 -->

    </div><!-- Fim da 2ª linha -->
  </body>

  </html>

  <?php

  if (isset($_POST['update'])) {

    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $manufacturer_id = $_POST['manufacturer'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];

    $psp_price = $_POST['psp_price'];

    $product_label = $_POST['product_label'];

    $product_url = $_POST['product_url'];

    $product_features = $_POST['product_features'];

    $product_video = $_POST['product_video'];

    $status = "product";

    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];

    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];

    if (empty($product_img1)) {

      $product_img1 = $new_p_image1;
    }


    if (empty($product_img2)) {

      $product_img2 = $new_p_image2;
    }

    if (empty($product_img3)) {

      $product_img3 = $new_p_image3;
    }


    move_uploaded_file($temp_name1, "product_images/$product_img1");
    move_uploaded_file($temp_name2, "product_images/$product_img2");
    move_uploaded_file($temp_name3, "product_images/$product_img3");

    $update_product = "update products set p_cat_id='$product_cat',cat_id='$cat',manufacturer_id='$manufacturer_id',date=NOW(),product_title='$product_title',product_url='$product_url',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',product_psp_price='$psp_price',product_desc='$product_desc',product_features='$product_features',product_video='$product_video',product_keywords='$product_keywords',product_label='$product_label',status='$status' where product_id='$p_id'";

    $run_product = mysqli_query($con, $update_product);

    if ($run_product) {

      echo "<script> alert('O produto foi atualizado com sucesso') </script>";

      echo "<script>window.open('index.php?view_products','_self')</script>";
    }
  }

  ?>

<?php } ?>