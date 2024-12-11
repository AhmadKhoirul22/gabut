<?php 
class Kategori extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('Kategori_model');
		if($this->session->userdata('id_user') == null ){
			redirect('auth');
		}
	}
	public function index(){
		$data['title'] = 'Kategori';
		$data['kategori'] = $this->Kategori_model->tampil();
		$this->template->load('admin/template','admin/kategori',$data);
	}

	public function tambah(){
		$this->db->from('kategori')->where('nama_kategori',$this->input->post('nama_kategori'));
		$kategori = $this->db->get()->result_array();

		if($kategori != null){
			$this->session->set_flashdata('alert','warning');
		redirect($_SERVER['HTTP_REFERER']);
		}

		$data = $this->Kategori_model->crud();
		$this->db->insert('kategori',$data);
		$this->session->set_flashdata('alert','add');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function update(){
		$this->db->from('kategori')->where('nama_kategori',$this->input->post('nama_kategori'));
		$kategori = $this->db->get()->result_array();

		if($kategori != null){
			$this->session->set_flashdata('alert','warning');
		redirect($_SERVER['HTTP_REFERER']);
		}

		$data = $this->Kategori_model->crud();
		$where = array('id_kategori' => $this->input->post('id_kategori'));
		$this->db->update('kategori',$data,$where);
		$this->session->set_flashdata('alert','update');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function delete($id){
		$data = array('id_kategori' => $id);
		$this->db->delete('kategori',$data);
		$this->session->set_flashdata('alert','delete');
		redirect($_SERVER['HTTP_REFERER']);

	}
}
?>
