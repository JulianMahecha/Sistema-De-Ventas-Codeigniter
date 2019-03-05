<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clientes extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("clientes_model");
    }


    //Clase Index

    public function index()
    {
        $data = array(
            'clientes' => $this->clientes_model->getClientes(),
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/clientes/list', $data);
        $this->load->view('layouts/footer');
    }

    //Metodo para añadir cliente

    public function add()
    {

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/clientes/add');
        $this->load->view('layouts/footer');
    }

    //Metodo para eliminar
    public function delete($id)
    {
        $data = array(
            'estado' => '0'
        );

        $result = $this->clientes_model->removeCliente($id, $data);

        if ($result) {
            echo ("mantenimiento/Clientes");
        } else { }
    }


    //Metodo para editar

    public function edit($id)
    {

        $data = array(
            'cliente' => $this->clientes_model->getCliente($id),
            'tipo_clientes' => $this->clientes_model->getTipoClientes(),
            'tipo_documentos' => $this->clientes_model->getTipoDocumentos()
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/clientes/edit', $data);
        $this->load->view('layouts/footer');
    }

    //Metodo que comunica la vista añadir cLIENTE con el controlador Clientes/store

    public function store()
    {

        $nombres = $this->input->post("nombres");
        $apellidos = $this->input->post("apellidos");
        $telefono = $this->input->post("telefono");

        if ($nombres && $apellidos && $telefono) {
            $data = array(

                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'telefono' => $telefono,
                'direccion' => $this->input->post("direccion"),
                'rut' => $this->input->post("rut"),
                'empresa' => $this->input->post("empresa"),
                'estado' => "1"

            );

            if ($this->clientes_model->setCliente($data)) {

                $error = array(
                    'error' => 0,
                );

                $this->load->view('layouts/header');
                $this->load->view('layouts/aside');
                $this->load->view('admin/clientes/add', $error);
                $this->load->view('layouts/footer');
            }
        } else {

            $error = array(
                'error' => 1,
            );
            $this->load->view('layouts/header');
            $this->load->view('layouts/aside');
            $this->load->view('admin/clientes/add', $error);
            $this->load->view('layouts/footer');
        }
    }

    //Actualizar   

    public function update()
    {
        //Atributos
        $id = $this->input->post("id");
        $nombre = $this->input->post("nombre");
        $tipo_cliente = $this->input->post("tipo_cliente");
        $tipo_documento = $this->input->post("tipo_documento");
        $documento = $this->input->post("documento");
        
        /* Validando Formulario */
        $cliente_actual = $this->clientes_model->getCliente($id);
        if ($documento == $cliente_actual->num_documento) {
            $this->form_validation->set_rules('documento', 'Documento', 'required');
        }else{
            $this->form_validation->set_rules('documento', 'Documento', 'required|is_unique[cliente.num_documento]');
        }
        /* Iniciando validacion */
        if ($this->form_validation->run()) {
            if ($nombre && $tipo_documento && $tipo_cliente && $documento) {
                $data = array(
    
                    'nombres' => $nombre,
                    'direccion' => $this->input->post("direccion"),
                    'telefono' => $this->input->post("telefono"),
                    'direccion' => $this->input->post("direccion"),
                    'tipo_cliente_id' => $this->input->post("tipo_cliente"),
                    'num_documento' => $this->input->post("documento"),
                    'tipo_documento_id' => $this->input->post("tipo_documento")
    
                );
    
                if ($this->clientes_model->updateCliente($data, $id)) {
    
                    redirect(base_url() . "mantenimiento/Clientes");
                }
            } else {
                $this->session->set_flashdata('error', 'no se pudo actualizar la informacion');
                redirect(base_url() . "mantenimiento/clientes/edit/" . $id);
            }
        }$this->edit($id);
        
    }

    //Modal
    public function view($id)
    {

        $data = array(
            'cliente' => $this->clientes_model->getCliente($id),
        );
        $this->load->view("admin/clientes/view", $data);
    }
}

