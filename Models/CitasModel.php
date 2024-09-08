<?php
class CitasModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }
    public function getCitas($estado)
    {
        $sql = "SELECT * FROM mensajes WHERE estado = $estado";
        return $this->selectAll($sql);
    }
    public function registrar($nombre, $email, $direccion, $mensaje)
    {
        $sql = "INSERT INTO mensajes (nombre, email, direccion, mensaje) VALUES (?,?,?,?)";
        $array = array($nombre, $email, $direccion, $mensaje);
        return $this->insertar($sql, $array);
    }
}
?>