<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/adminlte/vendor/autoload.php';

class DatabaseConexion{ // Corregido el nombre de la clase
    private $host = "127.0.0.1";
    private $username = "admin";
    private $password = "1234";
    private $database = "cafeteria";
    private $port = "27017";

    private function getConnectionString(){
        return sprintf(
            'mongodb://%s:%s@%s:%s/%s',
            $this->username,
            $this->password,
            $this->host,
            $this->port,
            $this->database
        );  
    }

    public function Connect(){
        try{
            $connectionString = $this->getConnectionString(); // Corregido el nombre de la variable
            $client = new MongoDB\Client($connectionString);
            return $client->selectDatabase($this->database);
        }
        catch(\MongoDB\Exception\Exception $exception){ // Capturar excepciones específicas
            return $exception->getMessage();
        }
    }
}

$dbConnection = new DatabaseConexion(); // Corregido el nombre de la clase
//var_dump($dbConnection->Connect());

?>
