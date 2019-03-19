<?php
defined('BASEPATH') or exit('No direct script access allowed');

class usuarios_model extends CI_Model
{
	/* Comprueba Login Usuarios */
	public function login($user, $password)
	{

		$this->db->where("user", $user);
		$this->db->where("password", sha1($password));

		$result = $this->db->get("usuario");

		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return false;
		}
	}

	public function getUsuarios()
	{
		$this->db->select("u.*, r.nombre as rol");
		$this->db->from("usuario u");
		$this->db->join("rol r", "u.rol_id = r.id");
		$this->db->where("estado", "1");
		$resultado = $this->db->get();

		return $resultado->result();
	}

	public function getRoles()
	{
		$result = $this->db->get("rol");
		return $result->result();
	}

	public function setUsuario($data){
		return $this->db->insert("usuario", $data);
	}
}
