<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model','model');
	}

	public function index()
	{
		$data=[
			'title'=>"Admin Page"
		];
		admin('index',$data);
	}
}
