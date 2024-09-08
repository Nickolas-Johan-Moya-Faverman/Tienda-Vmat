<?php
class ClientienModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }
    public function getClientien()
    {
        $sql = "SELECT id, nombre, correo, clave, perfil FROM clientes";
        return $this->selectAll($sql);
    }
    public function registrarClien($nombre, $correo, $clave)
    {
        $sql = "INSERT INTO clientes (nombre, correo, clave) VALUES (?,?,?)";
        $array = array($nombre, $correo, $clave);
        return $this->insertar($sql, $array);
    }
    public function verificarCorreoClien($correo)
    {
        $sql = "SELECT correo FROM clientes WHERE correo = '$correo' AND estado = 1";
        return $this->select($sql);
    }
    public function eliminarClien($idClien)
    {
        $sql = "UPDATE clientes SET estado = ? WHERE id = ?";
        $array = array(0, $idClien);
        return $this->save($sql, $array);
    }
    public function getClient($idClien)
    {
        $sql = "SELECT id, nombre, correo, clave, perfil FROM clientes WHERE id = $idClien";
        return $this->select($sql);
    }
    public function modificarClien($nombre, $correo, $id)
    {
        $sql = "UPDATE clientes SET nombre = ?, correo = ? WHERE id = ?";
        $array = array($nombre, $correo, $id);
        return $this->save($sql, $array);
    }
}
?>