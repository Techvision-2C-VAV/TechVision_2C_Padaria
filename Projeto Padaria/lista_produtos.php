<?php
include "proteger.php";
include "conexao.php";

// Ordenação padrão
$ordenarPor = "idProd ASC";

// Se tiver parâmetro "sort" e "order" na URL, define a ordenação
if (isset($_GET['sort'])) {
    $ordem = (isset($_GET['order']) && $_GET['order'] == 'desc') ? "DESC" : "ASC";

    switch ($_GET['sort']) {
        case "id":
            $ordenarPor = "idProd $ordem";
            break;
        case "categoria":
            $ordenarPor = "categoria $ordem";
            break;
        case "nome":
            $ordenarPor = "nome $ordem";
            break;
        case "preco":
            $ordenarPor = "preco $ordem";
            break;
        case "quantidade":
            $ordenarPor = "quantidade $ordem";
            break;
    }
}

// Executa consulta já ordenada
$result = $conn->query("SELECT * FROM produtos ORDER BY $ordenarPor");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
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
            margin-right: 15px;
            transition: 0.3s;
        }

        a:hover {
            text-decoration: underline;
        }

        h2 {
            color: #222;
            margin: 20px 0;
        }

        .links {
            margin-bottom: 20px;
        }

        .ordenacao {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fffdfa;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background: #f4a300;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background: #fdf4de;
        }

        tr:hover {
            background: #fff2c6;
        }

        td {
            color: #333;
        }

        .produto-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .produto-info img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>

    <a href='dashboard.php'>Voltar</a><br>

    <h2>Lista de Produtos</h2>
    
    <?php if ($_SESSION['funcao'] == 'gerente' || $_SESSION['funcao'] == 'repositor'): ?>
        <div class="links">
            <a href='registrar_entrada.php'>Registrar Entrada de Produtos</a>
            <?php if ($_SESSION['funcao'] == 'gerente'): ?>
                <a href='cadastrar_produto.php'>Cadastrar Produtos</a>
                <a href='atualizar_preco.php'>Atualizar Preços</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- Menu de Ordenação -->
    <div class="ordenacao">
        <strong>Ordenar por:</strong><br>
        ID: <a href="?sort=id&order=asc">↑</a> <a href="?sort=id&order=desc">↓</a> |
        Categoria: <a href="?sort=categoria&order=asc">↑</a> <a href="?sort=categoria&order=desc">↓</a> |
        Nome: <a href="?sort=nome&order=asc">↑</a> <a href="?sort=nome&order=desc">↓</a> |
        Preço: <a href="?sort=preco&order=asc">↑</a> <a href="?sort=preco&order=desc">↓</a> |
        Quantidade: <a href="?sort=quantidade&order=asc">↑</a> <a href="?sort=quantidade&order=desc">↓</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Quantidade</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['idProd'] ?></td>
            <td>
            <div class="produto-info">
                <?php if (!empty($row['fotos'])): ?>
                    <img src="<?= $row['fotos'] ?>" alt="<?= $row['nome'] ?>">
                <?php else: ?>
                    <img src="imagens/default.png" alt="Sem foto">
                <?php endif; ?>
                <span><?= $row['nome'] ?></span>
            </div>
            </td>
            <td><?= $row['categoria'] ?></td>
            <td>R$ <?= number_format($row['preco'], 2, ',', '.') ?></td>
            <td><?= $row['quantidade'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
