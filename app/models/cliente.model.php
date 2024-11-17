<?php


class ClienteModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=gimnasio;charset=utf8','root','');
    }

    public function getClientes($direccion, $ordenadoPor = false){
        $sql = 'SELECT * FROM cliente';
        
        if($ordenadoPor){
            $sql .= ' ORDER BY';
            switch($ordenadoPor){
                case 'nombre':
                    $sql .= ' nombre';
                    break;
                    case 'email':
                        $sql .= ' email';
                    break;
            }
        }

        if($direccion === 'ASC'){
            $sql .= ' ASC';
        }
        if($direccion === 'DESC'){
            $sql .= ' DESC';
        }

        $query = $this->db->prepare($sql);
        $query->execute();
        $clientes = $query->fetchAll(PDO::FETCH_OBJ);

        return $clientes;
    }

    public function getClienteByID($id){
        $query = $this->db->prepare('SELECT * FROM cliente WHERE id = ?');
        $query->execute([$id]);
        $cliente = $query->fetch(PDO::FETCH_OBJ);
        return $cliente;
    }

    public function eliminarCliente($id){
        //elimino los ejercicios asociados.
        $query = $this->db->prepare('DELETE FROM ejercicio WHERE cliente_id = ?');
        $query->execute([$id]);

        //elimino el cliente.
        $query = $this->db->prepare('DELETE FROM cliente WHERE id = ?');
        $query->execute([$id]);
        return true;
    }

    public function agregarCliente($nombre,$email){
        $query = $this->db->prepare('INSERT INTO cliente(nombre,email) VALUE(?,?)');
        $query->execute([$nombre,$email]);
        return $this->db->lastInsertId();
    }

    public function actualizarCliente($nombre,$email,$id){
        $query = $this->db->prepare('UPDATE cliente SET nombre = ?, email = ? WHERE id = ?');
        $query->execute([$nombre,$email,$id]);
        return true;
    }
}