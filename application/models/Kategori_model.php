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
	public function tampil_konten(){
		$this->db->from('konten a');
		$this->db->join('kategori b','b.id_kategori = a.id_kategori','left');
		$this->db->join('user u','u.id_user = a.id_user','left');
		$konten = $this->db->get()->result_array();
		return $konten;
	}
}
?>
