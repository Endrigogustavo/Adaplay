<!DOCTYPE html>
<html lang="en">
<?php
include("conexao.php");
if(isset($_FILES) && count($_FILES) > 0 ){

}


//pegando arquivo
if (isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];

    if($arquivo['error'])
    die("falha ao enviar");
//tamanho do arquivo
    if ($arquivo['size'] > 3000000)
        die("Arquivo grande");

        //pasta que vai salvar
    $pasta = "arquivos/";
    //nome do arquivo
    $nomeDoArquivo = $arquivo['name'];
    //uniqid() musa para um nome aleatorio
    $novoNomeDoArquivo = uniqid();
    // pathinfo = caminho do arquivo    strtolower deixa tudo em minusculo
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    //tratamento da extensao
    if($extensao != "jpg" && $extensao != 'png' && $extensao != "jpeg")
    die("tipo de arquivo nao aceito");
    
    //atribuindo a extensao e o nome a varialvel path
    $path =  $pasta. $novoNomeDoArquivo . "." . $extensao;

    //movendo o arquivo 
    $deu_certo = move_uploaded_file($arquivo['tmp_name'],$path);

    if($deu_certo){
    $mysqli->query("INSERT INTO aquivos (nome, path) VALUES ('$nomeDoArquivo','$path')") or die ($mysqli->error);
    // mostrar arquivo echo("Arquivo enviado com sucesso: <a target=\"_blank\"  href=\"arquivos/$novoNomeDoArquivo.$extensao\">Clike aqui</a>");
    }
    else
    echo("falha ao enviar");

    //Mostrar dados do arquivo = var_dump($_FILES['arquivo']);
}

$sql_arquivos = $mysqli->query( "SELECT * FROM aquivos ") or die ($mysqli->error);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>

<body>

    <!--https://youtu.be/ae83c8Zpoxo?si=Z7kzAO-OY9EGOk9o-->
    <form action="" enctype="multipart/form-data" method="POST">
        <label for="">Envio de imagem</label>
        <br>
        <input multiple type="file" name="arquivo" id="">
        <br><br>
        <input type="submit" value="Enviar" name="upload">
    </form>
</body>

<!-- table>thead>th*2-->
<table>
    <thead>
        <th>Preview</th>
        <th>Arquivo</th>
        <th>dt_envio</th>
    </thead>
    <tbody>
    <?php
while($arquivo = $sql_arquivos-> fetch_assoc()){
    ?>
        <tr>
            <td><img src="<?php echo $arquivo['path'];?>" height="50px" alt=""></td>
            <td><a href="<?php echo $arquivo['path']; ?>" target="_blank" ><?php echo $arquivo['nome'];?></a></td>
            <td> <?php echo date("d/m/Y H:i", strtotime($arquivo['data_upload']));?></td>
        </tr>
        <?php
}
?>
    </tbody>
</table>

</html>