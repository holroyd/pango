<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bike extends CI_Controller {
	
	public function bikes($personId) {
		$sql = "select * from bike b join person_bike pb on pb.bike_id = b.id where pb.person_id = ? order by b.name";
		$query = $this->db->query($sql, array($personId));
		$data = array();
		foreach($query->result() as $row) {
			array_push($data, $row);
		}
		header('Content-Type: application/json');
		echo json_encode( $data );
	}
	
}