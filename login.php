<?php
require 'conexao.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['usuario'] = $user['nome'];
        setcookie("ip_usuario", $_SERVER['REMOTE_ADDR'], time() + (86400 * 30), "/");
        header("Location: conteudo.php");
        exit();
    } else {
        echo "E-mail ou senha incorretos!";
    }
}
?>

<form method="post" action="login.php">
    E-mail: <input type="email" name="email" required>
    Senha: <input type="password" name="senha" required>
    <button type="submit">Login</button>
</form>
