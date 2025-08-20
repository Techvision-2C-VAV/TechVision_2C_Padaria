<?php
include "proteger.php";
include "conexao.php";

if ($_SESSION['funcao'] != 'gerente') {
    exit("Acesso negado.");
}

echo "<a href='lista_produtos.php'>Voltar</a><br>";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $stmt = $conn->prepare("INSERT INTO produtos (nome, categoria, preco, quantidade) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdi", $nome, $categoria, $preco, $quantidade);
    $stmt->execute();

    echo "Produto cadastrado com sucesso!";
}
?>

<style>
    form {
        width: 300px;
        margin-top: 20px;
    }

    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 5px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        margin-top: 15px;
        padding: 8px 12px;
    }
</style>
<h2>Cadastrar Produtos</h2>

<form method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required>

    <label for="categoria">Categoria:</label>
    <input type="text" name="categoria" id="categoria" required>

    <label for="preco">Preço:</label>
    <input type="number" step="0.01" name="preco" id="preco" required>

    <label for="quantidade">Quantidade Inicial:</label>
    <input type="number" name="quantidade" id="quantidade" required>

    <input type="submit" value="Cadastrar Produto">
</form>
