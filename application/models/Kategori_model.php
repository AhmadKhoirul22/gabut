<?php 
class Kategori_model extends CI_Model{
	public function tampil(){
		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();
		return $kategori;
	}
	public function crud(){
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori')
		);
		return $data;
	}
}
?>
