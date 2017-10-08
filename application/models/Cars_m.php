<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cars_m extends CI_Model {

	public function get_models() {
		$this->db->select(array(SLUG, NAME, ICON, HYBRID));
		$r = $this->db->get(CARS);

		return $r->result_array();
	}

	public function get_model_by_slug($slug) {
		$this->db->where(array(SLUG => $slug));

		$r = $this->db->get(CARS);
		return $r->row_array();
	}

	public function get_model_configurations($slug) {
		$this->db->where(array(SLUG => $slug));

		$r = $this->db->get(CONFIGURATIONS);

		return $r->result_array();
	}

	public function get_config($id) {
		$this->db->where(array(ID => $id));
		$r = $this->db->get(CONFIGURATIONS);

		if($r->num_rows() === 1) {
			return $r->row_array();
		}

		return FALSE;
	}

	public function update($data, $slug) {

		$result = array(
			'success' => FALSE,
			'error_message' => NULL
		);

		if(isset($data[HYBRID])) {
			$data[HYBRID] = 1;
		}

		else {
			$data[HYBRID] = 0;
		}

		$config = array(
			'upload_path' => 'uploads/cars',
			'allowed_types' => 'gif|png|jpg',
			'max_size' => '1024'
		);

		$this->load->library('upload', $config);

		if($this->upload->do_upload(ICON)) {
			$data[ICON] = $this->upload->data('file_name');
		}

		$this->db->where(array(SLUG => $slug));
		if($this->db->update(CARS, $data)) {
			$result['success'] = TRUE;
		}

		return $result;
	}

	public function add($data) {
		$result = array(
			'success' => FALSE,
			'error_message' => NULL
		);

		if(isset($data[HYBRID])) {
			$data[HYBRID] = 1;
		}

		else {
			$data[HYBRID] = 0;
		}

		$config = array(
			'upload_path' => 'uploads/cars',
			'allowed_types' => 'gif|png|jpg',
			'max_size' => '1024'
		);

		$this->load->library('upload', $config);

		if($this->upload->do_upload(ICON)) {
			$data[ICON] = $this->upload->data('file_name');
		}

		else {
			$result['error_message'] = $this->upload->display_errors();
			return $result;
		}

		$data[SLUG] = url_title($data[NAME], 'underscore', TRUE);
		$this->db->where(array(SLUG => $data[SLUG]));
		$num_rows = $this->db->get(CARS)->num_rows();

		$i = 1;
		while($num_rows > 0) {
			$data[SLUG] = $data[SLUG]."_$i";
			$this->db->where(array(SLUG => $data[SLUG]));
			$num_rows = $this->db->get(CARS)->num_rows();
			$i++;
		}

		if($this->db->insert(CARS, $data)) {
			$result['success'] = TRUE;
		}

		return $result;
	}

	public function delete($slug) {
		$this->db->where(array(SLUG => $slug));
		return $this->db->delete(CARS);
	}

	public function update_config($data, $id) {
		$result = array(
			'success' => FALSE,
			'error_message' => NULL
		);

		$config = array(
			'upload_path' => 'uploads/configurations',
			'allowed_types' => 'gif|png|jpg',
			'max_size' => '1024'
		);

		$this->load->library('upload', $config);

		if($this->upload->do_upload(ICON)) {
			$data[ICON] = $this->upload->data('file_name');
		}

		$this->db->where(array(ID => $id));
		if($this->db->update(CONFIGURATIONS, $data)) {
			$result['success'] = TRUE;
		}

		return $result;
	}

	public function add_config($data) {
		$result = array(
			'success' => FALSE,
			'error_message' => NULL
		);

		$config = array(
			'upload_path' => 'uploads/configurations',
			'allowed_types' => 'gif|png|jpg',
			'max_size' => '1024'
		);

		$this->load->library('upload', $config);

		if($this->upload->do_upload(ICON)) {
			$data[ICON] = $this->upload->data('file_name');
		}

		else {
			$result['error_message'] = $this->upload->display_errors();
			return $result;
		}

		if($this->db->insert(CONFIGURATIONS, $data)) {
			$result['success'] = TRUE;
		}

		return $result;
	}

	public function delete_config($id) {
		$this->db->where(array(ID => $id));
		return $this->db->delete(CONFIGURATIONS);
	}

}

/* End of file Cars_m.php */
/* Location: ./application/models/Cars_m.php */