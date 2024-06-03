<?php
session_start();
error_log('Session on home.phtml: ' . print_r($_SESSION, true)); // Log da sessão ao acessar home.phtml

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seja Bem-Vindo</title>
    <link rel="stylesheet" href="/home.css">
</head>
<body>
<div class="container">
    <h2>Seja Bem-Vindo!</h2>
    <p>Obrigado por fazer login. Você agora está autenticado e pode acessar o conteúdo protegido.</p>
    <a href="/limparSessao.php"><p>Sair</p></a>
</div>
</body>
</html>
<?php
} else {
    error_log('Redirecionando para index.html: ' . print_r($_SESSION, true)); // Log antes de redirecionar
    header('Location: index.html');
    exit;
}
?>
