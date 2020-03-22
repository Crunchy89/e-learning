<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{

	public function __construct()
	{
		if (!$this->session->userdata('role')) {
			redirect('auth');
		}
		parent::__construct();
		$this->load->model('admin_model', 'model');
	}

	public function index()
	{
		$data = [
			'title' => "Admin Page"
		];
		admin('index', $data);
	}
	public function menu(){
		$data=$this->model->menu();
		echo json_encode($data);
	}
	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('id');
		$this->session->sess_destroy();
		redirect('auth');
	}
}
