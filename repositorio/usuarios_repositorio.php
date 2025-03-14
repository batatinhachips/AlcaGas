<?php
class UsuarioRepositorio
{
    private $conn;

    // Construtor para injetar a conexão com o banco de dados
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Método para cadastrar um novo usuário
    public function cadastrar(Usuariosss $usuario)
    {
        // Recuperando dados do objeto Usuario
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $idNivelUsuario = $usuario->getIdNivelUsuario();
        $cpf = $usuario->getCpf();
        $telefone = $usuario->getTelefone();
        $cep = $usuario->getCep();
        $logradouro = $usuario->getLogradouro();
        $complemento = $usuario->getComplemento();
        $numero = $usuario->getNumero();
        $bairro = $usuario->getBairro();
        $cidade = $usuario->getCidade();

        // Query para inserir o usuário
        $sql = "INSERT INTO usuario 
                (nome, email, senha, idNivelUsuario, cpf, telefone, cep, logradouro, complemento, numero, bairro, cidade) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepara a consulta
        if ($stmt = $this->conn->prepare($sql)) {
            // Vinculando os parâmetros com tipos corretos
            $stmt->bind_param(
                "sssissssssss",
                $nome,
                $email,
                $senha,
                $idNivelUsuario,
                $cpf,
                $telefone,
                $cep,
                $logradouro,
                $complemento,
                $numero,
                $bairro,
                $cidade
            );

            // Executa a consulta e verifica se foi bem-sucedida
            $success = $stmt->execute();

            // Verificando se a execução foi bem-sucedida
            if ($success) {
                $stmt->close();
                return true;
            } else {
                echo "Erro ao executar a consulta: " . $stmt->error;
                $stmt->close();
                return false;
            }
        } else {
            throw new Exception("Erro ao preparar a consulta: " . $this->conn->error);
        }
    }

    // Método para buscar todos os administradores
    public function buscarTodosAdmins()
    {
        $sql = "SELECT * FROM usuario WHERE idNivelUsuario = 2";
        $result = $this->conn->query($sql);

        $usuarios = array();

        // Verifica se existem resultados
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $usuario = new Usuariosss(
                    $row['idUsuario'],
                    $row['nome'],
                    $row['email'],
                    $row['senha'],
                    $row['idNivelUsuario'],
                    $row['cpf'],
                    $row['telefone'],
                    $row['cep'],
                    $row['logradouro'],
                    $row['complemento'],
                    $row['numero'],
                    $row['bairro'],
                    $row['cidade']
                );
                $usuarios[] = $usuario;
            }
        }

        return $usuarios;
    }

    // Método para buscar todos os clientes
    public function buscarTodosClientes()
    {
        $sql = "SELECT * FROM usuario WHERE idNivelUsuario = 1";
        $result = $this->conn->query($sql);

        $usuarios = array();

        // Verifica se existem resultados
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $usuario = new Usuariosss(
                    $row['idUsuario'],
                    $row['nome'],
                    $row['email'],
                    $row['senha'],
                    $row['idNivelUsuario'],
                    $row['cpf'],
                    $row['telefone'],
                    $row['cep'],
                    $row['logradouro'],
                    $row['complemento'],
                    $row['numero'],
                    $row['bairro'],
                    $row['cidade']
                );
                $usuarios[] = $usuario;
            }
        }

        return $usuarios;
    }

    // Método para listar um usuário por ID
    public function listarUsuarioPorId($idUsuario)
    {
        $sql = "SELECT * FROM usuario WHERE idUsuario = ?";

        if ($stmt = $this->conn->prepare($sql)) {
            // Vincula o parâmetro
            $stmt->bind_param('i', $idUsuario);

            // Executa a consulta preparada
            $stmt->execute();

            // Obtém os resultados
            $result = $stmt->get_result();

            $usuario = null;

            // Verifica se o usuário foi encontrado
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $usuario = new Usuariosss(
                    $row['idUsuario'],
                    $row['nome'],
                    $row['email'],
                    $row['senha'],
                    $row['idNivelUsuario'],
                    $row['cpf'],
                    $row['telefone'],
                    $row['cep'],
                    $row['logradouro'],
                    $row['complemento'],
                    $row['numero'],
                    $row['bairro'],
                    $row['cidade']
                );
            }

            $stmt->close();

            return $usuario;
        } else {
            throw new Exception("Erro ao preparar a consulta: " . $this->conn->error);
        }
    }

    // Método para excluir um usuário por ID
    public function excluirUsuariosPorId($idUsuario)
    {
        $sql = "DELETE FROM usuario WHERE idUsuario = ?";

        if ($stmt = $this->conn->prepare($sql)) {
            // Vincula o parâmetro
            $stmt->bind_param('i', $idUsuario);

            // Executa a consulta preparada
            $success = $stmt->execute();

            $stmt->close();

            return $success;
        } else {
            throw new Exception("Erro ao preparar a consulta de exclusão: " . $this->conn->error);
        }
    }
}
