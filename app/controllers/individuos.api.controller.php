<?php
    require_once './app/controllers/api.controller.php';
    require_once './app/models/individuosModel.php';

    class individuosController extends apiController{ 
        private $model;

        function __construct(){
            parent::__construct();
            $this->model = new individuosModel();
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

        function add($params = []){
            $body = $this->getData();
            $nombre = $body->nombre;
            $raza = $body->raza;
            $color = $body->color;
            $edad = $body->edad;
            $personalidad = $body->personalidad;
            $especie = $body->fk_id_especie;
            $imagen = $body->imagen;

            $id = $this->model->insertarIndividuo($nombre, $raza, $edad, $color, $personalidad, $especie, $imagen);

            $this->view->response("El individuo fue insertado con el id: " . $id, 201);
        }

        function update($params = []){
            $id = $params[':ID'];
            $individuo = $this->model->obtenerIndividuoPorID($id);

            if($individuo){
                $body = $this->getData();
                $nombre = $body->nombre;
                $raza = $body->raza;
                $color = $body->color;
                $edad = $body->edad;
                $personalidad = $body->personalidad;
                $especie = $body->fk_id_especie;

                $this->model->modificarIndividuo($id, $nombre, $raza, $edad, $color, $personalidad, $especie);
                $this->view->response("Se actualizaron los datos del individuo con el id: " . $id, 200);
            } else {
                $this->view->response("No se encontro al individuo con el id: " . $id, 404);
            }
        }
        
    }