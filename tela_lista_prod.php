<?php
include_once 'php_action/db_connect.php';
include_once 'includes/header.html';
include_once 'includes/footer.html';
include_once 'includes/style.php';
include_once 'includes/message.php';
?>
<div id="container" class="container">
    <p><h1>Lista de Produtos</h1></p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imagem</th>
                <th scope="col">Produto</th>
                <th scope="col">Valor R$</th>
                <th scope="col">Medida</th>
                <th scope="col">Cód Barras</th>
                <th scope="col">Valor Real R$</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM tbprodutos";
                $stmt = mysqli_query($connect, $sql);

                if(mysqli_num_rows($stmt) > 0) {
                    while($dados = mysqli_fetch_array($stmt)) {
            ?>
            <tr>
                <th id="id"><?php echo $dados['id']; ?></th>
                <td id="imgprod"><img src="<?php echo $dados['imgProd']; ?>" ></td>
                <td id="nome"><?php echo $dados['nome']; ?></td>
                <td id="valor"><?php echo $dados['valor']; ?></td>
                <td id="medida"><?php echo $dados['medida']; ?></td>
                <td id="codbarras"><?php echo $dados['codBarras']; ?></td>
                <td id="valorreal"><?php echo $dados['valorReal']; ?></td>
                <td><a href="tela_update_prod.php?id=<?php echo $dados['id']; ?>" type="button" class="btn btn-info btn-sm">Editar</a></td>
                <td><a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal<?php echo $dados['id']; ?>">Excluir</a></td>
                <div class="modal fade" id="modal<?php echo $dados['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Excluir Produto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Clique em excluir para apagar o produto.
                            </div>
                            <div class="modal-footer">
                                <form action="php_action/delete_prod.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger" name="btn-deletar">Excluir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
            <?php
                    }
                } else {
            ?>
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a type="button" class="btn btn-primary btn-lg" href="tela_create_prod.php">Cadastrar Produto</a>
        <a href="index.php" type="button" class="btn btn-primary btn-lg">Voltar</a>
    </div>
</div>