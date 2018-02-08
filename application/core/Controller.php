<?php

    namespace application\core;

    class Controller
    {

        /**
         * @var Model
         */
        public $model;
        /**
         * @var View
         */
        public $view;
        /**
         * @var string
         */
        /**
         * @var DB
         */

        public function __construct()
        {
            $this->view = new View();
        }
        public function action_index()
        {

        }

        static function sanitizeString($var)
        {
            $var = stripslashes($var); // избавляемся от нежелательных слеш-символов
            $var = strip_tags($var); // очистка от HTML(использовать до htmlentitiez)
            $var = htmlentities($var); // удаление любого HTML-кода
            return $var;
        }

        /*public function sanitizeMySQL($connection, $var)
        {
            $var = $connection->real_escape_string($var);
            $var = $this->sanitizeString($var);
            return $var;
        }*/

    }