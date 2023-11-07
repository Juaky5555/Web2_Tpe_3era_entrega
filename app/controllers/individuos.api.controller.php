<?php
require_once './app/models/individuosModel.php';
require_once './app/views/api.view.php';

class individuosController{ 
    private $view;
    private $model;

    function __construct(){
        $this->model = new individuosModel();
        $this->view = new apiView();
    }

    function get($params = []){
        if (empty($params)) {
            $individuos = $this->model->obtenerIndividuos();
            $this->view->response($individuos, 200);
        }else{
            $individuo = $this->model->obtenerIndividuoPorID($params[':ID']);
            if (!empty($individuo)) {
                $this->view->response($individuo, 200);
            }else{
                $this->view->response(['msj' => 'No existe ese individuo'], 404);
            }
        }
    }

    function delete($params = []){
        $id = $params[':ID'];
        $individuo = $this->model->obtenerIndividuoPorID($id);
        if ($individuo) {
            $this->model->borrarIndividuo($id);
            $this->view->response('Se borro el individuo', 200);
        }else{
            $this->view->response('No existe el individuo', 404);
        }
    }

    function add(){
        
    }
}