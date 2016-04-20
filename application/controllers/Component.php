<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Component extends CI_Controller {

	
	public function component_types() {
		$query = $this->db->query('select * from component_type_dict order by name');
		$data = array();
		foreach ($query->result() as $row) {
			array_push($data, $row);
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	
	
	public function create($bikeId, $typeId, $manufacturer, $model, $price, $from) {
		header('Content-Type: application/json');
		$sql = "insert into component (bike_id, type_id, manufacturer, model, price, purchase_location) "
 			. "values(?, ?, ?, ?, ?, ?)";
 		if(!$this->db->query($sql, array($bikeId, $typeId, $manufacturer, $model, $price, $from))) {
 			echo json_encode(array("error" => $this->db->error()));
		}
		$id = $this->db->insert_id('component_seq');
		echo json_encode(
			array("id" => $id, "typeId" => $typeId, 
				"manufacturer" => $manufacturer, 
				"model" => $model, "price" => $price,
				"from" => $from));
	}
}