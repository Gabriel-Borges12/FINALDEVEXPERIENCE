<?php
session_start();

// Verificar se o usuário está autenticado e se é um administrador
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
</head>
<body>
    <h2>Painel de Administração</h2>
    <p>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</p>
    <p>Você está logado como Administrador.</p>

    <!-- Opções para o administrador -->
    <ul>
        <li><a href="gerenciar_alunos.php">Gerenciar Alunos</a></li>
        <li><a href="visualizar_planos.php">Visualizar Planos de Treino</a></li>
        <li><a href="logout.php">Sair</a></li>
    </ul>
</body>
</html>
