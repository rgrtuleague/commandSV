<?php

    class Controller_main extends application\core\Controller
    {

        public function __construct()
        {
            $this->model = new Model_main();
            $this->view = new application\core\View();
        }

        public function action_index()
        {
            $this->view->generate('view_main.php', 'view_template.php');
        }
    }