<?php
class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}
	public function index(){
		$data['title'] = 'Dashboard';
		$this->template->load('admin/template','admin/dashboard',$data);
	}
}
?>
