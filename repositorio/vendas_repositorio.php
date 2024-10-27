<?php
class estoqueRepositorio{
    private $conn; //Sua conexão com o banco de dados


    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function cadastrar(Estoque $venda){

        $endereco = $venda->getEndereco();
        $produto = $venda->getProduto();
        $quantidade = $venda->getQuantidade();
        $preco = $venda->getPreco();
        $total = $venda->getTotal();
        $formaPagamento = $venda->getFormaPagamento();
        $total_produtos = $venda->getTotalProdutos();
        $total_lucro = $venda->getTotalLucro();


        $sql = "INSERT INTO vendas (endereco, produto, quantidade, preco, total, formaPagamento, total_produtos, total_lucro ) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssidisid",
        $endereco,
        $produto,
        $quantidade,
        $preco,
        $total,
        $formaPagamento,
        $total_produtos,
        $total_lucro 
            
    );
       // Executa a consulta preparada e verifica o sucesso
       $success = $stmt->execute();

       // Fecha a declaração
       $stmt->close();

       // Retorna um indicador de sucesso
       return $success;

    }

    public function buscarTodasVendas()
    {
        $sql = "SELECT * FROM vendas ORDER BY preco asc";
        $result = $this->conn->query($sql);

        $vendas = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $venda = new Estoque(
                    $row['id'],
                    $row["endereco"],
                    $row['produto'],
                    $row['quantidade'],
                    $row['preco'],
                    $row['total'],
                    $row['formaPagamento'],
                    $row['total_produtos'],
                    $row['total_lucro']

                );
                $vendas[] = $venda;
            }
        }

        return $vendas;
    }

    public function listarVendasPorId($id)
    {
        $sql = "SELECT * FROM vendas WHERE id = '?'";

        // Prepara a declaração SQL
        $stmt = $this->conn->prepare($sql);

        // Vincula o parâmetro
        $stmt->bind_param('i', $id);

        // Executa a consulta preparada
        $stmt->execute();

        // Obtém os resultados
        $result = $stmt->get_result();

        $vendas = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $venda = new Estoque(
                $row['id'],
                $row["endereco"],
                $row['produto'],
                $row['quantidade'],
                $row['preco'],
                $row['total'],
                $row['formaPagamento'],
                $row['total_produtos'],
                $row['total_lucro']
                
            );
        }

        // Fecha a declaração
        $stmt->close();

        return $vendas;
    }

    public function excluirVendasPorId($id)
    {
        $sql = "DELETE FROM vendas WHERE  id = ?";

        // Prepara a declaração SQL
        $stmt = $this->conn->prepare($sql);

        // Vincula o parâmetro
        $stmt->bind_param('i', $id);

        // Executa a consulta preparada
        $success = $stmt->execute();

        // Fecha a declaração
        $stmt->close();

        return $success;
    }
}
