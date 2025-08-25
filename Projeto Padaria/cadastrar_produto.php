<?php
include "proteger.php";
include "conexao.php";

if ($_SESSION['funcao'] != 'gerente') {
    exit("Acesso negado.");
}

$result_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    // Verifica se uma imagem foi enviada
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $extensao = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));

        if ($extensao != "jpg") {
            $result_msg = "<p style='color:red;'>Erro: a imagem deve estar no formato JPG.</p>";
        } else {
            $pasta = "imagens/";
            if (!is_dir($pasta)) mkdir($pasta, 0777, true);

            $nomeArquivo = uniqid() . ".jpg";
            $caminho = $pasta . $nomeArquivo;

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho)) {
                $stmt = $conn->prepare("INSERT INTO produtos (nome, categoria, preco, quantidade, fotos) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("ssdis", $nome, $categoria, $preco, $quantidade, $caminho);
                $stmt->execute();
                $result_msg = "<p style='color:green;'>Produto cadastrado com sucesso com imagem!</p>";
            } else {
                $result_msg = "<p style='color:red;'>Erro ao salvar a imagem.</p>";
            }
        }
    } else {
        $stmt = $conn->prepare("INSERT INTO produtos (nome, categoria, preco, quantidade, fotos) VALUES (?, ?, ?, ?, '')");
        $stmt->bind_param("ssdi", $nome, $categoria, $preco, $quantidade);
        $stmt->execute();
        $result_msg = "<p style='color:green;'>Produto cadastrado sem imagem.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produtos</title>
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

        input[type="text"],
        input[type="number"],
        input[type="file"] {
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

        small {
            color: gray;
        }

        .msg {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <a href='lista_produtos.php'>Voltar</a>

    <h2>Cadastrar Produtos</h2>

    <?php if ($result_msg) echo "<div class='msg'>{$result_msg}</div>"; ?>

    <form method="post" enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>

        <label for="categoria">Categoria:</label>
        <input type="text" name="categoria" id="categoria" required>

        <label for="preco">Preço:</label>
        <input type="number" step="0.01" name="preco" id="preco" required>

        <label for="quantidade">Quantidade Inicial:</label>
        <input type="number" name="quantidade" id="quantidade" required>

        <label for="foto">Imagem do Produto:</label>
        <input type="file" name="foto" id="foto" accept=".jpg">
        <small>Apenas imagens no formato JPG</small>

        <input type="submit" value="Cadastrar Produto">
    </form>

</body>
</html>
