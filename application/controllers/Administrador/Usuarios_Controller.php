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

    public function index()
    {
        $data = array(
            'usuarios' => $this->usuarios_model->getUsuarios(),
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/usuarios/list', $data);
        $this->load->view('layouts/footer');
    }

    public function add()
    {
        $data = array(
            'roles' => $this->usuarios_model->getRoles(),
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/usuarios/add', $data);
        $this->load->view('layouts/footer');
    }

    public function store()
    {

        $nombres = $this->input->post("nombres");
        $apellidos = $this->input->post("apellidos");
        $telefono = $this->input->post("telefono");
        $email = $this->input->post("email");
        $usuario = $this->input->post("usuario");
        $password = $this->input->post("password");

        /* Validación del formulario */
        $this->form_validation->set_rules("nombres", "Nombres", "required[usuario.nombre]");
        $this->form_validation->set_rules("apellidos", "apellidos", "required[usuario.apellidos]");
        $this->form_validation->set_rules("telefono", "telefono", "required[usuario.telefono]");
        $this->form_validation->set_rules("email", "email", "required|is_unique[usuario.email]");
        $this->form_validation->set_rules("usuario", "usuario", "required|is_unique[usuario.user]");
        $this->form_validation->set_rules("password", "password", "min_length[5]|required[usuario.password]");

        if ($this->form_validation->run()) {

            if ($usuario && $password) {

                $data = array(

                    'nombres' => $nombres,
                    'apellidos' => $apellidos,
                    'telefono' => $telefono,
                    'email' => $email,
                    'user' => $usuario,
                    'password' => sha1($password),
                    'rol_id' => $this->input->post("rol"),
                    'estado' => "1"

                );

                if ($this->usuarios_model->setUsuario($data)) {

                    $error = array(
                        'error' => 0,
                    );

                    redirect(base_url()."administrador/Usuarios_Controller", $error);
                }
            } else {

                $error = array(
                    'error' => 1,
                );
                $this->load->view('layouts/header');
                $this->load->view('layouts/aside');
                $this->load->view('admin/usuarios/add', $error);
                $this->load->view('layouts/footer');
            }
        } else {
            $this->add();
        }
    }
}
