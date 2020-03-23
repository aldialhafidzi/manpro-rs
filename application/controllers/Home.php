<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'HOME | Manpro RS';
		$this->load->view('headers/login_header', $data);
		$this->load->view('pages/landing');
		$this->load->view('footers/login_footer');
	}
}
