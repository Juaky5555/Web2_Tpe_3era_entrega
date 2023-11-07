<?php
    require_once 'app/views/api.view.php';
    class Controller {
        protected $view;
        protected $model;

        function __construct(){
            $this->model = new individuosModel();
            $this->view = new apiView();
        }
    }