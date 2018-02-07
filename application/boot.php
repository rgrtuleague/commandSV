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
    //define('HOSTNAME', 'localhost');
    //define('USERNAME', '');
    //define('PASSWORD', '');
    //define('DATABASE', '');



    //$f = new PDO("mysql:dbname=" . DATABASE. ";host=" . HOSTNAME, USERNAME, PASSWORD);

    //ss\application\core\Route::start();

    require_once 'core/model.php';
    require_once 'core/view.php';
    require_once 'core/Controller.php';
    require_once 'core/route.php';
    Route::start(); // запускаем маршрутизатор