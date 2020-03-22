<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model', 'model');
	}

	public function index()
	{
		$data = [
			'judul' => 'Menu'
		];
		$this->load->view('index', $data);
	}
	function getLists()
	{
		$data = array();
		$menu = $this->model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($menu as $d) {
			$i++;
			if ($d->is_active == 1) {
				$active = '<input type="checkbox" name="active" class="form-control " data-id_menu="' . $d->id_menu . '" data-active="' . $d->is_active . '" form-control-sm" id="active" checked>';
			} else {
				$active = '<input type="checkbox" name="active" class="form-control " data-id_menu="' . $d->id_menu . '" data-active="' . $d->is_active . '" form-control-sm" id="active" >';
			}
			$submenu = '<button type="button" class="btn btn-info btn-xs sub" data-id_menu="' . $d->id_menu . '"><i class="fas fa-fw fa-eye"></i> Submenu</button>';
			$icon = '<i class="' . $d->icon . '"></i>';
			$btn_edit = '<button type="button" class="btn btn-warning btn-xs edit" data-icon="' . $d->icon . '" data-title="' . $d->title . '" data-id_menu="' . $d->id_menu . '"><i class="fas fa-fw fa-pen"></i> Edit</button>';
			$btn_hapus = '<button type="button" class="btn btn-danger btn-xs hapus"  data-id_menu="' . $d->id_menu . '"><i class="fas fa-fw fa-trash"></i> Hapus</button>';
			$data[] = array($i, $d->title, $icon, $active, $submenu, $btn_edit . ' ' . $btn_hapus);
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
	public function active()
	{
		$data = $this->model->active();
		echo json_encode($data);
	}
	public function submenu($id)
	{
		$data = [
			'judul' => 'Submenu'
		];
		$this->load->view('submenu', $data);
	}
}
