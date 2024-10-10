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
    
            // Si el usuario fue encontrado, retornar sus datos (incluido el rol)
            return $usuarioEncontrado;
        } catch (\Throwable $e) {
            return "Error: " . $e->getMessage();
        }
    }


    public function fetchClient(){
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

    public function fetchEmploye(){
        try{
            $connection = $this->connect();
            $collection = $connection->empleados;
            $documents = $collection->find();
            return $documents;
        }
        catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function fetchCategory(){
        try{
            $connection = $this->connect();
            $collection = $connection->categorias;
            $documents = $collection->find();
            return $documents;
        }
        catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function fetchProducts(){
        try{
            $connection = $this->connect();
            $collection = $connection->productos;
            $documents = $collection->find();
            return $documents;
        }
        catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function fetchPedidos(){
        try{
            $connection = $this->connect();
            $collection = $connection->pedidos;
            $documents = $collection->find();
            return $documents;
        }
        catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function fetchUser(){
        try{
            $connection = $this->connect();
            $collection = $connection->usuarios;
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

    public function saveEmpleado($datos){
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->empleados;
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

    public function savePedido($datos){
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->pedidos;
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

    public function saveCategory($datos){
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->categorias;
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

    public function saveProduct($datos) {
        try {
            $conexion = parent::Connect();
            $coleccion = $conexion->productos;
            $respuesta = $coleccion->insertOne($datos);
            return $respuesta;
        } 
        catch (\Throwable $e) {
            return "Error: " . $e->getMessage();
        } 
        catch (Exception $th) {
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
    public function updateClient($id, $datos){
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

    public function updateEmployee($id, $datos){
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->empleados;
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

    public function updateCategory($id, $datos){
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->categorias;
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

    public function updateProduct($id, $datos) {
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->productos;
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

    public function updatePedido($id, $datos) {
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->pedidos;
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

    public function updateUser($id, $datos) {
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->usuarios;
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
    public function fetchDataByIdClient($id) {
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

    public function fetchDataByIdEmployee($id) {
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->empleados;
            $empleado = $coleccion->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
            return $empleado;
        }
        catch(\Throwable $e){
            return "Error: " . $e->getMessage();
        }
    }

    public function fetchDataByIdCategory($id) {
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->categorias;
            $categoria = $coleccion->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
            return $categoria;
        }
        catch(\Throwable $e){
            return "Error: " . $e->getMessage();
        }
    }

    public function fetchDataByIdProduct($id) {
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->productos;
            $categoria = $coleccion->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
            return $categoria;
        }
        catch(\Throwable $e){
            return "Error: " . $e->getMessage();
        }
    }

    public function fetchDataByIdPedido($id) {
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->pedidos;
            $categoria = $coleccion->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
            return $categoria;
        }
        catch(\Throwable $e){
            return "Error: " . $e->getMessage();
        }
    }

    public function fetchDataByIdUser($id) {
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->usuarios;
            $categoria = $coleccion->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
            return $categoria;
        }
        catch(\Throwable $e){
            return "Error: " . $e->getMessage();
        }
    }

    // Método para eliminar un documento por ID
    public function deleteClient($id) {
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

    public function deleteEmployee($id) {
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->empleados;
            $respuesta = $coleccion->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
            return $respuesta;
        }
        catch(\Throwable $e){
            return "Error: " . $e->getMessage();
        }
    }

    public function deleteCategory($id) {
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->categorias;
            $respuesta = $coleccion->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
            return $respuesta;
        }
        catch(\Throwable $e){
            return "Error: " . $e->getMessage();
        }
    }

    public function deleteProduct($id) {
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->productos;
            $respuesta = $coleccion->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
            return $respuesta;
        }
        catch(\Throwable $e){
            return "Error: " . $e->getMessage();
        }
    }

    public function deletePedidos($id) {
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->pedidos;
            $respuesta = $coleccion->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
            return $respuesta;
        }
        catch(\Throwable $e){
            return "Error: " . $e->getMessage();
        }
    }


    public function deleteUser($id) {
        try{
            $conexion = parent::Connect();
            $coleccion = $conexion->usuarios;
            $respuesta = $coleccion->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
            return $respuesta;
        }
        catch(\Throwable $e){
            return "Error: " . $e->getMessage();
        }
    }
}