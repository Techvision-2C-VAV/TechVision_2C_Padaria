<?php
include "proteger.php";
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novaSenha = $_POST['senha'];

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,16}$/', $novaSenha)) {
        die("Senha inválida. Deve conter letras maiúsculas, minúsculas e números.");
    }

    $senhaCriptografada = password_hash($novaSenha, PASSWORD_DEFAULT);
    $idFunc = $_SESSION['idFunc'];

    $stmt = $conn->prepare("UPDATE funcionarios SET senha = ? WHERE idFunc = ?");
    $stmt->bind_param("si", $senhaCriptografada, $idFunc);

    if ($stmt->execute()) {
        echo "Senha alterada com sucesso.";
    } else {
        echo "Erro ao alterar senha.";
    }
}
?>

<form method="POST">
    <input type="password" name="senha" placeholder="Nova Senha" required>
    <button type="submit">Alterar Senha</button>
</form>
