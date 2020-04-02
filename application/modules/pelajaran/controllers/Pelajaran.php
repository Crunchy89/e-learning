<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelajaran extends MY_Controller
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
			$this->db->where('user_submenu.url', 'kelas');
			$access = $this->db->get()->result();
			if (!$access) {
				redirect('page');
			}
		}
		parent::__construct();
		$this->load->model('pelajaran_model', 'model');
	}

	public function index()
	{
		$data = [
			'title' => 'Mata Pelajaran'
		];
		$this->load->view('index', $data);
	}
	public function kelas($id)
	{
		$cek = $this->db->get_where('kelas', ['id_kelas' => $id])->row();
		$data = [
			'title' => $cek->kelas,
			'id' => $id
		];
		$this->load->view('kelas', $data);
	}
	// function getLists($id)
	// {
	// 	$data = array();
	// 	$menu = $this->model->getRows($_POST, $id);

	// 	$i = $_POST['start'];
	// 	foreach ($menu as $d) {
	// 		$i++;
	// 		$disabled = '';
	// 		if ($d->id_menu == 1) {
	// 			$disabled = 'disabled';
	// 		}
	// 		if ($d->is_active == 1) {
	// 			$active = '<input type="checkbox" ' . $disabled . ' name="active" class="form-control " data-id_submenu="' . $d->id_submenu . '" data-active="' . $d->is_active . '" form-control-sm" id="active" checked>';
	// 		} else {
	// 			$active = '<input type="checkbox" ' . $disabled . ' name="active" class="form-control " data-id_submenu="' . $d->id_submenu . '" data-active="' . $d->is_active . '" form-control-sm" id="active" >';
	// 		}
	// 		$order = '<button data-order="' . $d->no_urut . '" data-id_menu="' . $d->id_menu . '"  data-id_submenu="' . $d->id_submenu . '" class="btn btn-danger btn-xs down"><i class="fas fa-fw fa-arrow-down"></i></button> <button data-id_submenu="' . $d->id_submenu . '" data-order="' . $d->no_urut . '" data-id_menu="' . $d->id_menu . '" class="btn btn-success btn-xs up"><i class="fas fa-fw fa-arrow-up"></i></button>';
	// 		$icon = '<i class="' . $d->icon . '"></i>';
	// 		$btn_edit = '<button type="button" class="btn btn-warning btn-xs edit" data-icon="' . $d->icon . '" data-title="' . $d->title . '" data-url="' . $d->url . '" data-id_submenu="' . $d->id_submenu . '"><i class="fas fa-fw fa-pen"></i> Edit</button>';
	// 		$btn_hapus = '<button ' . $disabled . ' type="button" class="btn btn-danger btn-xs hapus"  data-id_submenu="' . $d->id_submenu . '"><i class="fas fa-fw fa-trash"></i> Hapus</button>';
	// 		$data[] = array($i, $d->title, $icon, $d->url, $order, $active, $btn_edit . ' ' . $btn_hapus);
	// 	}

	// 	$output = array(
	// 		"draw" => $_POST['draw'],
	// 		"recordsTotal" => $this->model->countAll(),
	// 		"recordsFiltered" => $this->model->countFiltered($_POST),
	// 		"data" => $data,
	// 	);
	// 	echo json_encode($output);
	// }
	// public function aksi()
	// {
	// 	if ($_POST['aksi'] == 'tambah') {
	// 		$data = $this->model->tambah();
	// 		echo json_encode($data);
	// 	} else if ($_POST['aksi'] == 'edit') {
	// 		$data = $this->model->edit();
	// 		echo json_encode($data);
	// 	} else if ($_POST['aksi'] == 'hapus') {
	// 		$data = $this->model->hapus();
	// 		echo json_encode($data);
	// 	}
	// }
}
