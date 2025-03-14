<?php
// Inicia o buffer de saída
ob_start();

require '../repositorio/produtos_repositorio.php';
require './conexao.php';
include '../modelo/produtos.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturando os dados do formulário
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $precoProduto = $_POST["precoProduto"];

    // Verificar se um arquivo de imagem foi enviado
    if ($_FILES["imagem"]["error"] == 0) {
        // Diretório onde você deseja armazenar as imagens
        $diretorio_destino = "../recursos/imagens/";

        // Nome do arquivo da imagem
        $nome_arquivo = basename($_FILES["imagem"]["name"]);

        // Caminho completo do arquivo no servidor
        $caminho_completo = $diretorio_destino . $nome_arquivo;

        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho_completo)) {
            // Instancia o objeto produto com os dados corretos
            $produto = new produto(0, $nome, $descricao, $precoProduto, $nome_arquivo);

            // Salva no banco de dados
            $produtoRepositorio = new produtoRepositorio($conn);
            $produtoRepositorio->cadastrar($produto);

            header("Location: ../visao/cadastrar_produtos_sucesso.php");
            exit();
        } else {
            echo "Erro ao fazer upload do arquivo.";
        }
    } else {
        echo "Por favor, selecione uma imagem.";
    }
}

// Finaliza o buffer de saída e envia a resposta
ob_end_flush();
