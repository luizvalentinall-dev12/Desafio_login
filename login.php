<?php
 login($_POST);
function login(?array $post = null){
    session_start();
    $_SESSION['autenticado'] = false;

    $resp = [
        'msg' => 'login falhou! Valide Usuario ou Senha !!',
        'status' => 200
    ];

    $json_data = file_get_contents('dataUsers.json');

    $data = json_decode($json_data, true);

    $infoUser = [];
    foreach($data as $user){
        if($user['username'] == $post['username']){
            $infoUser = $user;
            break;
        }
    }

    if (password_verify(trim($post['password']), $infoUser['password'])){
        unset($infoUser['password']);
        $_SESSION['login'] = $infoUser;
        $resp = [
            'msg' => 'Login Realizado!!!',
            'user' => $_SESSION['login'],
            'status' => 200
        ];
        http_response_code($resp['status']);
        $_SESSION['autenticado'] = true;
        header("Location: home.php");
        exit;
    }

    http_response_code($resp['status']);
    unset($resp['status']);
    header("Location: index.html?erro=1");
    exit;
}

