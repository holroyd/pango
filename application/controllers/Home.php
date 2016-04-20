<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{	
		$data['scripts_to_load'] = array('maintenance-feed.css','maintenance-feed.js','home.js');
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer', $data);
	}
}