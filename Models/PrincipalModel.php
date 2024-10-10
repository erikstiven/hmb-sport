<?php
class PrincipalModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getProducto($id_producto)
    {
        $sql = "SELECT p.*, c.categoria FROM productos p INNER JOIN categorias c ON p.id_categoria = c.id WHERE p.id = $id_producto";
        return $this->select($sql);
    }

    public function getProductos($desde, $porPagina)
    {
        $sql = "SELECT * FROM productos LIMIT $desde, $porPagina";
        return $this->selectAll($sql);
    }

    //obetner el total de productos para la paginacion
    public function getTotalProductos()
    {
        $sql = "SELECT COUNT(*) as total FROM productos";
        return $this->select($sql);
    }

    //PRODUCTOS RELACIONADOS CON LAS CATEGORIAS

    public function getProductosCat($id_categoria, $desde, $porPagina)
    {
        $sql = "SELECT * FROM productos WHERE id_categoria = $id_categoria LIMIT $desde, $porPagina";
        return $this->selectAll($sql);
    }

    //obetener total productos relacionados con las categorias

    public function getTotalProductosCat($id_categoria)
    {
        $sql = "SELECT COUNT(*) as total FROM productos WHERE id_categoria = $id_categoria";
        return $this->select($sql);
    }

//PRODUCTOS RELACIONADOS ALEATORIAMENTE
    public function getAleatorios($id_categoria, $id_producto)
    {
        $sql = "SELECT * FROM productos WHERE id_categoria = $id_categoria  AND id != $id_producto ORDER BY RAND() LIMIT 20";
        return $this->selectAll($sql);
    }
}
