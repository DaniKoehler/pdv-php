<?php
include_once 'php_action/db_connect.php';
include_once 'includes/header.html';
include_once 'includes/footer.html';
include_once 'includes/style.php';
include_once 'includes/message.php';
?>
<div id="container" class="container">
    <p><h1>Lista de Operadores</h1></p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Operador</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM tbOperador";
                $stmt = mysqli_query($connect, $sql);

                if(mysqli_num_rows($stmt) > 0) {
                    while($dados = mysqli_fetch_array($stmt)) {
            ?>
            <tr>
                <th id="id"><?php echo $dados['id']; ?></th>
                <td id="nome"><?php echo $dados['nome']; ?></td>
                <td><a href="tela_update_oper.php?id=<?php echo $dados['id']; ?>" type="button" class="btn btn-info btn-sm">Editar</a></td>
                <td><a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal<?php echo $dados['id']; ?>">Excluir</a></td>
                <div class="modal fade" id="modal<?php echo $dados['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Excluir Operador</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Clique em excluir para apagar o operador.
                            </div>
                            <div class="modal-footer">
                                <form action="php_action/delete_oper.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger" name="btn-del-oper">Excluir</button>
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
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a type="button" class="btn btn-primary btn-lg" href="tela_create_oper.php">Cadastrar Operador</a>
        <a href="index.php" type="button" class="btn btn-primary btn-lg">Voltar</a>
    </div>
</div>