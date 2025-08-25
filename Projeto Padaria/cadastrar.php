<?php
include "proteger.php";
if ($_SESSION['funcao'] != 'gerente') {
    die("Acesso negado.");
}
?>

<?php
include "conexao.php";

function validarSenha($senha) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,16}$/', $senha);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $funcao = $_POST['funcao'];
    
    if (!validarSenha($senha)) {
        die("<p style='color:red;'>Senha Inválida! Deve ter entre 8 e 16 caracteres, com letras maiúsculas, minúsculas e números.</p>");
    }

    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO funcionarios (usuario, senha, nome_completo, email, funcao) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $usuario, $senhaCriptografada, $nome, $email, $funcao);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Funcionário cadastrado com sucesso.</p>";
    } else {
        echo "<p style='color:red;'>Erro: " . $stmt->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Funcionários</title>
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
            display: flex;
            flex-direction: column;
        }

        input, select, button {
            margin-top: 12px;
            padding: 10px;
            font-size: 14px;
            border-radius: 8px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        button {
            background-color: #f4a300;
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #d18e00;
        }

        p {
            font-size: 13px;
            color: gray;
            margin-top: 8px;
        }
    </style>
</head>
<body>

    <a href='dashboard.php'>Voltar</a>

    <h2>Cadastrar Funcionários</h2>

    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <input type="text" name="nome" placeholder="Nome completo" required>
        <input type="email" name="email" placeholder="Email" required>
        <select name="funcao" required>
            <option value="gerente">Gerente</option>
            <option value="funcionario">Funcionário</option>
            <option value="repositor">Repositor</option>
        </select>
        <button type="submit">Cadastrar</button>
        <p>A senha deve ter entre 8 e 16 caracteres, com letras maiúsculas, minúsculas e números.</p>
    </form>

</body>
</html>
