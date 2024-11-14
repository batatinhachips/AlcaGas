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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="recursos/css/estoque.css">
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
<form action="../controladora/processar_vendas.php" method="POST" enctype="multipart/form-data">
        <label for="total_produtos" class="titulo-campo">Estoque:</label>
        <input type="text" id="total_produtos" name="total_produtos" class="custom-input">
        <input type="submit" name="cadastro" class="btn btn-dark" value="enviar">
    </form>
</div>


<div class="container mt-5">
    <h2>Controle de Vendas</h2>

    <form action="../controladora/processar_vendas.php" method="POST" enctype="multipart/form-data">
        <label for="cep" class="titulo-campo">CEP:</label>
        <input type="text" id="cep" name="cep" class="custom-input" required maxlength="9" placeholder="00000-000">

        <label for="rua"></label>
        <input type="hidden" id="rua" name="rua" class="custom-input" value="<?= isset($estoque) ? $estoque->getRua() : ''; ?>" readonly>

        <label for="numero" class="titulo-campo">Número:</label>
        <input type="text" id="numero" name="numero" class="custom-input" required>

        <label for="bairro"></label>
        <input type="hidden" id="bairro" name="bairro" class="custom-input" value="<?= isset($estoque) ? $estoque->getBairro() : ''; ?>" readonly>
        
        <label for="cidade"></label>
        <input type="hidden" id="cidade" name="cidade" class="custom-input" value="<?= isset($estoque) ? $estoque->getCidade() : ''; ?>" readonly>

        <label for="produto" class="titulo-campo">Produto:</label>
        <select id="produto" name="produto" class="custom-input" required>
            <option value="Gás">Gás</option>
            <option value="Agua">Agua</option>
        </select>

        <label for="quantidade" class="titulo-campo">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" class="custom-input" required>

        <label for="preco" class="titulo-campo">Preço do Produto:</label>
        <select id="preco" name="preco" class="custom-input" required>
        <option value="10.00">Agua - R$ 9,99</option>
            <option value="85.00">Gás Nacional 13kg - R$ 84,99</option>
            <option value="95.00">Gás Liquigas 13kg - R$ 94,99</option>
            <option value="220.00">Gás 20kg - R$ 219,99</option>
            <option value="420.00">Gás 45kg - R$ 419,99</option>
        </select>

        <label for="formaPagamento" class="titulo-campo">Forma de Pagamento:</label>
        <select id="formaPagamento" name="formaPagamento" class="custom-input" required>
            <option value="Dinheiro">Dinheiro</option>
            <option value="Cartão de Crédito">Cartão de Crédito</option>
            <option value="Cartão de Débito">Cartão de Débito</option>
            <option value="PIX">PIX</option>
        </select>

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
                <td>
                    <strong>Rua:</strong> <?= $venda->getRua() ?><br>
                    <strong>Número:</strong> <?= $venda->getNumero() ?><br>
                    <strong>Bairro:</strong> <?= $venda->getBairro() ?><br>
                    <strong>Cidade:</strong> <?= $venda->getCidade() ?>
                </td>

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
    <?php echo "Lucro de: R$ " . number_format($totalVendas, 2, ',', '.'); ?>
</div>

</body>
</html>