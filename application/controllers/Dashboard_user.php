<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard_user extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_dashboard_user');
	}
	public function index()
	{
		$this->load->view('dashboard_user/dashboard');
	}
}
