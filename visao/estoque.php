<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../recursos/css/bootstrap.min.css" rel="stylesheet">
    <title>Controle de Vendas - Alcântara Gás</title>
    <script src="../recursos/js/jquery-3.5.1.min.js"></script>
    <script src="../recursos/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../recursos/css/estoque.css">
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
<div class="container mt-5 estoque">
<form action="../controladora/processar_vendas.php" method="POST" enctype="multipart/form-data">
        <label for="total_produtos" class="titulo-campo">Estoque:</label>
        <input type="text" id="total_produtos" name="total_produtos" class="custom-input">
        <input type="submit" name="cadastro" class="btn btn-dark" value="enviar">
    </form>
</div>


<div class="container mt-5 vendas">
    <h2>CONTROLE DE VENDAS</h2>

    <form action="../controladora/processar_vendas.php" method="POST" enctype="multipart/form-data" style="margin-bottom: 3rem;">
        <!-- Formulário de cadastro de vendas -->
    </form>

    <!-- Contêiner responsivo para a tabela -->
    <div class="table-responsive">
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
    </div>
    <?php echo "Lucro de: R$ " . number_format($totalVendas, 2, ',', '.'); ?>
</div>


</body>
</html>
