<?php
// Incluir a conexão com o banco de dados
include('conexao.php');

// Iniciar a sessão no começo
session_start();

// Variável para armazenar erros
$erro = "";

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Receber os dados do formulário de forma segura (evitar XSS e SQL Injection)
    $usuario_nome = htmlspecialchars($_POST['usuario_nome']);
    $usuario_senha = $_POST['usuario_senha'];

    // Consultar o banco de dados para verificar as credenciais
    $query = "SELECT id, nome, senha, tipo_usuario FROM usuarios WHERE nome = :usuario_nome";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':usuario_nome', $usuario_nome);

    if ($stmt->execute()) {
        // Verificar se encontrou o usuário
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Verificar se a senha bate
            if (password_verify($usuario_senha, $usuario['senha'])) {
                // Iniciar a sessão e armazenar as informações do usuário
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['tipo'] = $usuario['tipo_usuario']; // Armazenar tipo de usuário

                // Redirecionar conforme o tipo de usuário
                if ($usuario['tipo_usuario'] == 'instrutor') {
                    header("Location: area_instrutor.php"); // Página do instrutor
                } else {
                    header("Location: area_aluno.php"); // Página do aluno
                }
                exit();
            } else {
                // Caso a senha esteja incorreta
                $erro = "Senha inválida!";
            }
        } else {
            // Caso o nome de usuário não seja encontrado
            $erro = "Nome de usuário não encontrado!";
        }
    } else {
        // Caso a execução da consulta falhe
        $erro = "Erro ao acessar o banco de dados!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login - Birl Academy</title>
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Login</h2>

            <!-- Exibir mensagens de erro, se houver -->
            <?php
            if (!empty($erro)) {
                echo "<p style='color:red;'>$erro</p>";
            }
            ?>

            <!-- Formulário de login -->
            <form action="login.php" method="POST">
                <div>
                    <label for="usuario_nome">Nome de Usuário:</label>
                    <input type="text" name="usuario_nome" id="usuario_nome" required>
                </div>

                <div>
                    <label for="usuario_senha">Senha:</label>
                    <input type="password" name="usuario_senha" id="usuario_senha" required>
                </div>

                <div>
                    <button type="submit">Entrar</button>
                </div>

                <p><a href="cadastro.php">Não tem uma conta? Cadastre-se</a></p>
            </form>
        </div>
    </div>
</body>
</html>
