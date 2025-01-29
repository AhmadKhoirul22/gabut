<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('login');
	}
	public function login(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$this->db->from('user')->where('username',$username);
		$cek  = $this->db->get()->row();

		if($cek == null){
			$this->session->set_flashdata('alert','username');
			redirect($_SERVER['HTTP_REFERER']);
		} else if($cek->password == $password){
			$data = array(
				'nama' => $cek->nama,
				'username' => $cek->username,
				'id_user' => $cek->id_user,
				'foto' => $cek->foto,
			);
			$this->session->set_userdata($data);
			redirect('admin/dashboard');
		} else {
			$this->session->set_flashdata('alert','password');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}
}
