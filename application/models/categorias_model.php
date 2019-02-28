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

        public function setCategoria($data)
        {

                return $this->db->insert('categoria', $data);
        }
}
