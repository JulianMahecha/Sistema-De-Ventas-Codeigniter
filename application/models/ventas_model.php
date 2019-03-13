<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ventas_model extends CI_Model
{

    /* Funcion que devuelve la tabla tipo_comprobante */
    public function getComprobantes()
    {
        $result = $this->db->get("tipo_comprobante");
        return $result->result();
    }

    /* Funcion que devuelve productos para campo Autocomplete*/
    public function getProductos($valor)
    {
        $this->db->select("id, codigo, nombre as label, precio, stock");
        $this->db->from("producto");
        $this->db->like("nombre", $valor);

        $resultados = $this->db->get();

        return $resultados->result_array();
    }
    /* Funcion que busca el ultimo id */
    public function getComprobante($idcomprobante)
    {
        $result = $this->db->get("tipo_comprobante");
        return $result->row();
    }
    /* Funcion para guardar la informacion de la venta*/
    public function save($data)
    {
        return $this->db->insert("venta", $data);
    }
    /* Funcion que busca el ultimo id */
    public function lastId()
    {
        return $this->db->insert_id();
    }
    /* Funcion actualiza comprobante*/
    public function updateComprobante($idcomprobante, $data)
    {
        $this->db->where("id", $idcomprobante);
        $this->db->update("tipo_comprobante", $data);
    }
    /* Funcion para guardar detalle*/
    public function saveDetalle($data)
    {
        $this->db->insert("detalle_venta", $data);
    }
    /* Devolviendo Ventas al la lista */
    public function getVentas()
    {
        $this->db->select("v.*, c.nombres, tc.nombre as tipocomprobante");
        $this->db->from("venta v");
        $this->db->join("cliente c", "v.cliente_id = c.id");
        $this->db->join("tipo_comprobante tc", "v.tipo_comprobante_id = tc.id");

        $resultados = $this->db->get();

        if ($resultados->num_rows() > 0) {
            return $resultados->result();
        } else {
            return false;
        }
    }
    /* Funcion para devolver Venta*/
    public function getVenta($id)
    {
        $this->db->select("v.*, c.nombres, c.telefono, c.direccion,c.num_documento as documento, 
            tc.nombre as tipocomprobante");
        $this->db->from("venta v");
        $this->db->join("cliente c", "v.cliente_id = c.id");
        $this->db->join("tipo_comprobante tc", "v.tipo_comprobante_id = tc.id");
        $this->db->where("v.id", $id);

        $resultado = $this->db->get();
        return $resultado->row();
    }
    /* Funcion para devolver detalle*/
    public function getDetalle($id)
    {
        $this->db->select("dt.*, p.codigo, p.nombre");
        $this->db->from("detalle_venta dt");
        $this->db->join("producto p", "dt.producto_id = p.id");
        $this->db->where("dt.venta_id", $id);
        $resultados = $this->db->get();
        return $resultados->result();

    }
}
