<?php
include "proteger.php";
include "conexao.php";

if ($_SESSION['funcao'] != 'gerente') {
    exit("Acesso negado.");
}

echo "<a href='lista_produtos.php'>Voltar</a><br>";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProd = $_POST['idProd'];
    $preco = $_POST['preco'];

    $stmt = $conn->prepare("UPDATE produtos SET preco=? WHERE idProd=?");
    $stmt->bind_param("di", $preco, $idProd);
    $stmt->execute();

    echo "Preço atualizado!";
}

$result = $conn->query("SELECT idProd, nome FROM produtos");
?>

<form method="post">
    Produto:
    <select name="idProd">
        <?php while ($row = $result->fetch_assoc()): ?>
            <option value="<?= $row['idProd'] ?>"><?= $row['nome'] ?></option>
        <?php endwhile; ?>
    </select><br>
    Novo Preço: <input type="number" step="0.01" name="preco"><br>
    <input type="submit" value="Atualizar Preço">
</form>
