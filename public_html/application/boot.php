<?php

    session_start();
    if(!empty($_SESSION['email']))
    {
        setcookie('userEmail', $_SESSION['email'], time()+86400*7);
    }
    else
    {
        setcookie('userEmail', $_SESSION['email'], time()-86400*7);
    }
    define('HOSTNAME', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DATABASE', '');

    $f = new PDO("mysql:dbname=" . DATABASE. ";host=" . HOSTNAME, USERNAME, PASSWORD);

    require_once 'core/Route.php';
    require_once 'core/Model.php';
    require_once 'core/View.php';
    require_once 'core/Controller.php';

    ss\application\core\Route::start(); // запускаем маршрутизатор