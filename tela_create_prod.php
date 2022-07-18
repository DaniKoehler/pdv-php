<?php
    include_once 'includes/header.html';
    include_once 'includes/footer.html';
    include_once 'includes/style.php';
?>
<div id="container" class="container col-5">
    <div class="row align-items-center">
        <p><h1>Cadastrar Produto</h1></p>
        <form action="php_action/create_prod.php" method="POST" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nome" id="nome">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Valor R$</span>
                <input type="number" step="0.010" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="valor" id="valor">
                <label class="input-group-text" for="inputGroupSelect01">Medida</label>
                <select class="form-select" id="inputGroupSelect01" name="medida" id="medida">
                    <option selected>-</option>
                    <option value="KG">KG</option>
                    <option value="UN">UN</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Cód Barras</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="codbarras" id="codbarras">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Valor Real R$</span>
                <input type="number" step="0.010" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="valorreal" id="valorreal">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Imagem do Produto</span>
                <input type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="imgprod" id="imgprod">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-success btn-lg" type="submit" name="btn-cadastrar">Cadastrar</button>
                <a href="index.php" type="button" class="btn btn-danger btn-lg">Cancelar</a>
            </div>
        </form>
    </div>
</div>