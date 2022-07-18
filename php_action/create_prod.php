<?php
include_once 'db_connect.php';
include_once 'helper.php';

if(isset($_POST['btn-cadastrar'])) {
    $nome = security($_POST['nome']);
    $valor = security($_POST['valor']);
    $medida = security($_POST['medida']);
    $codbarras = security($_POST['codbarras']);
    $valorreal = security($_POST['valorreal']);

    $imgprod = $_FILES['imgprod']; // Recebe o arquivo
    $extensao = pathinfo($imgprod['name'], PATHINFO_EXTENSION); // Pega a extensão do arquivo
    $nome_imagem = md5(uniqid($imgprod['name'])) . "." . $extensao; // Gera um nome único para o arquivo
    $diretorio = 'img/'; // Diretório para onde enviaremos o arquivo
    $imgproduto = $diretorio.$nome_imagem; // Monta o caminho do arquivo
    move_uploaded_file($_FILES['imgprod']['tmp_name'], $imgproduto); // Faz o upload da imagem
    
    $sql = "INSERT INTO tbprodutos (nome, valor, medida, codbarras, valorreal, imgprod, data) VALUES ('$nome', '$valor', '$medida', '$codbarras', '$valorreal', '$imgprod', NOW())";
    $stmt = mysqli_query($connect, $sql);

    if($stmt) {
        session_start();
        $_SESSION['message'] = "Produto Cadastrado";
        header("Location: ../tela_lista_prod.php");
        die;
    } else {
        session_start();
        $_SESSION['message'] = "Erro: Produto não Cadastrado";
        header("Location: ../tela_create_prod.php");
        die;
    }
}
