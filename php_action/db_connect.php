<?php
$servername = "localhost";
$username = "root";
$password = "daniel23";
$db_name = "pvd";

$connect = mysqli_connect($servername, $username, $password, $db_name);
mysqli_set_charset($connect, "utf8");