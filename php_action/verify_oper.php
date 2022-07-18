<?php
require_once 'db_connect.php';
require_once 'helper.php';

if(isset($_POST['btnRemove'])) {
        $senha = security($_POST['senha']);

        $senha = md5($senha);
        $sql = "SELECT senha FROM tbOperador WHERE senha = '$senha'";
        $stmt = mysqli_query($connect, $sql);

        if(mysqli_num_rows($stmt) == 1) {
            session_start();
            $_SESSION['message'] = "Acesso de operador aprovado!";
            $_SESSION['usuario'] = mysqli_fetch_row($stmt);
            die;
        } else {
            session_start();
            $_SESSION['message'] = "Acesso de operador negado!";
            die;
        }
    }