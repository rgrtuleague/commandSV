<?php

    namespace application\core;

    class Route
    {
        static function start()
        {

            // контроллер и действие по умолчанию
            $controller_name = 'main';
            $action_name = 'index';

            $routes = explode('/', $_SERVER['REQUEST_URI']);

            // получаем имя контроллера
            if ( !empty($routes[1]) )
            {
                $controller_name = $routes[1];
            }

            // получаем имя экшена
            if ( !empty($routes[2]) )
            {
                $action_name = $routes[2];
                /**
                 * А что если пришел GET-запрос?
                 */
                $t = $routes[2];
                if($t[0] === '?')
                {
                    $action_name = 'index';
                }
            }
            else if ($routes[1][0] === '?')
            {
                if(!empty($_GET))
                {
                    $action_name = 'index';
                    $controller_name = 'main';
                }
            }


            // добавляем префиксы
            $model_name = 'Model_'.$controller_name;
            $controller_name = 'Controller_'.$controller_name;
            $action_name = 'action_'.$action_name;


            $model_file = $model_name.'.php';
            $model_path = "application/models/".$model_file;
            if(file_exists($model_path))
            {
                include "application/models/".$model_file;
            }

            $controller_file = $controller_name.'.php';
            $controller_path = "application/controllers/".$controller_file;
            if(file_exists($controller_path))
            {
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
