<?php
include "proteger.php";

if (trim(strtolower($_SESSION['funcao'])) !== 'gerente') {
    die("Acesso negado.");
}

include "conexao.php";

$sql = "SELECT idFunc, usuario, nome_completo, email, funcao FROM funcionarios WHERE funcao <> 'gerente'";
$result = $conn->query($sql);

echo "<h2>Funcionários</h2>";
echo "<a href='dashboard.php'>Voltar</a><br><br>";

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Usuario</th><th>Nome</th><th>Email</th><th>Função</th><th>Ações</th></tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['idFunc']."</td>";
        echo "<td>".$row['usuario']."</td>";
        echo "<td>".$row['nome_completo']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['funcao']."</td>";
        echo "<td>
            <a href='editar_funcionario.php?id=".$row['idFunc']."'>Editar</a> | 
            <a href='excluir_funcionario.php?id=".$row['idFunc']."' onclick='return confirm(\"Confirma exclusão?\")'>Excluir</a>
        </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Nenhum funcionário encontrado.</td></tr>";
}

echo "</table>";
?>
