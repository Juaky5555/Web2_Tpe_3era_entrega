<?php
    require_once './app/controllers/api.controller.php';
    require_once './app/models/individuos.model.php';
    require_once './app/models/consultas.model.php';

    class individuosController extends apiController{ 
        private $modelIndividuos;
        private $modelConsultas;

        function __construct(){
            parent::__construct();
            $this->modelIndividuos = new individuosModel();
            $this->modelConsultas = new consultasModel();
        }

        function get($params = []) {
            if (empty($params)) {
                $individuos = $this->modelIndividuos->obtenerIndividuos();
                $this->view->response($individuos, 200);
            } else {
                if (is_numeric($params[':ID'])) {
                    $individuo = $this->modelIndividuos->obtenerIndividuoPorID($params[':ID']);
                    if (!empty($individuo)) {
                        $this->view->response($individuo, 200);
                    } else {
                        $this->view->response('No existe ese individuo', 404);
                    }
                } else {
                    $this->view->response('Parametros no reconocido', 400);
                }
            }
        }

        function delete($params = []){
            if (is_numeric($params[':ID'])) {
                $id = $params[':ID'];
                $individuo = $this->modelIndividuos->obtenerIndividuoPorID($id);
                if ($individuo) {
                    $this->modelIndividuos->borrarIndividuo($id);
                    $this->view->response('Se borro el individuo', 200);
                } else {
                    $this->view->response('No existe el individuo', 404);
                }
            } else {
                $this->view->response('Parametros no reconocido', 400);
            }
        }


        function add($params = []){
            $body = $this->getData();
            $nombre = $body->nombre;
            $raza = $body->raza;
            $color = $body->color;
            $edad = $body->edad;
            $personalidad = $body->personalidad;
            $especie = $body->fk_id_especie;
            $imagen = $body->imagen;

            $id = $this->modelIndividuos->insertarIndividuo($nombre, $raza, $edad, $color, $personalidad, $especie, $imagen);

            $this->view->response("El individuo fue insertado con el id: " . $id, 201);
        }

        function update($params = []){
            if (is_numeric($params[':ID'])) {
                $id = $params[':ID'];
                $individuo = $this->modelIndividuos->obtenerIndividuoPorID($id);

                if($individuo){
                    $body = $this->getData();
                    $nombre = $body->nombre;
                    $raza = $body->raza;
                    $color = $body->color;
                    $edad = $body->edad;
                    $personalidad = $body->personalidad;
                    $especie = $body->fk_id_especie;

                    $this->modelIndividuos->modificarIndividuo($id, $nombre, $raza, $edad, $color, $personalidad, $especie);
                    $this->view->response("Se actualizaron los datos del individuo con el id: " . $id, 200);
                } else {
                    $this->view->response("No se encontro al individuo con el id: " . $id, 404);
                }
            } else {
                $this->view->response('Parametros no reconocido', 400);
            }
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

            $id = $this->modelConsultas->insertarConsulta($consulta, $fk_id_individuo);

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