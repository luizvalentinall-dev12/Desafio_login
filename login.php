<?php
session_start();
header('Content-Type: application/json');
function login(?array $params = null): array{


    $resp= [
        'msg' => 'login falhou! Valide Usuario ou Senha !!',
        'status' => 401,
    ];

    $json_data = file_get_contents('dataUsers.json');
    $data = json_decode($json_data, true);

    $infoUser = [];
    foreach($data as $user){
        if($user['username'] == $params['username']){
            $infoUser = $user;
            break;
        }
    }

  
    if (password_verify(trim($params['password']), $infoUser['password'])){
        unset($infoUser['password']);
        $_SESSION['login'] = $infoUser;
        $_SESSION['loggedIn'] = true;
        $resp = [
            'msg' => 'Login Realizado!!!',
            'user' => $_SESSION['login'],
            'status' => 200,
            'isLogged' => $_SESSION['loggedIn'],
        ];
    }

    return $resp;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $params = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
    ];
    $response = login($params);
    echo json_encode($response);
    exit;
}