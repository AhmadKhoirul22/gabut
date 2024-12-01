<?php
class User extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('User_model');
	}
	public function index(){
		$data['title'] = 'User';

		$this->db->from('user');
		$data['user'] = $this->db->get()->result_array();

		$this->template->load('admin/template','admin/user',$data);
	}

	public function tambah(){
		// foto
		$namafoto = date('YmdHis').'.jpg';
		$config['upload_path']          = 'assets/foto-user/';
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
			redirect('admin/produk');  
		}  elseif( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
		}else{
			$data = array('upload_data' => $this->upload->data());
		} 
		// foto
		$this->db->from('user')->where('username',$this->input->post('username'));
		$username = $this->db->get()->result_array();
		if($username != null){
			$this->session->set_flashdata('alert','<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
		username sudah digunakan
		<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
	  	</div>');
		redirect($_SERVER['HTTP_REFERER']);
		}
		// $data = $this->User_model->inputan();
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'foto' => $namafoto,
		);
		$this->db->insert('user',$data);
		$this->session->set_flashdata('alert','<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
		data berhasil ditambahkan
		<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
	  	</div>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete($id){
		$filename=FCPATH.'/assets/foto-user/'.$id;
        if(file_exists($filename)){
            unlink("./assets/foto-user/".$id);
        }
        $where = array(
                'foto' => $id
                );
            $this->db->delete('user', $where);
            $this->session->set_flashdata('alert','<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
		data berhasil dihapus
		<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
	  	</div>');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function update(){
		// foto update
		$namafoto = $this->input->post('nama_foto');
        $config['upload_path']          = 'assets/foto-user/';
        $config['max_size'] = 500 * 10000000024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['file_name']            = $namafoto;
        $config['overwrite']            = true;
        $config['allowed_types']        = '*';  
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 55555500 * 1024){
            $this->session->set_flashdata('alert', '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            ukuran file lebih dari 500kb ulangi upload dengan ukuran foto kurang dari 500kb
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                    ');
        } elseif( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        } 
		// end foto update
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			
		);
		$where = [
			'foto' => $namafoto
		];
		$this->db->update('user',$data,$where);
		$this->session->set_flashdata('alert','<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
		data berhasil diupdate
		<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
	  	</div>');
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>
