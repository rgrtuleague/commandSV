<?php

    namespace ss\application\core;

    class Route
    {
        static function start()
        {
            // контроллер и действие по умолчанию
            $controller_name = 'main';
            $action_name = 'index';

            $routes = preg_split('/[\/?]/', $_SERVER['REQUEST_URI']);

            // получаем имя контроллера
            if ( !empty($routes[3]) )
            {
                $controller_name = $routes[3];
            }
echo '0-'.$routes[0].'<br>';
echo '1-'.$routes[1].'<br>';
echo '2-'.$routes[2].'<br>';
echo '3-'.$routes[3].'<br>';

            // получаем имя экшена
            if ( !empty($routes[4]) )
            {
                $action_name = $routes[4];

                 // А что если пришел GET-запрос?

                $t = $routes[4];
                if($t[0] === '?')
                {
                    $action_name = 'index';
                }
            }
            else if ($routes[3][0] === '?')
            {
                if(!empty($_GET))
                {
                    $action_name = 'index';
                    $controller_name = 'main';
                }
            }
            if ($routes[3] == 'index.php')
            {
                $controller_name = 'main';
            }
            echo 'contr_name = '. $controller_name .'<br>';


            // добавляем префиксы
            $model_name = 'Model_'.$controller_name;
            $controller_name = 'Controller_'.$controller_name;
            $action_name = 'action_'.$action_name;
echo 'modelName = '. $model_name . '<br>';

            $model_file = $model_name.'.php';
            $model_path = "application/models/".$model_file;
            if(file_exists($model_path))
            {
                include "application/models/".$model_file;
            }

            $controller_file = $controller_name.'.php';
            $controller_path = "application/controllers/".$controller_file;
echo $controller_path . '<br>';
            if(file_exists($controller_path))
            {
echo 'Путь контроллера существует!';
                include "application/controllers/".$controller_file;

                $controller = new $controller_name();
                $action = $action_name;

                if(method_exists($controller, $action))
                {

                    // вызываем действие контроллера
                    $controller->$action();
                }
            }

        }
    }
