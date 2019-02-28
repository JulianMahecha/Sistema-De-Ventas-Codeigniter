<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categorias extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("categorias_model");
    }

    //Clase Index

    public function index()
    {
        $data = array(
            'categorias' => $this->categorias_model->getCategorias(),
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/categorias/list', $data);
        $this->load->view('layouts/footer');
    }

    //Metodo para añadir categoria

    public function add()
    {

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/categorias/add');
        $this->load->view('layouts/footer');
    }

    //Metodo que comunica la vista añadir categoria con el controlador store

    public function store()
    {

        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");

        if ($nombre && $descripcion) {
            $data = array(

                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'estado' => "1"

            );

            if($this->categorias_model->setCategoria($data)){

            $error = array(
                'error' => 0,
            );

            $this->load->view('layouts/header');
            $this->load->view('layouts/aside');
            $this->load->view('admin/categorias/add', $error);
            $this->load->view('layouts/footer');
            }

        } else {

            $error = array(
                'error' => 1,
            );
            $this->load->view('layouts/header');
            $this->load->view('layouts/aside');
            $this->load->view('admin/categorias/add', $error);
            $this->load->view('layouts/footer');
        }
    }
}
