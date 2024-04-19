<?php
    session_start();
    if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
        header("Location: index.html");
        exit;
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seja Bem-Vindo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 300px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        p {
            text-align: center;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Seja Bem-Vindo!</h2>
    <p>Obrigado por fazer login. Você agora está autenticado e pode acessar o conteúdo protegido.</p>
    <form action="deslogar.php" method="post">
        <input type="submit" value="sair">
    </form>
</div>

</body>
</html>