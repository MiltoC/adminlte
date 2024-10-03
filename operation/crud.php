<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/adminlte/vendor/autoload.php';

class Crud extends DatabaseConexion {
    public function fetchData(){
        try{
            $connection = $this->connect();
            $collection = $connection->clientes;
            $documents = $collection->find();
            return $documents;
        }
        catch(\Throwable $e){
            return $e->getMessage();
        }
    }

}