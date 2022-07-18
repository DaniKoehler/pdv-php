<?php
include_once 'db_connect.php';
include_once 'helper.php';

if(isset ($_POST['btn-cad-oper'])) {
    $nome = security($_POST['nome']);
    $senha = security($_POST['senha']);
    
    $senha = md5($senha);
    
    $sql = "INSERT INTO tbOperador (nome, senha) VALUES ('$nome', '$senha')";
    $stmt = mysqli_query($connect, $sql);
    
    if($stmt) {
        session_start();
        $_SESSION['message'] = "Operador cadastrado com sucesso!";
        header("Location: ../tela_lista_oper.php");
        die;
    } else {
        session_start();
        $_SESSION['message'] = "Erro: Operador não cadastrado!";
        header("Location: ../tela_create_oper.php");
        die;
    }
}