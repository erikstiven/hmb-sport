<?php
class Principal extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        
    }

    //VISTA ABOUT
    public function about()
    {
        $data['title'] = 'Nuestro Equipo';
        $this->views->getView('principal', "about", $data);
    }

    //VISTA SHOP
    public function shop($page)
    {

        $pagina = (empty($page)) ? 1 : $page;
        $porPagina = 21;
        $desde = ($pagina - 1) * $porPagina;
        $data['title'] = 'Nuestros Productos';
        $data['productos'] = $this->model->getProductos($desde, $porPagina);
        $data['pagina'] = $pagina;
        $total = $this->model->getTotalProductos();
        $data['total'] = ceil($total ['total'] / $porPagina);
        $this->views->getView('principal', "shop", $data);
    }

    //VISTA DETAILS
    public function detail($id_producto)
    {
        $data['producto'] = $this->model->getProducto($id_producto);
        $data['title'] = $data['producto']['nombre'];
        $this->views->getView('principal', "Shop-single", $data);
    }

     //VISTA CATEGORIAS
     public function categorias($datos)
     {
        $id_categoria = 1; // inicializo la variable id_categoria a 1
        $page = 1; // inicializo la variable page a 1
        $array = explode(',', $datos); // separo los datos para saber si hay id_categoria y page
        if (isset($array[0])){// si hay id_categoria
            if (!empty($array[0])){
                $id_categoria = $array[0];
            }
        }
        if (isset($array[1])){// si hay page
            if (!empty($array[1])){
                $page = $array[1];
            }
        }
        $pagina = (empty($page)) ? 1 : $page;
        $porPagina = 15;
        $desde = ($pagina - 1) * $porPagina;

        $data['pagina'] = $pagina;
        $total = $this->model->getTotalProductosCat($id_categoria);
        $data['total'] = ceil($total ['total'] / $porPagina);

         $data['productos'] = $this->model->getProductosCat($id_categoria, $desde, $porPagina);
         $data['title'] = 'Categorias';
         $this->views->getView('principal', "categorias", $data);
     }

    //VISTA CONTACT
    public function contact()
    {
        $data['title'] = 'Contactanos';
        $this->views->getView('principal', "contact", $data);
    }

   

}