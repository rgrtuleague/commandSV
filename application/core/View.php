<?php

    namespace application\core;

    class View
    {
        public function __construct()
        {

        }

        public function generate($content_view, $template_view, $data = null)
        {
            include 'application/views/' . $template_view;
        }
    }



