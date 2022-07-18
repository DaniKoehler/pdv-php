<?php
include_once 'db_connect.php';
include_once 'helper.php';

if(isset($_POST['btn-del-oper'])) {
    $id = security($_POST['id']);

    $sql = "DELETE FROM tbOperador WHERE id = '$id'";
    $stmt = mysqli_query($connect, $sql);

    if($stmt) {
        session_start();
        $_SESSION['message'] = "Operador excluído com sucesso!";
        header("Location: ../tela_lista_oper.php");
        die;
    } else {
        session_start();
        $_SESSION['message'] = "Erro: Operador não excluído!";
        header("Location: ../tela_lista_oper.php");
        die;
    }
}