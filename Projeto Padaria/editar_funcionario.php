<?php
include "proteger.php";

if (trim(strtolower($_SESSION['funcao'])) !== 'gerente') {
    die("Acesso negado.");
}

include "conexao.php";

$id = intval($_GET['id'] ?? 0);

// Busca funcionário que não seja gerente
$sql = "SELECT * FROM funcionarios WHERE idFunc = $id AND funcao <> 'gerente'";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    die("Funcionário não encontrado ou acesso negado.");
}

$funcionario = $result->fetch_assoc();

$result_msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $funcao = $_POST['funcao'];

    if ($usuario == '' || $nome_completo == '' || $email == '' || $funcao == '') {
        $result_msg = "<p style='color:red;'>Preencha todos os campos!</p>";
    } else {
        $sql = "UPDATE funcionarios SET 
            usuario='$usuario', 
            nome_completo='$nome_completo', 
            email='$email', 
            funcao='$funcao' 
            WHERE idFunc = $id";

        if ($conn->query($sql) === TRUE) {
            $result_msg = "<p style='color:green;'>Atualizado com sucesso! <a href='listar_funcionarios.php'>Voltar</a></p>";
        } else {
            $result_msg = "<p style='color:red;'>Erro ao atualizar: " . $conn->error . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Funcionário</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff9ef;
            margin: 20px;
        }

        a.voltar {
            text-decoration: none;
            font-weight: 500;
            color: #f4a300;
            display: inline-block;
            margin-bottom: 15px;
            transition: 0.3s;
        }

        a.voltar:hover {
            text-decoration: underline;
        }

        h2 {
            color: #222;
            margin-bottom: 20px;
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

        .msg {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <a href='listar_funcionarios.php' class="voltar">Voltar</a>

    <h2>Editar Funcionário</h2>

    <?php if ($result_msg) echo "<div class='msg'>{$result_msg}</div>"; ?>

    <form method="post">
        <label>Usuário:</label>
        <input type="text" name="usuario" value="<?= $funcionario['usuario'] ?>">

        <label>Nome completo:</label>
        <input type="text" name="nome_completo" value="<?= $funcionario['nome_completo'] ?>">

        <label>Email:</label>
        <input type="email" name="email" value="<?= $funcionario['email'] ?>">

        <label>Função:</label>
        <select name="funcao">
            <option value="funcionario" <?= $funcionario['funcao'] == 'funcionario' ? 'selected' : '' ?>>Funcionário</option>
            <option value="outro" <?= $funcionario['funcao'] == 'outro' ? 'selected' : '' ?>>Outro</option>
        </select>

        <button type="submit">Salvar</button>
    </form>

</body>
</html>
