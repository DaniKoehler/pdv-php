<?php
include_once 'db_connect.php';
include_once 'helper.php';

if(isset($_POST['btn-alterar'])) {
    $id = security($_POST['id']);
    $nome = security($_POST['nome']);
    $valor = security($_POST['valor']);
    $medida = security($_POST['medida']);
    $codbarras = security($_POST['codbarras']);
    $valorreal = security($_POST['valorreal']);

    $sql = "UPDATE tbprodutos SET nome = '$nome', valor = '$valor', medida = '$medida', codbarras = '$codbarras', valorreal = '$valorreal' WHERE id = '$id'";
    $stmt = mysqli_query($connect, $sql);

    if($stmt) {
        session_start();
        $_SESSION['message'] = "Produto alterado com sucesso!";
        header("Location: ../tela_lista_prod.php");
        die;
    } else {
        session_start();
        $_SESSION['message'] = "Erro: Produto não alterado!";
        header("Location: ../tela_lista_prod.php");
        die;
    }
}
