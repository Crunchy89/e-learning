<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('role_model', 'model');
	}

	public function index()
	{
		$data = [
			'judul' => 'Role'
		];
		$this->load->view('index', $data);
	}
	function getLists()
	{
		$data = array();

		// Fetch member's records
		$role = $this->model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($role as $d) {
			$i++;
			$btn_edit = '<button type="button" class="btn btn-warning btn-xs edit" data-role="' . $d->role . '" data-id_role="' . $d->id_role . '"><i class="fas fa-fw fa-pen"></i> Edit</button>';
			$btn_hapus = '<button type="button" class="btn btn-danger btn-xs hapus"  data-id_role="' . $d->id_role . '"><i class="fas fa-fw fa-trash"></i> Hapus</button>';
			$data[] = array($i, $d->role, $btn_edit . ' ' . $btn_hapus);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->model->countAll(),
			"recordsFiltered" => $this->model->countFiltered($_POST),
			"data" => $data,
		);
		echo json_encode($output);
	}
	public function aksi()
    {
        if ($_POST['aksi'] == 'tambah') {
            $data = $this->model->tambah();
            echo json_encode($data);
        } else if ($_POST['aksi'] == 'edit') {
            $data = $this->model->edit();
            echo json_encode($data);
        } else if ($_POST['aksi'] == 'hapus') {
            $data = $this->model->hapus();
            echo json_encode($data);
        }
    }
}
