<?php
class User_model extends CI_Model{
	public function inputan(){
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		);
		return $data;
	}

	public function tampil(){
		$this->db->from('user');
		$data = $this->db->get()->result_array();

		return $data;
	}
}
?>
