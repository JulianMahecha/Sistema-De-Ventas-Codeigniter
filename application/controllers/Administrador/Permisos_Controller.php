<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permisos_Controller extends CI_Controller
{
    //Constructor
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
        $this->load->model("permisos_model");
        $this->load->model("usuarios_model");
        $this->accesos = $this->backend_lib->control();
    }

    public function index()
    {
        if(! $this->accesos->p_read){ redirect(base_url()); return; }
        $data = array(
            'permisos' => $this->permisos_model->getPermisos(),
            'accesos' => $this->accesos,
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/permisos/list', $data);
        $this->load->view('layouts/footer');
    }

    public function add()
    {

        $data = array(
            'roles' => $this->usuarios_model->getRoles(),
            'menus' => $this->permisos_model->getMenus(),
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/permisos/add', $data);
        $this->load->view('layouts/footer');
    }

    public function delete($id)
    {
        if(! $this->accesos->p_delete){ redirect(base_url()); return; }
        $this->permisos_model->delete($id);
        redirect(base_url() . "administrador/Permisos_Controller");
    }

    public function edit($id)
    {
        if(! $this->accesos->p_update){ redirect(base_url()); return; }
        $data  = array(
            'roles' => $this->usuarios_model->getRoles(),
            'menus' => $this->permisos_model->getMenus(),
            'permiso' => $this->permisos_model->getPermiso($id)
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("admin/permisos/edit", $data);
        $this->load->view("layouts/footer");
    }

    public function store()
    {
        $menu = $this->input->post("menu");
        $rol = $this->input->post("rol");
        $insert = $this->input->post("insert");
        $read = $this->input->post("read");
        $update = $this->input->post("update");
        $delete = $this->input->post("delete");

        $data = array(
            "menu_id" => $menu,
            "rol_id" => $rol,
            "p_read" => $read,
            "p_insert" => $insert,
            "p_update" => $update,
            "p_delete" => $delete,
        );

        if ($this->permisos_model->save($data)) {
            redirect(base_url() . "administrador/Permisos_Controller");
        } else {
            $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            redirect(base_url() . "administrado/Permisos_Controller/add");
        }
    }

    public function update()
    {
        $idpermiso = $this->input->post("idpermiso");
        $menu = $this->input->post("menu");
        $rol = $this->input->post("rol");
        $insert = $this->input->post("insert");
        $read = $this->input->post("read");
        $update = $this->input->post("update");
        $delete = $this->input->post("delete");

        $data = array(
            "p_read" => $read,
            "p_insert" => $insert,
            "p_update" => $update,
            "p_delete" => $delete,
        );

        if ($this->permisos_model->update($idpermiso, $data)) {
            redirect(base_url() . "administrador/Permisos_Controller");
        } else {
            $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            redirect(base_url() . "administrador/Permisos_Controller/edit/" . $idpermiso);
        }
    }
}
