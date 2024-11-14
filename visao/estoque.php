<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../recursos/css/bootstrap.min.css" rel="stylesheet">
    <title>Controle de Vendas - Site de Gás</title>
    <link rel="stylesheet" href="recursos/css/estoque.css">
    <script src="../recursos/js/jquery-3.5.1.min.js"></script>
    <script src="../recursos/js/script.js"></script>
    <link rel="stylesheet" href="recursos/css/estoque.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<?php
include '../controladora/conexao.php';
include '../modelo/vendas.php';
include '../repositorio/vendas_repositorio.php';
include "../controladora/autenticacao.php";

$vendasRepositorio = new estoqueRepositorio($conn);
$vendas = $vendasRepositorio->buscarTodasVendas();
$totalVendas = $vendasRepositorio->somarTotais();
?>

<body>
<div class="container mt-5">
    <h2 class="mb-4">Controle de Estoque</h2>
    <form action="../controladora/processar_vendas.php" method="POST" enctype="multipart/form-data" class="mb-5">
        <div class="form-group">
            <label for="total_produtos">Estoque:</label>
            <input type="text" id="total_produtos" name="total_produtos" class="form-control">
        </div>
        <button type="submit" name="cadastro" class="btn btn-dark mt-2">Enviar</button>
    </form>

    <h2>Controle de Vendas</h2>
    <form action="../controladora/processar_vendas.php" method="POST" enctype="multipart/form-data" class="mb-4">
        <div class="form-group">
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" class="form-control" required maxlength="9" placeholder="00000-000">
        </div>

        <input type="hidden" id="rua" name="rua" value="<?= isset($estoque) ? $estoque->getRua() : ''; ?>">
        <input type="hidden" id="bairro" name="bairro" value="<?= isset($estoque) ? $estoque->getBairro() : ''; ?>">
        <input type="hidden" id="cidade" name="cidade" value="<?= isset($estoque) ? $estoque->getCidade() : ''; ?>">

        <div class="form-group">
            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="produto">Produto:</label>
            <select id="produto" name="produto" class="form-control" required>
                <option value="Gás">Gás</option>
                <option value="Agua">Água</option>
            </select>
        </div>

        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="preco">Preço do Produto:</label>
            <select id="preco" name="preco" class="form-control" required>
                <option value="10.00">Água - R$ 9,99</option>
                <option value="85.00">Gás Nacional 13kg - R$ 84,99</option>
                <option value="95.00">Gás Liquigas 13kg - R$ 94,99</option>
                <option value="220.00">Gás 20kg - R$ 219,99</option>
                <option value="420.00">Gás 45kg - R$ 419,99</option>
            </select>
        </div>

        <div class="form-group">
            <label for="formaPagamento">Forma de Pagamento:</label>
            <select id="formaPagamento" name="formaPagamento" class="form-control" required>
                <option value="Dinheiro">Dinheiro</option>
                <option value="Cartão de Crédito">Cartão de Crédito</option>
                <option value="Cartão de Débito">Cartão de Débito</option>
                <option value="PIX">PIX</option>
            </select>
        </div>

        <button type="submit" name="cadastro" class="btn btn-primary mt-2">Cadastrar</button>
    </form>

    <table class="table table-striped mt-4" id="tabelaVendas">
        <thead class="thead-dark">
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
                <td>
                    <strong>Rua:</strong> <?= $venda->getRua() ?><br>
                    <strong>Número:</strong> <?= $venda->getNumero() ?><br>
                    <strong>Bairro:</strong> <?= $venda->getBairro() ?><br>
                    <strong>Cidade:</strong> <?= $venda->getCidade() ?>
                </td>
                <td>
                    <form action="../controladora/processar_exclusao.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="<?= $venda->getId(); ?>">
                        <input type="hidden" name="tipo" value="vendas">
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                    <form action="../visao/editar_estoque.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="<?= $venda->getId(); ?>">
                        <button type="submit" class="btn btn-success btn-sm">Editar</button>
                    </form>
                </td>
            </tr> 
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="alert alert-info mt-4">
        <?php echo "Lucro de: R$ " . number_format($totalVendas, 2, ',', '.'); ?>
    </div>
</div>

</body>
</html>
