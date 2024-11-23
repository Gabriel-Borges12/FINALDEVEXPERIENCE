<?php
// Dados de conexão com o banco de dados
$host = 'localhost';      // Endereço do servidor MySQL
$dbname = 'birl_academy'; // Nome do banco de dados
$username = 'root';       // Usuário do MySQL (padrão no XAMPP é 'root')
$password = '';           // Senha do MySQL (em branco no XAMPP por padrão)

// Tente criar a conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Modo de erro
} catch (PDOException $e) {
    echo 'Erro na conexão: ' . $e->getMessage(); // Caso ocorra um erro, mostra a mensagem
}
?>
