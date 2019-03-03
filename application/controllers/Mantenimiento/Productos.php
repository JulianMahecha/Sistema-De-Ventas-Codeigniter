<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("productos_model");
        $this->load->model("categorias_model");
    }


     //Clase Index

     public function index()
     {
         $data = array(
             'productos' => $this->productos_model->getProductos(),
         );
         $this->load->view('layouts/header');
         $this->load->view('layouts/aside');
         $this->load->view('admin/productos/list', $data);
         $this->load->view('layouts/footer');
     }

      //Metodo para añadir producto

    public function add()
    {
        $data = array(
            "categorias"=>$this->categorias_model->getCategorias(),
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/productos/add', $data);
        $this->load->view('layouts/footer');
    }

    //Metodo para editar

    public function edit($id)
    {

        $data = array(
            'producto' => $this->productos_model->getProducto($id),
            "categorias"=>$this->categorias_model->getCategorias(),
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/productos/edit', $data);
        $this->load->view('layouts/footer');
    }

    //Actualizar   
    
    public function update()
    {

        $id = $this->input->post('id');
        $nombre = $this->input->post("nombre");
        $codigo = $this->input->post("codigo");
        $precio = $this->input->post("precio");
        $stock = $this->input->post("stock");
        $categoria = $this->input->post("categoria");


        if ($nombre && $codigo && $precio && $stock >= 0 && $categoria) {
            $data = array(
                'codigo'=> $codigo,
                'nombre' => $nombre,
                'descripcion'=>$this->input->post("descripcion"),
                'precio'=> $precio,
                'stock' => $stock,
                'categoria_id' => $categoria,
                'estado' => "1"

            );

            if ($this->productos_model->updateProducto($data, $id)) {

                redirect(base_url() . "mantenimiento/Productos");
            }
        } else {
            $this->session->set_flashdata('error', 'no se pudo actualizar la informacion');
            redirect(base_url() . "mantenimiento/Productos/edit/" . $id);
        }
    }

    //Metodo que comunica la vista añadir cLIENTE con el controlador Clientes/store

    public function store()
    {

        $nombre = $this->input->post("nombre");
        $codigo = $this->input->post("codigo");
        $precio = $this->input->post("precio");
        $stock = $this->input->post("stock");
        $categoria = $this->input->post("categoria");


        if ($nombre && $codigo && $precio && $stock >= 0 && $categoria) {
            $data = array(
                'codigo'=> $codigo,
                'nombre' => $nombre,
                'descripcion'=>$this->input->post("descripcion"),
                'precio'=> $precio,
                'stock' => $stock,
                'categoria_id' => $categoria,
                'estado' => "1"

            );

            if ($this->productos_model->setProducto($data)) {

                $error = array(
                    'error' => 0,
                    "categorias"=>$this->categorias_model->getCategorias(),
                );

                $this->load->view('layouts/header');
                $this->load->view('layouts/aside');
                $this->load->view('admin/productos/add', $error);
                $this->load->view('layouts/footer');
            }
        } else {

            $error = array(
                'error' => 1,
                "categorias"=>$this->categorias_model->getCategorias(),
            );
            $this->load->view('layouts/header');
            $this->load->view('layouts/aside');
            $this->load->view('admin/productos/add', $error);
            $this->load->view('layouts/footer');
        }
    }
}