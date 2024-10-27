<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../recursos/css/bootstrap.min.css" rel="stylesheet">
    <title>Controle de Vendas - Site de Gás</title>
    <script src="../recursos/js/jquery-3.5.1.min.js"></script>
    <script src="../recursos/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<?php
include '../controladora/conexao.php';
include '../modelo/vendas.php';
include '../repositorio/vendas_repositorio.php';

$vendasRepositorio = new estoqueRepositorio($conn);
$vendas = $vendasRepositorio->buscarTodasVendas();

?>

<body>
<div class="container mt-5">


    <h2>Controle de Vendas</h2>


    <form action="../controladora/processar_vendas.php" method="POST" enctype="multipart/form-data">

    <label for="endereco" class="titulo-campo">Endereço:</label>
    <input type="text" id="endereco" name="endereco"  class="custom-input" required>

    <label for="produto" class="titulo-campo">Produto:</label>
    <input type="text" id="produto" name="produto" class="custom-input" required>

    <label for="quantidade" class="titulo-campo">Quantidade:</label>
    <input type="number" id="quantidade" name="quantidade" class="custom-input" required>

    <label for="preco" class="titulo-campo">Preço do Produto:</label>
    <input type="number" step="0.01" id="preco" name="preco" class="custom-input" required>

    <label for="formaPagamento" class="titulo-campo">Forma de Pagamento:</label>
    <input type="text" id="formaPagamento" name="formaPagamento"  class="custom-input" required>


    <input type="submit" name="cadastro" class="btn btn-primary" value="CADASTRAR">
</form>



    <table class="table mt-4" id="tabelaVendas">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Total</th>
                <th>Forma de Pagamento</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>

        </thead>
        <tbody>
            
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $id = $_POST["id"];
              $sql = "SELECT * FROM vendas WHERE id = $id";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                $venda = $result->fetch_assoc();
            ?>
                <form action="../controladora/processar_editar_estoque.php" method="POST" style="margin-top: 10px;">
                <input type="hidden" name="id" value="<?= $venda["id"] ?>">
                
                <td><input type="text" name="produto" value="<?= $venda["produto"] ?>" class="custom-input"></td>
                <td><input type="text" name="quantidade" value="<?= $venda["quantidade"] ?>" class="custom-input"></td>
                <td><input type="text" name="preco" value="<?= $venda["preco"] ?>" class="custom-input"></td>
                <td><input type="text" name="total" value="<?= $venda["total"] ?>" class="custom-input"></td> 
                <td><input type="text" name="formaPagamento" value="<?= $venda["formaPagamento"] ?>" class="custom-input"></td>
                <td><input type="text" name="endereco" value="<?= $venda["endereco"] ?>" class="custom-input"></td>
                <td>
                    <button type="submit" class="btn btn-primary btn-lg btn-block botao-salvar-edicoes">Salvar edições</button>
                    
                </form></td>
            <?php
              } else {
                echo "Produto não encontrado";
              }
            }
            $conn->close(); ?>
        </tr> 

</tbody>
    </table>
</div>
</body>
</html>

