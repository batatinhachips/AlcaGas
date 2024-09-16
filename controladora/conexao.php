
<?php
// Configurações do banco de dados
$host = 'localhost'; // Ou o endereço do seu servidor de banco
$dbname = 'hostdeprojetos_alcantaragas';
$username = 'hostdeprojetos_alcantaragas';
$password = 'webwebifsp';

// Tenta a conexão com o banco
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configura o PDO para lançar exceções em caso de erro
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    echo "Erro ao conectar: " . $e->getMessage();
}
?>