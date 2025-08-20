<?php
include "proteger.php";
include "conexao.php";
if ($_SESSION['funcao'] != 'repositor' && $_SESSION['funcao'] != 'gerente') {
    exit("Acesso negado.");
}

echo "<a href='lista_produtos.php'>Voltar</a><br><br><br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProd = $_POST['idProd'];
    $entrada = $_POST['quantidade'];

    if (empty($idProd) || empty($entrada) || !is_numeric($entrada) || $entrada <= 0) {
        echo "<p style='color:red;'>Erro: selecione um produto e digite uma quantidade válida maior que zero.</p>";
    } else {
        $stmt = $conn->prepare("UPDATE produtos SET quantidade = quantidade + ? WHERE idProd = ?");
        $stmt->bind_param("ii", $entrada, $idProd);
        $stmt->execute();

        echo "<p style='color:green;'>Entrada registrada com sucesso!</p>";
    }
}

$result = $conn->query("SELECT idProd, nome FROM produtos");
?>

<form method="post">
    Produto:
    <select name="idProd" required>
        <option value="">-- Selecione --</option>
        <?php while ($row = $result->fetch_assoc()): ?>
            <option value="<?= $row['idProd'] ?>"><?= $row['nome'] ?></option>
        <?php endwhile; ?>
    </select><br>
    Quantidade recebida: <input type="number" name="quantidade" min="1" required><br>
    <input type="submit" value="Registrar Entrada">
</form>
