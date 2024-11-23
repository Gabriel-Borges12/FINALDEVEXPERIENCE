<?php
session_start();

// Verificar se o usuário está autenticado e se é um aluno
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'aluno') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Aluno</title>
</head>
<body>
    <h2>Painel do Aluno</h2>
    <p>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</p>
    <p>Você está logado como Aluno.</p>

    <!-- Opções para o aluno -->
    <ul>
        <li><a href="planos_treino.php">Meus Planos de Treino</a></li>
        <li><a href="logout.php">Sair</a></li>
    </ul>
</body>
</html>
