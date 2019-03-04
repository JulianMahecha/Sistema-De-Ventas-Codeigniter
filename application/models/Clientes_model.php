<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clientes_model extends CI_Model
{
        /* Devuelve Clientes */
        public function getClientes()
        {

                $this->db->where("estado", "1");
                $resultado = $this->db->get("cliente");

                return $resultado->result();
        }
        /* Devuelve cliente por id */
        public function getCliente($id)
        {
            $this->db->where("id", $id);
            $resultado = $this->db->get("cliente");
            return $resultado->row(); 
        }
        /* Cambia 'estado' de cliente a 0 */
        public function removeCliente($id, $data)
        {
                $this->db->where("id", $id);
                return $this->db->update('cliente', $data);
        }
        /* Inserta cliente */       
        public function setCliente($data)
        {

                return $this->db->insert('cliente', $data);
        }
        /* Actualiza cliente */
        public function updateCliente($data, $id)
        {
                $this->db->where("id", $id);
                return $this->db->update('cliente', $data);
        }



}