<?php
    include_once 'includes/header.html';
    include_once 'includes/footer.html';
    include_once 'includes/style.php';
?>
<div id="container" class="container col-5">
    <div class="row align-items-center">
        <p><h1>Cadastrar Operador</h1></p>
        <form action="php_action/create_oper.php" method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nome" id="nome">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Senha</span>
                <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="senha" id="senha">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-success btn-lg" type="submit" name="btn-cad-oper">Cadastrar</button>
                <a href="index.php" type="button" class="btn btn-danger btn-lg">Cancelar</a>
            </div>
        </form>
    </div>
</div>