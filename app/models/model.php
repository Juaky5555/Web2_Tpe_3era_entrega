<?php
    class model {
        protected $db;

        function __construct(){
            $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
            $this->deploy();
        }

        function deploy(){
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll();
            if(count($tables) == 0) {
                $sql = file_get_contents("./sql/db_veterinaria_sin_imagenes.sql");
                $this->db->query($sql);
            }
        }
    }