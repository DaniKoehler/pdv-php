<?php
include_once 'db_connect.php';
include_once 'helper.php';

if(isset($_POST['btn-alt-oper'])) {
    $id = security($_POST['id']);
    $nome = security($_POST['nome']);
    $senha = security($_POST['senha']);
    
    $senha = md5($senha);
    
    $sql = "UPDATE tbOperador SET nome = '$nome', senha = '$senha' WHERE id = '$id'";
    $stmt = mysqli_query($connect, $sql);
    
    if($stmt) {
        session_start();
        $_SESSION['message'] = "Operador alterado com sucesso!";
        header("Location: ../tela_lista_oper.php");
        die;
    } else {
        session_start();
        $_SESSION['message'] = "Erro: Operador não alterado!";
        header("Location: ../tela_lista_oper.php");
        die;
    }
}
