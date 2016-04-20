<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends CI_Controller {

	public function index() {
		$data['scripts_to_load'] = array('maintenance.js');
		$data['base_url'] = base_url();
		$this->load->view('header', $data);
		$this->load->view('maintenance');
		$this->load->view('footer', $data);
	}

	public function json_feed(){	
		$query = $this->db->query('select maintenance_date_str, person_id, person_name, maintenance_type, bike_id, bike_name, component_name from bike_maintenance_feed_vw order by maintenance_date desc');
		$data = array();
		foreach ($query->result() as $row) {
			array_push($data, $row);
		}
		header('Content-Type: application/json');
		echo json_encode( $data );
	}
	
	public function maintenance_types() {
		$query = $this->db->query('select * from maintenance_type_dict order by name');
		$data = array();
		foreach ($query->result() as $row) {
			array_push($data, $row);
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}