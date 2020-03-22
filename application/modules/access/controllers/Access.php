<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('access_model', 'model');
	}

	public function index()
	{
		$data = [
			'judul' => 'Access',
			'role' => $this->db->get('user_role')->result(),
			'menu' => $this->db->get('user_menu')->result()
		];
		$this->load->view('index', $data);
	}
	public function aksi()
	{
		$data = $this->model->aksi();
		echo json_encode($data);
	}
}
