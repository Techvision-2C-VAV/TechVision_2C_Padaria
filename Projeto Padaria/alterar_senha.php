<?php
include "proteger.php";
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novaSenha = $_POST['senha'];

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,16}$/', $novaSenha)) {
        echo "<div class='alert'>Senha inválida. Deve conter letras maiúsculas, minúsculas e números (8 a 16 caracteres).</div>";
    } else {
        $senhaCriptografada = password_hash($novaSenha, PASSWORD_DEFAULT);
        $idFunc = $_SESSION['idFunc'];

        $stmt = $conn->prepare("UPDATE funcionarios SET senha = ? WHERE idFunc = ?");
        $stmt->bind_param("si", $senhaCriptografada, $idFunc);

        if ($stmt->execute()) {
            echo "<div class='success'>Senha alterada com sucesso.</div>";
        } else {
            echo "<div class='alert'>Erro ao alterar senha.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Senha</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff9ef;
            margin: 20px;
        }

        h2 {
            color: #222;
            margin-bottom: 20px;
        }

        .welcome {
            margin-bottom: 20px;
            font-size: 18px;
            color: #333;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
            max-width: 300px;
        }

        .buttons a {
            display: inline-block;
            text-align: center;
            padding: 12px 15px;
            background-color: #f4a300;
            color: white;
            font-weight: 500;
            border-radius: 10px;
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .buttons a:hover {
            background-color: #d18e00;
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Alterar Senha</h2>
        <form method="POST">
            <input type="password" name="senha" placeholder="Nova Senha" required>
            <button type="submit">Alterar Senha</button>
        </form>
        <a href="entrar.php" class="back-btn">Voltar</a>
    </div>
</body>
</html>
