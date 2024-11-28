<?php
class CategoriasModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCategorias($estado)
    {
        $sql = "SELECT * FROM categorias WHERE estado = $estado";
        return $this->selectAll($sql);
    }
    //funcion registrar
    public function registrar($categoria, $imagen)
    {
        $sql = "INSERT INTO categorias(categoria, imagen) VALUES (?,?)";
        $array = array($categoria, $imagen);
        return $this->insertar($sql, $array);
        
    }
    //verificar correo
    public function verificarCategoria($categoria)
    {
        $sql = "SELECT  categoria FROM categorias WHERE categoria = '$categoria' AND estado = 1";
        return $this->select($sql);
    }
    //eliminar
    public function eliminar($idCat)
    {
        $sql ="UPDATE categorias SET estado = ? WHERE id = ?";//consulta
        $array = array(0, $idCat);//array
        return $this->save($sql, $array);//retorna el id
        
    }
    //
    public function getCategoria($idCat)
    {
        $sql = "SELECT * FROM categorias WHERE id = $idCat";
        return $this->select($sql);
    }

    public function modificar($categoria, $imagen, $id)
    {   
        $sql = "UPDATE categorias SET categoria=?, imagen=? WHERE id = ?";//consulta
        $array = array($categoria, $imagen, $id);//array
        return $this->save($sql, $array);//retorna el id
    }
}

