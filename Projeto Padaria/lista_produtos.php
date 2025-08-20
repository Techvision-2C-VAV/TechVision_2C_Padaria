<?php
include "proteger.php";
include "conexao.php";

if ($_SESSION['funcao'] != 'repositor' && $_SESSION['funcao'] != 'gerente') {
    exit("Acesso negado.");
}

$result = $conn->query("SELECT * FROM produtos");
echo "<a href='dashboard.php'>Voltar</a><br>";

echo "<h2>Lista de Produtos</h2>";

echo "<a href='registrar_entrada.php'>Registrar Entrada de Produtos</a><br>";

if ($_SESSION['funcao'] == 'gerente') {
    echo "<a href='cadastrar_produto.php'>Cadastrar Produtos</a><br>";
    echo "<a href='atualizar_preco.php'>Atualizar Preços</a><br>";
}
?><br><br>


<table border="1">
<tr>
    <th>ID</th><th>Nome</th><th>Categoria</th><th>Preço</th><th>Quantidade</th>
</tr>
<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['idProd'] ?></td>
    <td><?= $row['nome'] ?></td>
    <td><?= $row['categoria'] ?></td>
    <td>R$ <?= number_format($row['preco'], 2, ',', '.') ?></td>
    <td><?= $row['quantidade'] ?></td>
</tr>
<?php endwhile; 
?>
</table>
