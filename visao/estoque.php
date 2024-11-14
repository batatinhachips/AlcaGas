<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <link rel="stylesheet" href="estoque.css"> <!-- Link para o CSS de estoque -->
</head>
<body class="estoque-page"> <!-- Classe para o estilo geral da página de estoque -->
    <div class="container-estoque"> <!-- Container principal da tabela de estoque -->
        <h1 class="estoque-title">Estoque de Produtos</h1> <!-- Título da página com estilo -->
        
        <!-- Tabela de produtos -->
        <table class="table-estoque"> <!-- Classe para a tabela de estoque -->
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Categoria</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Produto A</td>
                    <td>Categoria 1</td>
                    <td>20</td>
                    <td>R$ 50,00</td>
                    <td class="alinha_botao"> <!-- Alinha os botões ao centro -->
                        <button class="btn btn-primary">Editar</button> <!-- Botão com estilo primário -->
                        <button class="btn btn-secondary">Excluir</button> <!-- Botão com estilo secundário -->
                    </td>
                </tr>
                <tr>
                    <td>Produto B</td>
                    <td>Categoria 2</td>
                    <td>15</td>
                    <td>R$ 30,00</td>
                    <td class="alinha_botao">
                        <button class="btn btn-primary">Editar</button>
                        <button class="btn btn-secondary">Excluir</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
