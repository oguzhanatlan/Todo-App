<?php

const BASEDIR = 'C:\xampp\htdocs\todoapp';
const URL = 'http://localhost/todoapp/';
const DEV_MODE = false;

try {
    $db = new PDO('mysql:host=localhost;dbname=todoapp;', 'root', '');
}catch (Exception $e) {
    echo $e->getMessage();
}