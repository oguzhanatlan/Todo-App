<?php

if(route(0) == 'login'){

    if (isset($_POST['submit'])){

        add_session('hata', 'Mesajınız eklendi');
        echo $eposta = post('eposta');
        echo $password = post('password');
    }
    view('auth/login');
}