<?php
class Estoque {
    private $id;
    private $endereco;
    private $produto;
    private $quantidade;
    private $preco;
    private $total;
    private $formaPagamento;
    private $total_produtos;
    private $total_lucro;


    public function __construct(
        $id,
        $endereco,
        $produto,
        $quantidade,
        $preco,
        $total,
        $formaPagamento,
        $total_produtos,
        $total_lucro
    ) 
    {
        $this->id = $id;
        $this->endereco = $endereco;
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->preco = $preco;
        $this->total = $total;
        $this->formaPagamento = $formaPagamento;
        $this->total_produtos = $total_produtos;
        $this->total_lucro = $total_lucro;
    }

    // Métodos get e set para cada propriedade
    public function getId() {
        return $this->id;
        }
        public function setId($id) {
            $this->id = $id;
        }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getProduto() {
        return $this->produto;
    }

    public function setProduto($produto) {
        $this->produto = $produto;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function getFormaPagamento() {
        return $this->formaPagamento;
    }

    public function setFormaPagamento($formaPagamento) {
        $this->formaPagamento = $formaPagamento;
    }

    public function getTotalProdutos() {
        return $this->total_produtos;
    }

    public function setTotalProdutos($total_produtos) {
        $this->total_produtos = $total_produtos;
    }

    public function getTotalLucro() {
        return $this->total_lucro;
    }

    public function setTotalLucro($total_lucro) {
        $this->total_lucro = $total_lucro;
    }

}

?>
