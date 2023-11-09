<?php
require_once './app/models/individuosModel.php';
require_once './app/views/apiView.php';

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




    
    function create() {
        // Obtén los datos del individuo a crear desde la solicitud
        $data = json_decode(file_get_contents('php://input'), true);

        // Valida los datos recibidos

        if (empty($data['nombre']) || empty($data['raza']) || empty($data['edad'])) {
            $this->view->response(['msj' => 'Faltan datos obligatorios'], 400);
            return;
        }

        // Llama al método del modelo para insertar el individuo en la base de datos
        $id = $this->model->insertarIndividuo(
            $data['nombre'],
            $data['raza'],
            $data['edad'],
            $data['color'],
            $data['personalidad'],
            $data['fk_id_especie']
        );

        if ($id) {
            $this->view->response(['msj' => 'Individuo creado', 'id' => $id], 201);
        } else {
            $this->view->response(['msj' => 'No se pudo crear el individuo'], 500);
        }
    }
    
    function update($params) {
        // Obtén los datos del individuo a actualizar desde la solicitud
        $data = json_decode(file_get_contents('php://input'), true);

        // Valida los datos recibidos

        if (empty($data['nombre']) || empty($data['raza']) || empty($data['edad'])) {
            $this->view->response(['msj' => 'Faltan datos obligatorios'], 400);
            return;
        }

        // Llama al método del modelo para actualizar el individuo en la base de datos
        $id = $params[':ID'];

        $individuoExistente = $this->model->obtenerIndividuoPorID($id);

        if ($individuoExistente) {
            $this->model->modificarIndividuo(
                $id,
                $data['nombre'],
                $data['raza'],
                $data['edad'],
                $data['color'],
                $data['personalidad'],
                $data['fk_id_especie']
            );

            $this->view->response(['msj' => 'Individuo actualizado'], 200);
        } else {
            $this->view->response(['msj' => 'No existe el individuo'], 404);
        }
    }
}
    