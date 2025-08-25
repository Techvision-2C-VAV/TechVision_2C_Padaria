<?php
include "proteger.php";

if (trim(strtolower($_SESSION['funcao'])) !== 'gerente') {
    die("Acesso negado.");
}

include "conexao.php";

$sql = "SELECT idFunc, usuario, nome_completo, email, funcao FROM funcionarios WHERE funcao <> 'gerente'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Funcionários</title>
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
            background-color: #f4a300;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background: #fdf4de;
        }

        tr:hover {
            background: #fff2c6;
        }

        td a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 8px;
            background-color: #f4a300;
            color: white;
            font-weight: 500;
            margin-right: 5px;
            transition: 0.3s;
        }

        td a:hover {
            background-color: #d18e00;
        }

        td a.delete {
            background-color: #e74c3c;
        }

        td a.delete:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

    <a href='dashboard.php' class="voltar">Voltar</a>

    <h2>Funcionários</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Função</th>
            <th>Ações</th>
        </tr>

        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['idFunc'] ?></td>
                    <td><?= $row['usuario'] ?></td>
                    <td><?= $row['nome_completo'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['funcao'] ?></td>
                    <td>
                        <a href='editar_funcionario.php?id=<?= $row['idFunc'] ?>'>Editar</a>
                        <a href='excluir_funcionario.php?id=<?= $row['idFunc'] ?>' class="delete" onclick='return confirm("Confirma exclusão?")'>Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Nenhum funcionário encontrado.</td>
            </tr>
        <?php endif; ?>
    </table>

</body>
</html>
