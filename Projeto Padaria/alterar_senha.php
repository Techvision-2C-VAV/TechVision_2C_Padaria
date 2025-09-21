<?php
include "proteger.php";
include "conexao.php";

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novaSenha = $_POST['senha'];

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,16}$/', $novaSenha)) {
        $msg = "<p style='color:red;'>Senha inválida. Deve conter letras maiúsculas, minúsculas e números (8 a 16 caracteres).</p>";
    } else {
        $senhaCriptografada = password_hash($novaSenha, PASSWORD_DEFAULT);
        $idFunc = $_SESSION['idFunc'];

        $stmt = $conn->prepare("UPDATE funcionarios SET senha = ? WHERE idFunc = ?");
        $stmt->bind_param("si", $senhaCriptografada, $idFunc);

        if ($stmt->execute()) {
            $msg = "<p style='color:green;'>Senha alterada com sucesso!</p>";
        } else {
            $msg = "<p style='color:red;'>Erro ao alterar senha.</p>";
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

        a {
            text-decoration: none;
            font-weight: 500;
            color: #f4a300;
            margin-bottom: 15px;
            display: inline-block;
            transition: 0.3s;
        }

        a:hover {
            text-decoration: underline;
        }

        h2 {
            color: #222;
            margin: 20px 0;
        }

        form {
            background: #fffdfa;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 350px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 500;
        }

        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #f4a300;
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #d18e00;
        }

        .msg {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <a href="dashboard.php">Voltar</a>

    <h2>Alterar Senha</h2>

    <?php if ($msg) echo "<div class='msg'>{$msg}</div>"; ?>

    <form method="POST">
        <label for="senha">Nova Senha:</label>
        <input type="password" name="senha" id="senha" placeholder="Digite sua nova senha" required>
        <input type="submit" value="Alterar Senha">
    </form>

</body>
</html>
