<?php
    require_once './app/controllers/api.controller.php';
    require_once './app/models/consultas.model.php';

    class consultasController extends apiController{ 
        private $modelConsultas;

        function __construct(){
            parent::__construct();
            $this->modelConsultas = new consultasModel();
        }

        function getConsultas($params = []) {
            if (empty($params)) {
                $consultas = $this->modelConsultas->obtenerConsultas();
                $this->view->response($consultas, 200);
            } else {
                if (is_numeric($params[':ID'])) {
                    $consultas = $this->modelConsultas->obtenerConsultaPorID($params[':ID']);
                    if (!empty($consultas)) {
                        $this->view->response($consultas, 200);
                    } else {
                        $this->view->response('No existe ese consultas', 404);
                    }
                } else {
                    $this->view->response('Parametros no reconocido', 400);
                }
            }
        }
        
        function addConsulta($params = []){
            $body = $this->getData();
            $consulta = $body->consulta;
            $fk_id_individuo = $body->fk_id_individuo;

            $this->modelConsultas->insertarConsulta($consulta, $fk_id_individuo);
            $this->view->response("Se ingreso correctamente la consulta", 201);
        }

        

        function deleteConsulta($params = []){
            if (is_numeric($params[':ID'])) {
                $id = $params[':ID'];
                $consulta = $this->modelConsultas->obtenerConsultaPorID($id);
                if ($consulta) {
                    $this->modelConsultas->deleteConsulta($id);
                    $this->view->response('Se borro la consulta', 200);
                } else {
                    $this->view->response('No existe la consulta', 404);
                }
            } else {
                $this->view->response('Parametros no reconocidos', 400);
            }
        }
        function updateConsulta($params = []){
            if (is_numeric($params[':ID'])) {
                $id = $params[':ID'];
                $consul = $this->modelConsultas->obtenerConsultaPorID($id);

                if($consul){
                    $body = $this->getData();
                    $consulta = $body->consulta;
                    $fk_id_individuo = $body->fk_id_individuo;

                    $this->modelConsultas->updateConsulta($id, $consulta, $fk_id_individuo);
                    $this->view->response("Se actualizaron los datos de la consulta con el id: " . $id, 200);
                } else {
                    $this->view->response("No se encontro la consulta con el id: " . $id, 404);
                }
            } else {
                $this->view->response('Parametros no reconocido', 400);
            }
        }

    }