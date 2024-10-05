<?php
declare(strict_types=1);

session_start();

require_once __DIR__.'/config/config.php';

if (DEV_MODE == true){
    error_reporting(E_ALL);

    ini_set('error_reporting', true);
}else{
    error_reporting(0);
    ini_set('error_reporting', false);
}

foreach (glob( BASEDIR . '/helpers/*.php') as $filename) {
    require $filename;
}



$config['route'][0] = 'home';
$config['lang'] = 'tr';

    if (isset($_GET['route'])) {

        preg_match('@(?<lang>\b[a-z]{2}\b)?/?(?<route>(.+))/?@', $_GET['route'], $result);

    }

    if (isset($result['lang'])) {

        if (file_exists(__DIR__.'/language/' . $result['lang'] . '.php')) {
            $config['lang'] = $result['lang'];
        }else{
            $config['lang'] = 'tr';
        }

        require_once BASEDIR.'/language/' . $config['lang'] . '.php';
    }


    if (isset($result['route'])) {
        $config['route'] = explode('/', $result['route']);
    }

require_once BASEDIR.'/language/' . $config['lang'] . '.php';

    if (file_exists(BASEDIR.'/Controller/' . $config['route'][0] . '.php')) {
        require_once BASEDIR.'/Controller/' . $config['route'][0] . '.php';
    }else{
        echo 'Sayfa Bulunamadı';
    }