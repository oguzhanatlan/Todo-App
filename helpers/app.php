<?php

function route($index)
{
    global $config;

    if (isset($config['route'][$index])) {
        return $config['route'][$index];
    }else{
        return false;
    }
}

function view($viewName, $pageData = [])
{
    $data = $pageData;

    if (file_exists(BASEDIR.'/view/' . $viewName . '.php')) {
        require BASEDIR . '/view/' . $viewName . '.php';
    }else{
        return false;
    }
}

function assets($assetsName)
{
    if (file_exists(BASEDIR.'/public/' . $assetsName)) {
        return URL . 'public/' . $assetsName;
    }else{
        return false;
    }
}

function lang($text)
{
    global $lang;
    if (isset($lang[$text])) {
        return $lang[$text];
    }else{
        return $text;
    }
}

function add_session($index, $value)
{
    $_SESSION[$index] = $value;
}

function get_session($index)
{
    if (isset($_SESSION[$index])) {
        return $_SESSION[$index];
    }else{
        return false;
    }
}

function filter($field)
{
  return is_array($field)
      ? array_map('filter', $field)
      : htmlspecialchars(trim($field));
}

function post($index)
{
    if (isset($_POST[$index])) {
        return filter($_POST[$index]);
    }else{
        return false;
    }
}

function get($index)
{
    if (isset($_GET[$index])) {
        return filter($_GET[$index]);
    }else{
        return false;
    }
}

function get_cookie($index)
{
    if (isset($_COOKIE[$index])) {
        return trim($_COOKIE[$index]);
    }else{
        return false;
    }
}

function model($modelName, $pageData = [], $data_process = null)
{
    global $db;

    if ($data_process != null) $process = $data_process;
    $data = $pageData;

    if (file_exists(BASEDIR.'/model/' . $modelName . '.php')) {
        $return = require BASEDIR . '/model/' . $modelName . '.php';
        return $return;
    }else{
        return false;
    }
}

function redirect($link)
{
    global $config;

    header('Location: ' .URL.$config['lang'].'/'.$link);
}

function url($url)
{
    global $config;

    return URL.$config['lang'].'/'.$url;
}

function _p($data)
{
    echo '<pre style="position: absolute; left: 0; top: 0; z-index: 999999; width: 100%; height: 600px; background: #1d1d1d; color: greenyellow;">';
    print_r($data);
    echo '</pre>';
}