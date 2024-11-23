<?php
// Incluir a conexão com o banco de dados
include('db_connect.php');

// Buscar a lista de alunos
$query = "SELECT id, nome FROM alunos"; // Alterar conforme sua tabela e estrutura
$stmt = $pdo->prepare($query);
$stmt->execute();

// Armazenar os alunos em um array
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Aluno - Birl Academy</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="admin-container">
        <h2>Edição de Aluno</h2>
        
        <div class="form-wrapper">
            <form action="processar_edicao_aluno.php" method="POST">
                <!-- Seleção de Aluno -->
                <label for="aluno">Escolha o Aluno a ser Editado:</label>
                <select name="aluno" id="aluno" required>
                    <?php
                    // Exibir as opções de alunos
                    foreach ($alunos as $aluno) {
                        echo "<option value='" . $aluno['id'] . "'>" . $aluno['nome'] . "</option>";
                    }
                    ?>
                </select>

                <!-- Campos de Edição -->
                <div class="input-group">
                    <label for="nome">Nome Completo</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome completo" required>
                </div>

                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" placeholder="E-mail" required>
                </div>

                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha" required>
                </div>

                <div class="input-group">
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" required>
                </div>

                <div class="input-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" placeholder="Telefone" required>
                </div>

                <button type="submit" class="save-btn">Salvar Alterações</button>
            </form>
        </div>
    </div>
</body>
</html>
