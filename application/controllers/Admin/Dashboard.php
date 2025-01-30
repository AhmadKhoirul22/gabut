<?php
class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('Kategori_model');
		$this->load->model('User_model');
		if($this->session->userdata('id_user') == null ){
			redirect('auth');
		}
	}
	public function index(){
		$data['title'] = 'Dashboard';
		$this->template->load('admin/template','admin/dashboard',$data);
	}
}
?>
