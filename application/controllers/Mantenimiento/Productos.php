<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("productos_model");
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

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/productos/add');
        $this->load->view('layouts/footer');
    }
}