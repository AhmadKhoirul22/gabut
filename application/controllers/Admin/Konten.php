<?php
class Konten extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('User_model');
		$this->load->model('Kategori_model');
		if($this->session->userdata('id_user') == null ){
			redirect('auth');
		}
	}
	public function index(){
		$data['title'] = 'Konten';

		$data['kategori'] = $this->Kategori_model->tampil();

		$data['konten'] = $this->Kategori_model->tampil_konten();

		$this->template->load('admin/template','admin/konten',$data);
	}

	public function tambah(){
		// foto
		$namafoto = date('YmdHis').'.jpg';
		$config['upload_path']          = 'assets/foto-konten/';
		$config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
		$config['allowed_types']        = '*';
		$config['file_name']            = $namafoto;
		$this->load->library('upload', $config);
		if($_FILES['foto']['size'] >= 5000 * 1024){
			$this->session->set_flashdata('notifikasi', '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<i class="bi bi-exclamation-triangle me-1"></i>
			ukuran file lebih dari 500kb ulangi upload dengan ukuran foto kurang dari 500kb
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>
					');
			redirect('admin/konten');  
		}  elseif( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
		}else{
			$data = array('upload_data' => $this->upload->data());
		} 
		// foto
		$this->db->from('konten')->where('judul',$this->input->post('judul'));
		$username = $this->db->get()->result_array();
		if($username != null){
			$this->session->set_flashdata('alert','<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
		judul sudah digunakan
		<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
	  	</div>');
		redirect($_SERVER['HTTP_REFERER']);
		}
		// $data = $this->User_model->inputan();
		$data = array(
			'judul' => $this->input->post('judul'),
			'keterangan' => $this->input->post('keterangan'),
			'foto_konten' => $namafoto,
			'id_kategori' => $this->input->post('id_kategori'),
			'tanggal' => date('Y-m-d'),
			'id_user' => $this->session->userdata('id_user')
		);
		$this->db->insert('konten',$data);
		$this->session->set_flashdata('alert','<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
		data berhasil ditambahkan
		<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
	  	</div>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete($id){
		$filename=FCPATH.'/assets/foto-konten/'.$id;
        if(file_exists($filename)){
            unlink("./assets/foto-konten/".$id);
        }
        $where = array(
                'foto_konten' => $id
                );
            $this->db->delete('konten', $where);
            $this->session->set_flashdata('alert','<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
		data berhasil dihapus
		<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
	  	</div>');
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>
