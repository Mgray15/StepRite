<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register_provider extends StepRite_Model {
	
	public function __construct() {
		/* */
	}
	
	public function get_user_id($email) {
		 $query = $this->db->get_where('users', array('id' => $id));
		return $query->row_array();
	}
	
	public function () {
		$data = array(
			'type' => 2,
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email')
		);
		$str = $this->db->insert_string('users', $data);
		
		// 'npin' => $this->input->post('npin'),
		// 'business_name'  => $this->input->post('business_name'),
		// 'business_address' => $this->input->post('business_address'),
		// 'phone_num' => $this->input->post('phone_num'),
	}
	
}

?>