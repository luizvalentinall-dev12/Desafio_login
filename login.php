<?php
$message_code = [
    '0' => 'None',
    '1' => 'Login Realizado!!!',
    '2' => 'Usuário não encontrado',
    '3' => 'Senha incorreta',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    login($_POST);
}

function login(?array $post = null)
{
    session_start();

    if (!isset($post['username']) || !isset($post['password'])) {
        returnError(2);
    }

    $json_data = file_get_contents('dataUsers.json');


    $data = json_decode($json_data, true);


    $infoUser = null;
    foreach ($data as $user) {
        if ($user['username'] === $post['username']) {
            $infoUser = $user;
            break;
        }
    }

    if ($infoUser !== null) {
        if (password_verify($post['password'], $infoUser['password'])) {
            unset($infoUser['password']);
            $_SESSION['login'] = $infoUser;
            header('Location: home.php');
            exit();
        } else {
            returnError(3);
        }
    } else {
        returnError(2);
    }
}

function returnError($code)
{
    global $message_code;
    $errorMessage = $message_code[$code];
    echo "<p style='color: red;'>$errorMessage</p>";
}
?>
