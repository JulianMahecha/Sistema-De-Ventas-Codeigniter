<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ctlr_Ventas extends CI_Controller
{
    //Constructor
    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata("login")){
            redirect(base_url());
        }
        
        $this->load->model("ventas_model");
        $this->load->model("clientes_model");
        $this->load->model("productos_model");
        
    }

    public function index()
    {
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/ventas/vw_ventas_list');
        $this->load->view('layouts/footer');
    }

    public function add()
    {

        $data = array(
            "tipo_comprobantes" => $this->ventas_model->getComprobantes(),
            "clientes" => $this->clientes_model->getClientes()
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/ventas/vw_ventas_add', $data);
        $this->load->view('layouts/footer');
    }

    public function getProductos()
    {

        $valor = $this->input->post("valor");
        $clientes = $this->ventas_model->getProductos($valor);
        echo json_encode($clientes);
    }
    /* Funcion Store */
    public function store()
    {
        $fecha = $this->input->post("fecha");
        $subtotal = $this->input->post("subtotal");
        $iva = $this->input->post("iva");
        $descuento = $this->input->post("descuento");
        $total = $this->input->post("total");
        $idcomprobante = $this->input->post("idcomprobante");
        $idcliente = $this->input->post("id");
        $idusuario = $this->session->userdata("id");
        $numero = $this->input->post("numero");
        $serie = $this->input->post("serie");

        $idproductos = $this->input->post("idproductos");
        $precios = $this->input->post("precios");
        $cantidades = $this->input->post("cantidades");
        $importes = $this->input->post("importes");

        $data = array(
            'fecha' => $fecha,
            'subtotal' => $subtotal,
            'iva' => $iva,
            'descuento' => $descuento,
            'total' => $total,
            'tipo_comprobante_id' => $idcomprobante,
            'cliente_id' => $idcliente,
            'usuario_id' => $idusuario,
            'num_documento' => $numero,
            'serie' => $serie,
        );

        if ($this->ventas_model->save($data)) {
            $idventa = $this->ventas_model->lastId();
            $this->updateComprobante($idcomprobante);
            $this->save_detalle($idproductos, $idventa, $precios, $cantidades, $importes);
            redirect(base_url)."movimientos/ventas";
        } else {
            redirect(base . url() . "movimientos/ventas/add");
        }
    }

    /*  */
    protected function updateComprobante($idcomprobante)
    {
        $comprobanteActual = $this->ventas_model->getComprobante($idcomprobante);

        $data = array(
            'cantidad' => $comprobanteActual->cantidad + 1,
        );

        $this->ventas_model->updateComprobante($idcomprobante, $data);
    }

    /*  */
    protected function save_detalle($productos, $idventa, $precios, $cantidades, $importes)
    {
        for ($i = 0; $i < count($productos); $i++) {
            $data = array(
                'producto_id' => $productos[$i],
                'venta_id' => $idventa,
                'precio' => $precios[$i],
                'cantidad' => $cantidades[$i],
                'importe' => $importes[$i],
            );

            $this->ventas_model->saveDetalle($data);
            $this->updateProducto($productos[$i], $cantidades[$i]);
        }
    }

    protected function updateProducto($producto, $cantidad){
        $productoActual = $this->productos_model->getProducto($producto);

        $data = array(
            'stock' => $productoActual->stock - $cantidad,
        );

        $this->productos_model->updateProducto($producto, $data);
    }
}
