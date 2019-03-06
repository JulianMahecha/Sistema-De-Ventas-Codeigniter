<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ventas_model extends CI_Model {

    /* Funcion que devuelve la tabla tipo_comprobante */
    public function getComprobantes(){
        $result = $this->db->get("tipo_comprobante");
        return $result->result();

    }

}