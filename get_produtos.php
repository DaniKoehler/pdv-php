<?php
header('Content-type: application/json');
include_once 'php_action/db_connect.php';

    if(isset($_GET['barcode'])) {
        $sql = "SELECT * FROM tbprodutos WHERE codbarras = '".$_GET['barcode']."'";
    } else {
        $sql = "SELECT * FROM tbprodutos";
    }
        $stmt = mysqli_query($connect, $sql);
        
        echo json_encode(mysqli_fetch_all($stmt, MYSQLI_ASSOC));
?>
