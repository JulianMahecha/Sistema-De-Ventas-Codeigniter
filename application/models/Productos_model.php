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

    public function getProducto($id)
        {

                $this->db->where("id", $id);
                $resultado = $this->db->get("producto");
                return $resultado->row();
        }

        public function updateProducto($data, $id)
        {
                $this->db->where("id", $id);
                return $this->db->update('producto', $data);
        }

    public function setProducto($data)
    {

            return $this->db->insert('producto', $data);
    }
}
