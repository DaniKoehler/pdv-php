<?php
include_once 'php_action/db_connect.php';
include_once 'includes/header.html';
include_once 'includes/footer.html';
include_once 'includes/style.php';
include_once 'php_action/helper.php';
include_once 'includes/message.php';
?>
<div id="navbar">
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand">NOME DA EMPRESA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Painel de Controle</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a type="button" class="nav-link" href="tela_create_prod.php">Cadastrar Produto</a>
            </li>
            <li class="nav-item">
              <a type="button" class="nav-link" href="tela_lista_prod.php">Listar Produtos</a>
            </li>
            <li class="nav-item">
              <a type="button" class="nav-link" href="tela_create_oper.php">Cadastrar Operador</a>
            </li>
            <li class="nav-item">
              <a type="button" class="nav-link" href="tela_lista_oper.php">Listar Operadores</a>
            </li>
          </div>
        </div>
      </div>
  </nav>
</div>
<p>
  <div class="container">
    <div class="row">
      <div class="col-8 align-self-start">
        <div class="codbar">
            <div class="input-group flex-nowrap">
              <span class="input-group-text" id="addon-wrapping"><b>Código de Barras</b></span>
              <input id="barcode" type="text" class="form-control" placeholder="Inserir item" aria-label="Username" 
              aria-describedby="addon-wrapping" id="codbarras" name="codbarras">
              <button class="btn btn-primary" name="btn-inserir" onclick="connect(); valorTotal()">Inserir</button>
            </div>
        </div>
          <div id="tabelas">
            <table id="table" class="table">
              <thead>
                <th style="text-align: center;">#</th>
                <th style="text-align: center;">Cód Barras</th>
                <th style="text-align: center;">Produto</th>
                <th style="text-align: center;">Valor</th>
                <th style="text-align: center;">Quantidade</th>
                <th style="text-align: center;"></th>
                <th style="text-align: center;">Medida</th>
              </thead>
            </table>
          </div>
      </div>
      <div class="col-4">
        <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default"><b>Total da Compra R$</b></span>
          <span id="total" class="input-group-text" id="inputGroup-sizing-default">0,00</span>
        </div>
        <div class="d-grid gap-2 d-md-flex">
          <button type="submit" name="btn-finalizar" id="btn-finalizar" class="btn btn-success">Finalizar</button>
        </div>
      </div>
    </div>
  </div>
</p>