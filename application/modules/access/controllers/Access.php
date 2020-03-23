<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access extends MY_Controller
{

	public function __construct()
	{
		if (!$this->session->userdata('role')) {
			redirect('auth');
		}
		if ($this->session->userdata('role')) {
			$this->db->select('*');
			$this->db->from('user_access');
			$this->db->join('user_submenu', 'user_access.id_menu=user_submenu.id_menu', 'inner');
			$this->db->where('user_access.id_role', $this->session->userdata('role'));
			$this->db->where('user_submenu.url', 'access');
			$access = $this->db->get()->result();
			if (!$access) {
				echo "access denied";
				die;
			}
		}
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
