<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Aluno ou Instrutor</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>
    <div class="registration-container">
        <div class="form-wrapper">
            <div class="logo">
                <img src="logo.png" alt="Logo">
                <h2>Cadastro</h2>
            </div>

            <form class="registration-form" action="processar_cadastro.php" method="POST">
                <h3>Escolha seu tipo de cadastro</h3>

                <!-- Tipo de usuário: Aluno ou Instrutor -->
                <div class="user-type">
                    <label>
                        <input type="radio" name="userType" value="aluno" checked> Aluno
                    </label>
                    <label>
                        <input type="radio" name="userType" value="instrutor"> Instrutor
                    </label>
                </div>

                <!-- Nome -->
                <div class="input-group">
                    <input type="text" name="nome" placeholder="Nome completo" required>
                </div>

                <!-- E-mail -->
                <div class="input-group">
                    <input type="email" name="email" placeholder="E-mail" required>
                </div>

                <!-- Senha -->
                <div class="input-group">
                    <input type="password" name="senha" placeholder="Senha" required>
                </div>

                <!-- Botão de envio -->
                <button type="submit" class="register-btn">Cadastrar</button>

                <p class="login-link">Já tem conta? <a href="login.php">Faça login</a></p>
            </form>
        </div>
    </div>

    <script>
        // Verifica se há a variável 'status' na URL
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        // Se o status for 'sucesso', exibe um alerta
        if (status === 'sucesso') {
            alert("Cadastro realizado com sucesso! Agora você pode fazer login.");
        }
    </script>
</body>
</html>
