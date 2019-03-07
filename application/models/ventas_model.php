<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ventas_model extends CI_Model {

    /* Funcion que devuelve la tabla tipo_comprobante */
    public function getComprobantes(){
        $result = $this->db->get("tipo_comprobante");
        return $result->result();

    }

    /* Funcion que devuelve productos para campo Autocomplete*/
    public function getProductos($valor){
        $this->db->select("id, codigo, nombre as label, precio, stock");
        $this->db->from("producto");
        $this->db->like("nombre", $valor);

        $resultados = $this->db->get();

        return $resultados->result_array();
    }
}