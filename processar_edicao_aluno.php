<?php
// Incluir a conexão com o banco de dados
include('db_connect.php');

// Verificar se os dados do formulário foram enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Receber os dados do formulário
    $aluno_id = $_POST['aluno'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = $_POST['telefone'];

    // Atualizar os dados no banco de dados
    $query = "UPDATE alunos SET nome = :nome, email = :email, senha = :senha, data_nascimento = :data_nascimento, telefone = :telefone WHERE id = :id";
    $stmt = $pdo->prepare($query);

    // Executar a atualização
    $stmt->execute([
        ':id' => $aluno_id,
        ':nome' => $nome,
        ':email' => $email,
        ':senha' => $senha,
        ':data_nascimento' => $data_nascimento,
        ':telefone' => $telefone
    ]);

    // Redirecionar para uma página de confirmação
    header("Location: editar_aluno.php?status=sucesso");
    exit();
}
?>
