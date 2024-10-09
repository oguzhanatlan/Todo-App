<?php


if ($process == 'login') {

    if (!$data['email']){
        return [
            'success' => false,
            'type' => 'danger',
            'message' => 'Lütfen E-Posta adresinizi giriniz'
        ];
    }
    if (!$data['password']){
        return [
            'success' => false,
            'type' => 'danger',
            'message' => 'Lütfen şifrenizi giriniz'
        ];
    }
    $email = $data['email'];
    $password = md5($data['password']);

    $q = $db->prepare("SELECT *, CONCAT(name,' ',surname) as fullname FROM users WHERE email = ? AND password = ?");
    $q->execute([$email, $password]);

    if ($q->rowCount()) {
        $user = $q->fetch(PDO::FETCH_ASSOC);

        add_session('id', $user['id']);
        add_session('name', $user['name']);
        add_session('surname', $user['surname']);
        add_session('fullname', $user['fullname']);
        add_session('email', $user['email']);
        add_session('login', true);

        return [
            'success' => true,
            'type' => 'success',
            'message' => 'Giriş Başarılı',
            'data' => $user,
            'redirect' => 'home'
        ];

    }else{
        return [
            'success' => false,
            'type' => 'danger',
            'message' => 'E-Posta adresi ya da şifreniz yanlış'
        ];
    }
}