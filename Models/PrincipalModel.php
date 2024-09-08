<?php
class PrincipalModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }
    public function getProducto($id_producto)
    {
        $sql = "SELECT p.*, c.categoria FROM productos1 p INNER JOIN categorias c ON p.id_categoria = c.id WHERE p.id = $id_producto";
        return $this->select($sql);
    }
    //Creacion de paginas
    public function getProductos($desde, $porPagina)
    {
        $sql = "SELECT * FROM productos1 LIMIT $desde, $porPagina";
        return $this->selectAll($sql);
    }
    //Obtener el total de los productos
    public function getTotalProductos()
    {
        $sql = "SELECT COUNT(*) AS total FROM productos1";
        return $this->select($sql);
    }
    //Productos relacionados con la categoria
    public function getProductosCat($id_categoria, $desde, $porPagina)
    {
        $sql = "SELECT * FROM productos1 WHERE id_categoria = $id_categoria LIMIT $desde, $porPagina";
        return $this->selectAll($sql);
    }
    //Obtener el total de los productos relacionados con la categoria
    public function getTotalProductosCat($id_categoria)
    {
        $sql = "SELECT COUNT(*) AS total FROM productos1 WHERE id_categoria = $id_categoria";
        return $this->select($sql);
    }
    //Productos relacionados aleatorios
    public function getAleatorios($id_categoria, $id_producto)
    {
        $sql = "SELECT * FROM productos1 WHERE id_categoria = $id_categoria AND id != $id_producto ORDER BY RAND() LIMIT 20";
        return $this->selectAll($sql);
    }
    //Obtener los productos a partir de la lista de deseos
    public function getListaDeseo($id_producto)
    {
        $sql = "SELECT * FROM productos1 WHERE id = $id_producto";
        return $this->select($sql);
    }
    //Busqueda de productos
    public function getBusqueda($valor)
    {
        $sql = "SELECT * FROM productos1 WHERE nombre LIKE '%".$valor."%' OR descripcion LIKE '%".$valor."%' LIMIT 9 ";
        return $this->selectAll($sql);
    }
}
?>