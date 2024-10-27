<?php
require '../repositorio/vendas_repositorio.php';
require './conexao.php';
require '../modelo/vendas.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados do formulário corretamente
    $endereco = $_POST["endereco"] ?? null;
    $produto = $_POST["produto"] ?? null;
    $quantidade = (float) ($_POST["quantidade"] ?? 0);
    $preco = (float) ($_POST["preco"] ?? 0);
    $total = (float) ($_POST["total"] ?? 0);
    $formaPagamento = $_POST["formaPagamento"] ?? null;

    // Cálculo de total_produtos e total_lucro
    $total_produtos = $quantidade * $preco;
    $total_lucro = $total_produtos * 0.10;

    // Instanciar a classe Estoque
    $venda = new Estoque(
        null, // id (auto_increment, pode ser null)
        $endereco,
        $produto,
        $quantidade,
        $preco,
        $total,
        $formaPagamento,
        $total_produtos,
        $total_lucro
    );

    // Cadastrar venda
    $vendasRepositorio = new estoqueRepositorio($conn);

    if ($vendasRepositorio->cadastrar($venda)) {
        // Redirecionar para a página de sucesso após o cadastro
        header("Location: ../visao/estoque.php");
    } else {
        // Opcional: adicione tratamento de erro aqui
        echo "Erro ao cadastrar a venda.";
    }
    exit();
}
?>