<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model','model');
	}

	public function index()
	{
		auth('index');
	}
}
