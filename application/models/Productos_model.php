<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Productos_model extends CI_Model
{

    public function getProductos()
    {

        $this->db->select("p.*, c.nombre as categoria");
        $this->db->from("producto p");
        $this->db->join("categoria c", "p.categoria_id = c.id");
        $this->db->where("p.estado", "1");
        $resultado = $this->db->get();

        return $resultado->result();
    }
}
