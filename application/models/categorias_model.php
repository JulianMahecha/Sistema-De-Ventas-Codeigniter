<?php
defined('BASEPATH') or exit('No direct script access allowed');

class categorias_model extends CI_Model
{
        /* Devuelve Categorias */
        public function getCategorias()
        {

                $this->db->where("estado", "1");
                $resultado = $this->db->get("categoria");

                return $resultado->result();
        }
        /* Devuelve categoria por id */
        public function getCategoria($id)
        {

                $this->db->where("id", $id);
                $resultado = $this->db->get("categoria");
                return $resultado->row();
        }
        /* Devuelve categorias deshabilitadas */
        public function getCategoriaDisabled()
        {

                $this->db->where("estado", "0");
                $resultado = $this->db->get("categoria");

                return $resultado->result();
        }
        /* Inserta categoria */
        public function setCategoria($data)
        {

                return $this->db->insert('categoria', $data);
        }
        /* Actualiza Categoria */
        public function updateCategoria($data, $id)
        {
                $this->db->where("id", $id);
                return $this->db->update('categoria', $data);
        }
        /* Cambia 'estado' de categoria a 0 */
        public function deleteCategoria($data, $id)
        {
                $this->db->where("id", $id);
                return $this->db->update('categoria', $data);
        }
        /* Cambia estado de categoria a 1 */
        public function setCategoriaEnabled($id, $data)
        {       
               
                $this->db->where("id", $id);
                return $this->db->update('categoria', $data);
        }
        
}
