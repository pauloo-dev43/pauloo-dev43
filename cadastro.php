<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare('INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)');
    if ($stmt->execute([$nome, $email, $senha])) {
        header("Location: login.php");
        exit();
    } else {
        echo "Erro ao cadastrar!";
    }
}
?>

<form method="post" action="cadastro.php">
    Nome: <input type="text" name="nome" required>
    E-mail: <input type="email" name="email" required>
    Senha: <input type="password" name="senha" required>
    Confirmar Senha: <input type="password" name="confirmar_senha" required>
    <button type="submit">Cadastrar</button>
</form>
