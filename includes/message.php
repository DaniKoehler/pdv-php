<?php
// SESSAO QUE SERA UTILIZADA PARA MOSTRAR MENSAGENS
session_start();
if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
