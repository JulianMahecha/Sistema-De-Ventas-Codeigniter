<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ctlr_Ventas extends CI_Controller
{
    //Constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->model("ventas_model");
        $this->load->model("clientes_model");
    }

    public function index(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/ventas/vw_ventas_list');
        $this->load->view('layouts/footer');
    }

    public function add(){

        $data = array(
            "tipo_comprobantes" => $this->ventas_model->getComprobantes(),
            "clientes"=>$this->clientes_model->getClientes()
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/ventas/vw_ventas_add', $data);
        $this->load->view('layouts/footer');
    }

    public function store(){

    }
}