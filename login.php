<?php
// Incluir a conexão com o banco de dados
include('conexao.php');

// Iniciar a sessão no começo
session_start();

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Receber os dados do formulário
    $usuario_nome = $_POST['usuario_nome'];
    $usuario_senha = $_POST['usuario_senha'];

    // Consultar o banco de dados para verificar as credenciais
    $query = "SELECT id, nome, senha, tipo_usuario FROM usuarios WHERE nome = :usuario_nome";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':usuario_nome', $usuario_nome);

    if ($stmt->execute()) {
        // Verificar se encontrou o usuário
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            echo "Usuário encontrado!";  // Diagnóstico para verificar se o usuário foi encontrado

            // Verificar se a senha bate
            if (password_verify($usuario_senha, $usuario['senha'])) {
                // Iniciar a sessão e armazenar as informações do usuário
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['tipo'] = $usuario['tipo_usuario']; // Corrigir aqui para 'tipo_usuario'

                // Redirecionar conforme o tipo de usuário
                if ($usuario['tipo_usuario'] == 'instrutor') {  // Corrigir aqui para 'tipo_usuario'
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
    }
}
?>

