<?php
include_once 'db_connect.php';
include_once 'helper.php';

if(isset($_POST['btn-deletar'])) {
    $id = security($_POST['id']);

    $sql = "DELETE FROM tbprodutos WHERE id = '$id'";
    $stmt = mysqli_query($connect, $sql);
    
    if($stmt) {
        session_start();
        $_SESSION['message'] = "Produto excluído com sucesso!";
        header("Location: ../tela_lista_prod.php");
        die;
    } else {
        session_start();
        $_SESSION['message'] = "Erro: Produto não excluído!";
        header("Location: ../tela_lista_prod.php");
        die;
    }
}