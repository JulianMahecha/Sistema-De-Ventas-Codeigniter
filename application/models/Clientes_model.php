<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clientes_model extends CI_Model
{
        /* Devuelve Clientes */
        public function getClientes()
        {
                $this->db->select("c.*, tc.nombre as tipocliente, td.nombre as tipodocumento");
                $this->db->from("cliente c");
                $this->db->join("tipo_cliente tc", "c.tipo_cliente_id = tc.id");
                $this->db->join("tipo_documento td", "c.tipo_documento_id = td.id");
                $this->db->where("c.estado", "1");

                $resultado = $this->db->get();
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
        /* Devuelve Tipo de Clientes */
        public function getTipoClientes()
        {
                $resultado = $this->db->get("tipo_cliente");
                return $resultado->result();
        }
        /* Devuelve Tipo de Documentos */
        public function getTipoDocumentos()
        {
                $resultado = $this->db->get("tipo_documento");
                return $resultado->result();
        }

}