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
        return $this->db->where("id",  $idcomprobante);
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
    
}

