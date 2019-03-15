<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rp_Ventas extends CI_Controller
{
    //Constructor
    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata("login")){
            redirect(base_url());
        }

        $this->load->model("ventas_model");
        
    }

    /* Index */
    public function index(){

        $fechafin = $this->input->post("fechafin");
        $fechainicio = $this->input->post("fechainicio");

        if ($this->input->post("buscar")) {
            $ventas = $this->ventas_model->getVentasPorFecha($fechainicio, $fechafin);
        }else{
            $ventas = $this->ventas_model->getVentas();
        }

        $data = array(
            "ventas" => $ventas,
            "fechainicio"=>$fechainicio,
            "fechafin"=>$fechafin,
        );


        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/reportes/vw_ventas_rp', $data);
        $this->load->view('layouts/footer');
    }


}