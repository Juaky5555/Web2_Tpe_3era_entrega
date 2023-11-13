<?php
    require_once './app/controllers/api.controller.php';
    require_once './app/models/individuos.model.php';

    class individuosController extends apiController{ 
        private $modelIndividuos;

        function __construct(){
            parent::__construct();
            $this->modelIndividuos = new individuosModel();
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

        function getByOrder($params = []) {
            switch ($params[':ORDER']) {
                case 'asc':
                    $individuo = $this->modelIndividuos->obtenerIndividuosOrdenados($params[':ORDER']);
                    $this->view->response($individuo, 200);
                    break;
                case 'desc':
                    $individuo = $this->modelIndividuos->obtenerIndividuosOrdenados($params[':ORDER']);
                    $this->view->response($individuo, 200);
                    break;
                default:
                    $this->view->response('Parametro no reconocido', 400);
                    break;
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

        function getByAge($params = []) {
            $minEdad = isset($params[':MIN_AGE']) ? $params[':MIN_AGE'] : null;
            $maxEdad = isset($params[':MAX_AGE']) ? $params[':MAX_AGE'] : null;
        
            if ($minEdad !== null && $maxEdad !== null && is_numeric($minEdad) && is_numeric($maxEdad)) {
                $individuos = $this->modelIndividuos->obtenerIndividuosPorEdad($minEdad, $maxEdad);
                $this->view->response($individuos, 200);
            } else {
                $this->view->response('Parámetros de edad no válidos', 400);
            }
        }


        function getPaginated($params = []) {
            $numIndividuosPorPagina = $params[':NUM'];
            $ultimoIndividuoSolicitado = $params[':PAGE'];

            $ultimoIndividuoSolicitado = isset($params[':PAGE']) ? intval($params[':PAGE']) : 1;
            if ($ultimoIndividuoSolicitado < 1 || !is_numeric($ultimoIndividuoSolicitado)) {
                $this->view->response('Número de página no válido', 400);
                return; 
            }
        
            if ($numIndividuosPorPagina < 1 || !is_numeric($numIndividuosPorPagina)) {
                $this->view->response('Número de individuos por página no válido', 400);
                return;
            }
        
            $individuos = $this->modelIndividuos->obtenerIndividuosPaginados($numIndividuosPorPagina, $ultimoIndividuoSolicitado);
            if ($individuos) {
                $response = array(
                    'individuos' => $individuos,
                );

                $this->view->response($response, 200);
            } else {
                $this->view->response('No se encontraron individuos', 404);
            }
        }
    }