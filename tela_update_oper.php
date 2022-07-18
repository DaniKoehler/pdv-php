<?php
    include_once 'php_action/db_connect.php';
    include_once 'includes/header.html';
    include_once 'includes/footer.html';
    include_once 'includes/style.php';
    include_once 'php_action/helper.php';

    if(isset($_GET['id'])) {
        $id = security($_GET['id']);
        $sql = "SELECT * FROM tbOperador WHERE id = '$id'";
        $stmt = mysqli_query($connect, $sql);
        $dados = mysqli_fetch_array($stmt);
    }
?>
<div id="createprod" class="container col-5">
    <div class="row align-items-center">
        <p><h1>Alterar Operador</h1></p>
        <form action="php_action/update_oper.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" 
                    name="nome" id="nome" value="<?php echo $dados['nome']; ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Valor R$</span>
                    <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" 
                    name="senha" id="senha" value="<?php echo $dados['senha']; ?>">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success btn-lg" type="submit" name="btn-alt-oper">Alterar Operador</button>
                    <a href="tela_lista_oper.php" type="button" class="btn btn-danger btn-lg">Cancelar</a>
                </div>
        </form>
    </div>
</div>