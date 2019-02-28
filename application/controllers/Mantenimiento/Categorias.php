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

    public function disabled_cat()
    {
        $data = array(
            'categorias' => $this->categorias_model->getCategoriaDisabled(),
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/categorias/disabled', $data);
        $this->load->view('layouts/footer');
    }

    public function enable($id)
    {
        $data = array(
            'estado' => "1",
        );
        $this->categorias_model->setCategoriaEnabled($id, $data);

        redirect(base_url() . "mantenimiento/categorias");
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

            if ($this->categorias_model->setCategoria($data)) {

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

    //Metodo para editar

    public function edit($id)
    {

        $data = array(
            'categoria' => $this->categorias_model->getCategoria($id),
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/categorias/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update()
    {

        $id = $this->input->post("id");
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");

        if ($nombre && $descripcion) {
            $data = array(

                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'estado' => "1"

            );

            if ($this->categorias_model->updateCategoria($data, $id)) {

                redirect(base_url() . "mantenimiento/Categorias");
            }
        } else {
            $this->session->set_flashdata('error', 'no se pudo actualizar la informacion');
            redirect(base_url() . "mantenimiento/categorias/edit/" . $id);
        }
    }

    public function delete($id)
    {



        if ($id) {
            $data = array(

                'id' => $id,
                'estado' => "0"

            );

            if ($this->categorias_model->deleteCategoria($data, $id)) {

                redirect(base_url() . "mantenimiento/Categorias");
            }
        } else {
            $this->session->set_flashdata('error', 'no se pudo actualizar la informacion');
            redirect(base_url() . "mantenimiento/categorias");
        }
    }
}
