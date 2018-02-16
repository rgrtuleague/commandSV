<?php

    class Controller_seaWar extends ss\application\core\Controller
    {

        public function __construct()
        {
            $this->model = new Model_seaWar();
            $this->view = new ss\application\core\View();
            $this->view->generate('view_seaWar.php', 'view_template.php');
            echo 's';
        }

        public function action_index()
        {
            $this->view->generate('view_seaWar.php', 'view_template.php');
        }
    }