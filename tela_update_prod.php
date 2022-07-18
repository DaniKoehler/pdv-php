<?php
    include_once 'php_action/db_connect.php';
    include_once 'includes/header.html';
    include_once 'includes/footer.html';
    include_once 'includes/style.php';
    include_once 'php_action/helper.php';

    if(isset($_GET['id'])) {
        $id = security($_GET['id']);
        $sql = "SELECT * FROM tbprodutos WHERE id = '$id'";
        $stmt = mysqli_query($connect, $sql);
        $dados = mysqli_fetch_array($stmt);
    }
?>
<div id="createprod" class="container col-5">
    <div class="row align-items-center">
        <p><h1>Alterar Produto</h1></p>
        <form action="php_action/update_prod.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" 
                    name="nome" id="nome" value="<?php echo $dados['nome']; ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Valor R$</span>
                    <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" 
                    name="valor" id="valor" value="<?php echo $dados['valor']; ?>">
                    <label class="input-group-text" for="inputGroupSelect01">Medida</label>
                    <select class="form-select" id="inputGroupSelect01" name="medida" id="medida" value="<?php echo $dados['medida']; ?>">
                        <option selected>-</option>
                        <option value="KG">KG</option>
                        <option value="UN">UN</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Cód Barras</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="codbarras" id="codbarras" 
                    value="<?php echo $dados['codBarras']; ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Valor Real R$</span>
                    <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="valorreal" id="valorreal" 
                    value="<?php echo $dados['valorReal']; ?>">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success btn-lg" type="submit" name="btn-alterar">Alterar Produto</button>
                    <a href="tela_lista_prod.php" type="button" class="btn btn-danger btn-lg">Cancelar</a>
                </div>
        </form>
    </div>
</div>