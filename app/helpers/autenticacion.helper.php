<?php

class AutenticacionHelper {

    public static function inicializar() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user) {
        AutenticacionHelper::inicializar();
        $_SESSION['USER_ID'] = $user->id_usuario;
        $_SESSION['USER_NAME'] = $user->usuario;
    }

    public static function logout() {
        AutenticacionHelper::inicializar();
        session_destroy();
    }


    //FUNCION QUE PODRIA VERIFICAR QUE DEBAN LOGUEARSE ANTER DE ENTRAR A LA PAGINA
    /*
    public static function verify() {
        AutenticacionHelper::inicializar();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . 'login');
            die();
        }
    }
    */
}