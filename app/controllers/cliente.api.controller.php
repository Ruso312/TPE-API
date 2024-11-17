<?php

    require_once './app/models/cliente.model.php';
    require_once './app/views/api.view.php';

    class ClienteController {
        private $model;
        private $view;

        public function __construct() {
            $this->model = new ClienteModel();
            $this->view = new APIView();
        }

        public function verClientes($req){
            $orderadoPor = false;
            $direccion = false;

            if(isset($req->params->ordenadoPor)){
                $orderadoPor = $req->params->ordenadoPor;
            }
            if(isset($req->params->direccion)){
                $direccion = $req->params->direccion;
            }

            $clientes = $this->model->getClientes($direccion,$orderadoPor);

            if(!$clientes){
                return $this->view->response("No hay clientes disponibles",404);
            }

            return $this->view->response($clientes,200);
        }

        public function verCliente($req){
            $id = $req->params->id;

            $cliente = $this->model->getClienteByID($id);

            if(!$cliente){
                return $this->view->response("El cliente con el id = $id no existe",404);
            }
            return $this->view->response($cliente,200);
        }

        public function agregarCliente($req){
            if(empty($req->body->nombre) || empty($req->body->email)){
                return $this->view->response("Falta completar los datos",400);
            }

            $nombre = $req->body->nombre;
            $email = $req->body->email;

            $id = $this->model->agregarCliente($nombre,$email);

            if(!$id){
                return $this->view->response("Error al insertar el cliente",500);
            }

            $clienteAgregado = $cliente = $this->model->getClienteByID($id);
            return $this->view->response($clienteAgregado, 201);           
        }

        public function editarCliente($req){
            $id = $req->params->id;

            $cliente = $this->model->getClienteByID($id);

            if(!$cliente){
                return $this->view->response("El clientecon el id=$id no existe", 404);
            }

            if(empty($req->body->nombre) || empty($req->body->email)){
                return $this->view->response("Falta completar los datos",400);
            }

            $nombre = $req->body->nombre;
            $email = $req->body->email;

            $this->model->actualizarCliente($nombre,$email,$id);

            $cliente = $this->model->getClienteByID($id);
            return $this->view->response($cliente, 200);
        }

        public function eliminarCliente($req){
            $id = $req->params->id;

            $cliente = $this->model->getClienteByID($id);

            if(!$cliente){
                return $this->view->response("El cliente con el id = $id no existe",404);
            }
            
            $this->model->eliminarCliente($id);
            return $this->view->response("El cliente con el id = $id se elimino con exito",200);
        }
}