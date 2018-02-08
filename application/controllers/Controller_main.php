<?php

    class Controller_main extends application\core\Controller
    {

        public function __construct()
        {
            $this->model = new Model_main();
            $this->view = new application\core\View();
        }
    }