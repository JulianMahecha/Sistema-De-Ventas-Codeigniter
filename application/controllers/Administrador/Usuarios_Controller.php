<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios_Controller extends CI_Controller
{
    //Constructor
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }

        $this->load->model("usuarios_model");
        $this->load->model("clientes_model");
        $this->load->model("productos_model");
    }

    public function index (){
        $data = array(
            'usuarios' => $this->usuarios_model->getUsuarios(),
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/usuarios/list', $data);
        $this->load->view('layouts/footer');
    }
}

