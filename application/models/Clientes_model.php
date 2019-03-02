<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clientes_model extends CI_Model
{

        public function getClientes()
        {

                $this->db->where("estado", "1");
                $resultado = $this->db->get("cliente");

                return $resultado->result();
        }

        public function getCliente($id)
        {
            $this->db->where("id", $id);
            $resultado = $this->db->get("cliente");
            return $resultado->row(); 
        }

        public function removeCliente($id, $data)
        {
                $this->db->where("id", $id);
                return $this->db->update('cliente', $data);
        }
        
        public function setCliente($data)
        {

                return $this->db->insert('cliente', $data);
        }

        public function updateCliente($data, $id)
        {
                $this->db->where("id", $id);
                return $this->db->update('cliente', $data);
        }



}