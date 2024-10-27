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
include "../controladora/autenticacao.php";

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
                <th>ID Venda</th>
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
    <?php foreach ($vendas as $venda) : ?>
        <tr> 
            <td><?= $venda->getId() ?></td>
            <td><?= $venda->getProduto() ?></td>
            <td><?= $venda->getQuantidade() ?></td>
            <td><?= $venda->getPreco() ?></td> 
            <td><?= $venda->getTotal() ?></td>
            <td><?= $venda->getFormaPagamento() ?></td>
            <td><?= $venda->getEndereco() ?></td>
            <td>
                <form action="../controladora/processar_exclusao.php" method="POST" style="margin-top: 10px;">
                    <input type="hidden" name="id" value="<?= $venda->getId(); ?>">
                    <input type="hidden" name="tipo" value="vendas">
                    <input type="submit" class="botao-excluir" value="Excluir" style="background-color: red; color: white; border: none; border-radius: 15px; padding: 6px 8px; font-weight: 500; font-family: Poppins, sans-serif; transition: background-color 0.3s;">
                </form>
                <form action="../visao/editar_estoque.php" method="POST" style="margin-bottom: 10px;">
                  <input type="hidden" name="id" value="<?= $venda->getId(); ?>">
                  <input type="submit" class="botao-editar" value="Editar" style="background-color: green; color: white; border: none; border-radius: 15px; padding: 6px 11px; font-weight: 500; font-family: Poppins, sans-serif;">
                </form>
            </td>
        </tr> 
    <?php endforeach; ?>
</tbody>
    </table>
</div>
</body>
</html>

