<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_m extends CI_Model {

	public function get_mails() {
		return $this->db->get('config')->row_array();
	}

	public function edit($data) {
		return $this->db->update('config', $data);
	}

}

/* End of file Config_m.php */
/* Location: ./application/models/Config_m.php */