<?php 
class Kategori extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('Kategori_model');
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
			$this->session->set_flashdata('alert','<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
		nama kategori sudah digunakan
		<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
	  	</div>');
		redirect($_SERVER['HTTP_REFERER']);
		}

		$data = $this->Kategori_model->crud();
		$this->db->insert('kategori',$data);
		$this->session->set_flashdata('alert','<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
		nama kategori berhasil ditambahkan
		<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
	  	</div>');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function update(){
		$this->db->from('kategori')->where('nama_kategori',$this->input->post('nama_kategori'));
		$kategori = $this->db->get()->result_array();

		if($kategori != null){
			$this->session->set_flashdata('alert','<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
		nama kategori sudah digunakan
		<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
	  	</div>');
		redirect($_SERVER['HTTP_REFERER']);
		}

		$data = $this->Kategori_model->crud();
		$where = array('id_kategori' => $this->input->post('id_kategori'));
		$this->db->update('kategori',$data,$where);
		$this->session->set_flashdata('alert','<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
		nama kategori berhasil diupdate
		<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
	  	</div>');
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>
