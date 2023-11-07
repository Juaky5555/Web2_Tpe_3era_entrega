<?php
    require_once 'app/views/api.view.php';
    class apiController {
        protected $view;
        private $data;

        function __construct(){
            $this->view = new apiView();
            $this->data = file_get_contents('php://input');
        }

        function getData(){
            return json_decode($this->data);
        }
    }