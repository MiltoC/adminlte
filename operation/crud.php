<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/adminlte/vendor/autoload.php';

class Crud extends DatabaseConexion {

    public function verificarUsuario($usuario, $contraseña) {
        try {
            $conexion = parent::Connect();
            $coleccion = $conexion->usuarios;

            // Buscar usuario y contraseña en la colección
            $usuarioEncontrado = $coleccion->findOne([
                'usuario' => $usuario,
                'contraseña' => $contraseña
            ]);

            // Retornar si el usuario fue encontrado o no
            return $usuarioEncontrado ? true : false;
        } catch (\Throwable $e) {
            return "Error: " . $e->getMessage();
        } catch (Exception $th) {
            return "Error: " . $th->getMessage();
        }
    }


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

    public function save($datos){
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->clientes;
            $respuesta = $coleccion->insertOne($datos);
            return $respuesta;
        }
        catch(\Throwable $e){
            return "Error: " . $e->getMessage();
        }
        catch(Exception $th){
            return "Error: " . $th->getMessage();
        }
        
    }

    public function saveUser($datos){
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->usuarios;
            $respuesta = $coleccion->insertOne($datos);
            return $respuesta;
        }
        catch(\Throwable $e){
            return "Error: " . $e->getMessage();
        }
        catch(Exception $th){
            return "Error: " . $th->getMessage();
        }
        
    }

    // Método para actualizar un documento por ID
    public function update($id, $datos){
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->clientes;
            $respuesta = $coleccion->updateOne(
                ['_id' => new MongoDB\BSON\ObjectId($id)],
                ['$set' => $datos]
            );
            return $respuesta;
        }
        catch(\Throwable $e){
            return "Error: " . $e->getMessage();
        }
    }

    // Método para obtener un solo documento por ID
    public function fetchDataById($id) {
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->clientes;
            $cliente = $coleccion->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
            return $cliente;
        }
        catch(\Throwable $e){
            return "Error: " . $e->getMessage();
        }
    }

    // Método para eliminar un documento por ID
    public function delete($id) {
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->clientes;
            $respuesta = $coleccion->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
            return $respuesta;
        }
        catch(\Throwable $e){
            return "Error: " . $e->getMessage();
        }
    }

}