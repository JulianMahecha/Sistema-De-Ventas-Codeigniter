<?php
defined('BASEPATH') or exit('No direct script access allowed');

class usuarios_model extends CI_Model
{
	/* Comprueba Login Usuarios */
	public function login($user, $password)
	{

		$this->db->where("user", $user);
		$this->db->where("password", $password);

		$result = $this->db->get("usuario");

		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return false;
		}
	}

	public function getUsuarios()
	{
		$this->db->where("estado", "1");
		$resultado = $this->db->get("usuario");

		return $resultado->result();
	}
}
