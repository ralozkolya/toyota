<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accessories_m extends CI_Model {

	/*public function get_accessories_for_car_old($car_slug) {

		$car_slug = $this->db->escape($car_slug);

		$id = ID;
		$slug = SLUG;

		$accessories = ACCESSORIES;
		$cars = CARS;
		$accessories_cars = ACCESSORIES_CARS;
		$accessory_categories = ACCESSORY_CATEGORIES;

		$car_id = CAR_ID;
		$accessory_id = ACCESSORY_ID;

		$name = NAME;
		$description = DESCRIPTION;
		$category = CATEGORY;
		$popular = POPULAR;
		$icon = ICON;

		$query = "SELECT $accessories.$id, $accessories.$description, $accessories.$name,
			$accessories.$category, $accessory_categories.$name as category_name,
			$accessories.$popular, $accessories.$icon FROM $accessories
			LEFT JOIN $accessories_cars ON $accessories.$id = $accessories_cars.$accessory_id
			LEFT JOIN $cars ON $accessories_cars.$car_id = $cars.$id 
			LEFT JOIN $accessory_categories ON $accessories.$category = $accessory_categories.$id
			WHERE $cars.$slug = $car_slug";

		$r = $this->db->query($query);

		return $r->result_array();
	}*/

	public function get_accessories_for_car($_slug) {

		$id = ID;
		$slug = SLUG;

		$accessories = ACCESSORIES;
		$cars = CARS;
		$categories = ACCESSORY_CATEGORIES;

		$car = CAR;

		$name = NAME;
		$description = DESCRIPTION;
		$category = CATEGORY;
		$popular = POPULAR;
		$icon = ICON;
		$lang = LANG;

		$this->db->select("$accessories.$id, $accessories.{$lang}_{$description} as description,
			$accessories.{$lang}_{$name} as name, $accessories.$category, $categories.{$lang}_{$name} as category_name,
			$accessories.$popular, $accessories.$icon, $accessories.$car");

		$this->db->where(array(CAR => $_slug));

		$this->db->join(CARS, "$cars.$id = $accessories.$car", 'left');
		$this->db->join(ACCESSORY_CATEGORIES, "$categories.$id = $accessories.$category", 'left');

		$r = $this->db->get(ACCESSORIES);

		return $r->result_array();
	}

	public function get_categories() {
		$this->db->select(['*', LANG.'_name as name']);
		return $this->db->get(ACCESSORY_CATEGORIES)->result_array();
	}

	public function get_accessory($id) {
		$this->db->where(array(ID => $id));
		$r = $this->db->get(ACCESSORIES);

		if($r->num_rows() === 1) {
			return $r->row_array();
		}

		return FALSE;
	}

	public function update($data, $id) {
		$result = array(
			'success' => FALSE,
			'error_message' => NULL
		);

		if(isset($data[POPULAR])) {
			$data[POPULAR] = 1;
		}

		else {
			$data[POPULAR] = 0;
		}

		$config = array(
			'upload_path' => 'uploads/accessories',
			'allowed_types' => 'gif|png|jpg',
			'max_size' => '1024'
		);

		$this->load->library('upload', $config);

		if($this->upload->do_upload(ICON)) {
			$data[ICON] = $this->upload->data('file_name');

			$this->db->where(array(ID => $id));
			$acc = $this->db->get(ACCESSORIES);

			if($acc->num_rows() === 1) {
				$acc = $acc->row_array();
				$icon = $acc[ICON];

				unlink('uploads/accessories/'.$icon);
			}
		}

		$this->db->where(array(ID => $id));
		if($this->db->update(ACCESSORIES, $data)) {
			$result['success'] = TRUE;
		}

		return $result;
	}

	public function add($data) {
		$result = array(
			'success' => FALSE,
			'error_message' => NULL
		);

		if(isset($data[POPULAR])) {
			$data[POPULAR] = 1;
		}

		else {
			$data[POPULAR] = 0;
		}

		$config = array(
			'upload_path' => 'uploads/accessories',
			'allowed_types' => 'gif|png|jpg',
			'max_size' => '1024'
		);

		$this->load->library('upload', $config);

		if($this->upload->do_upload(ICON)) {
			$data[ICON] = $this->upload->data('file_name');
		}

		if($this->db->insert(ACCESSORIES, $data)) {
			$result['success'] = TRUE;
		}

		return $result;
	}

	public function delete($id) {
		$this->db->where(array(ID => $id));
		$r = $this->db->get(ACCESSORIES);

		if($r->num_rows() !== 1) {
			return FALSE;
		}

		$acc = $r->row_array();

		$pic = $acc[ICON];

		if($pic) {
			unlink('uploads/accessories/'.$pic);
		}

		$this->db->where(array(ID => $id));
		return $this->db->delete(ACCESSORIES);
	}

}

/* End of file Accessories_m.php */
/* Location: ./application/models/Accessories_m.php */