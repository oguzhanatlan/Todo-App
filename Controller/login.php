<?php

if (get_session('login') && get_session('login') == true) redirect('home');

if(route(0) == 'login'){

    if (isset($_POST['submit'])){
        $_SESSION['post'] = $_POST;

        $eposta = post('eposta');
        $password = post('password');

        $return = model('auth/login', ['email' => $eposta,'password' => $password], 'login');

        if ($return['success'] == true){

            add_session('error',[
                'message' => $return['message'] ?? '',
                'type' => $return['type'] ?? ''
            ]);
            if (isset($return['redirect'])){
                redirect($return['redirect']);
            }

        }else{
            add_session('error',[
                'message' => $return['message'] ?? '',
                'type' => $return['type'] ?? ''
            ]);
        }
    }

    view('auth/login');
}
