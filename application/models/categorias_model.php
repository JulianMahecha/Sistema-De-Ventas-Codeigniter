<?php
defined('BASEPATH') or exit('No direct script access allowed');

class categorias_model extends CI_Model
{

        public function getCategorias()
        {

                $this->db->where("estado", "1");
                $resultado = $this->db->get("categoria");

                return $resultado->result();
        }

        public function getCategoria($id)
        {

                $this->db->where("id", $id);
                $resultado = $this->db->get("categoria");
                return $resultado->row();
        }

        public function setCategoria($data)
        {

                return $this->db->insert('categoria', $data);
        }

        public function updateCategoria($data, $id)
        {
                $this->db->where("id", $id);
                return $this->db->update('categoria', $data);
        }
}
