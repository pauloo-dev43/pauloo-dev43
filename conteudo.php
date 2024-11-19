<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo "Acesso negado!";
    exit();
}

if ($_SERVER['REMOTE_ADDR'] != $_COOKIE['ip_usuario']) {
    session_destroy();
    header("Location: login.php");
    exit();
}

echo "Bem-vindo, " . $_SESSION['usuario'] . "!";
echo "<br>Seu IP: " . $_SERVER['REMOTE_ADDR'];
?>
