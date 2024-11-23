<?php
// Incluir a conexão com o banco de dados
include('conexao.php');

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Receber os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $userType = $_POST['userType'];

    // Verificar se o nome de usuário ou email já existe no banco
    $query = "SELECT id FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Se o e-mail já estiver registrado
        $erro = "E-mail já cadastrado!";
        header("Location: cadastro.php?erro=$erro");
        exit();
    } else {
        // Criar a senha criptografada
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // Inserir o novo usuário no banco de dados
        $query = "INSERT INTO usuarios (nome, email, senha, tipo_usuario) VALUES (:nome, :email, :senha, :tipo_usuario)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha_hash);
        $stmt->bindParam(':tipo_usuario', $userType);

        // Executar a consulta
        if ($stmt->execute()) {
            // Redirecionar para a página de login com uma mensagem de sucesso
            header("Location: cadastro.php?status=sucesso");
            exit();
        } else {
            // Caso ocorra algum erro
            $erro = "Erro ao cadastrar o usuário!";
            header("Location: cadastro.php?erro=$erro");
            exit();
        }
    }
}
?>
