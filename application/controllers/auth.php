<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {
    /* Constructor */
	public function __construct(){
        parent::__construct();
        $this->load->model("usuarios_model");
    }
    /* Indice */
	public function index()
	{
        if($this->session->userdata("login")){
            redirect(base_url()."dashboard");
        }else{
		    $this->load->view('admin/login');
        }
    }
    /* Login */
    public function login(){
        $user = $this->input->post("user");
        $password = $this->input->post("password");
        $res = $this->usuarios_model->login($user, $password);

        if(!$res){
            $this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
            redirect(base_url());
        }else{
            $data = array (
                'id' => $res->id,
                'nombre' => $res->nombres,
                'rol' => $res->rol_id,
                'login' => TRUE
            );
            $this->session->set_userdata($data);
            redirect(base_url()."dashboard");
        }
    }
    /* Logout */
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

}

