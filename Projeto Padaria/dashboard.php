<?php
include "proteger.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
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

    <div class="welcome">
        Bem-vindo, <?= $_SESSION['usuario'] ?>
    </div>

    <div class="buttons">
        <?php if ($_SESSION['funcao'] == 'gerente'): ?>
            <a href='cadastrar.php'>Cadastrar Funcionário</a>
            <a href='listar_funcionarios.php'>Gerenciar Funcionários</a>
        <?php endif; ?>

        <?php if ($_SESSION['funcao'] == 'gerente' || $_SESSION['funcao'] == 'repositor'): ?>
            <a href='lista_produtos.php'>Ver Lista de Produtos</a>
        <?php endif; ?>

        <a href='alterar_senha.php'>Alterar Minha Senha</a>
        <a href='logout.php'>Sair</a>
    </div>

</body>
</html>
