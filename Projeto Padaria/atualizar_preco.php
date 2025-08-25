<?php
include "proteger.php";
include "conexao.php";

if ($_SESSION['funcao'] != 'gerente') {
    exit("Acesso negado.");
}

$result_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProd = $_POST['idProd'];
    $preco = $_POST['preco'];

    $stmt = $conn->prepare("UPDATE produtos SET preco=? WHERE idProd=?");
    $stmt->bind_param("di", $preco, $idProd);
    $stmt->execute();

    $result_msg = "<p style='color:green;'>Preço atualizado com sucesso!</p>";
}

$result = $conn->query("SELECT idProd, nome FROM produtos");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Preço</title>
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

        select,
        input[type="number"] {
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

    <a href='lista_produtos.php'>Voltar</a>

    <h2>Atualizar Preço do Produto</h2>

    <?php if ($result_msg) echo "<div class='msg'>{$result_msg}</div>"; ?>

    <form method="post">
        <label for="idProd">Produto:</label>
        <select name="idProd" id="idProd">
            <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?= $row['idProd'] ?>"><?= $row['nome'] ?></option>
            <?php endwhile; ?>
        </select>

        <label for="preco">Novo Preço:</label>
        <input type="number" step="0.01" name="preco" id="preco" required>

        <input type="submit" value="Atualizar Preço">
    </form>

</body>
</html>
